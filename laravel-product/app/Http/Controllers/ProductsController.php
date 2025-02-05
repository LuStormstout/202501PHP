<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductsController extends Controller
{

    public ?Product $products;

    public function __construct()
    {
        $this->products = new Product();
    }

    public function index(): Factory|View|Application
    {
        $products = $this->products->getProducts();
        return view('products/index');
    }

    public function show($id): Factory|View|Application
    {
        $product = $this->products->getProductById($id);
        return view('products/show');
    }

    public function create()
    {

    }
}
