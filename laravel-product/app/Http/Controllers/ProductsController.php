<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        // 这里需要注意的是, 我们想要使用 bootstrap 的分页样式,
        // 需要在 app/Providers/AppServiceProvider.php
        // 文件中的 boot 方法中调用 Paginator::useBootstrap() 方法
        $products = Product::orderBy('created_at')->paginate($this->perPage);
        return view('products/index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View|Product
     */
    public function show(Product $product): Factory|View|Application|Product
    {
        return view('products/show', ['product' => $product]);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('products/create');
    }

    /**
     * Upload image
     * 上传图片到 storage 目录下面之后, 需要执行 php artisan storage:link 命令,
     * 将 storage/app/public 目录下的文件软链接到 public/storage 目录下面
     * !!! 其实就是执行 Linux 的 ln -s 命令
     *
     * @param $image
     * @return ?string
     */
    protected function uploadImage($image): ?string
    {
        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/products/images/';
        if (Storage::disk('public')->putFileAs($path, $image, $fileName)) {
            return $path . $fileName;
        }

        return null;
    }

    /**
     * Remove image
     *
     * @param $image
     */
    protected function removeImage($image): void
    {
        Storage::disk('public')->delete($image);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param ProductPostRequest $request
     * @return RedirectResponse
     */
    public function store(ProductPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $image = $this->uploadImage($request->file('image'));
        if ($image === null) {
            return redirect()->back()->withInput()->withErrors(['image' => '上传图片失败']);
        }
        $product->image = $image;
        $product->description = $validated['description'];
        if ($product->save()) {
            return redirect()->route('products.index');
        }
        return redirect()->back()->withInput()->withErrors($validated);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product): Factory|View|Application
    {
        return view('products/edit', ['product' => $product]);
    }

    /**
     * Update the specified product in storage.
     *
     * @param Product $product
     * @param ProductPostRequest $request
     * @return RedirectResponse
     */
    public function update(Product $product, ProductPostRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->file('image'));
            if ($image === null) {
                return redirect()->back()->withInput()->withErrors(['image' => '上传图片失败']);
            }

            // Remove old image if it has value in database
            if ($product->image) {
                $this->removeImage($product->image);
            }

            $product->image = $image;
        }

        $validated = $request->validated();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        if ($product->save()) {
            return redirect()->route('products.index');
        }
        return redirect()->back()->withInput()->withErrors($validated);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        if ($product->delete()) {
            return redirect()->route('products.index');
        }
        return redirect()->back();
    }
}
