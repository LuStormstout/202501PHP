<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductsController extends Controller
{

    # Laravel 中的开发顺序是：路由 -> 控制器 -> 模型 -> 视图

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        return view('products/index', ['products' => Product::all()]);
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

    protected function uploadImage()
    {
        # todo upload image
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
        // $product->image = $request->input('image');
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
     * @param ProductPostRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductPostRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        // $product->image = $request->input('image');
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
