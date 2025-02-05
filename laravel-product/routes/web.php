<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('products/', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('products/', [ProductsController::class, 'store'])->name('products.store');

// Restful style
//Route::resource('products', ProductsController::class);
//GET|HEAD        products ..................... products.index › ProductsController@index 列表页
//POST            products ..................... products.store › ProductsController@store 新增
//GET|HEAD        products/create ............ products.create › ProductsController@create 展示新增表单
//GET|HEAD        products/{product} ............. products.show › ProductsController@show 展示详情
//PUT|PATCH       products/{product} ......... products.update › ProductsController@update 更新
//DELETE          products/{product} ....... products.destroy › ProductsController@destroy 删除
//GET|HEAD        products/{product}/edit ........ products.edit › ProductsController@edit 展示编辑表单
