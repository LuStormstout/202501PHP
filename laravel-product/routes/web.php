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
//
//Route::get('products/', [ProductsController::class, 'index'])->name('products.index');
//Route::get('products/{product}', [ProductsController::class, 'show'])->name('products.show');
//Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
//Route::post('products/', [ProductsController::class, 'store'])->name('products.store');

// Restful style
Route::resource('products', ProductsController::class);
//GET|HEAD        products ..................... products.index › ProductsController@index 列表页
//POST            products ..................... products.store › ProductsController@store 新增
//GET|HEAD        products/create ............ products.create › ProductsController@create 展示新增表单
//GET|HEAD        products/{product} ............. products.show › ProductsController@show 展示详情
//PUT|PATCH       products/{product} ......... products.update › ProductsController@update 更新
//DELETE          products/{product} ....... products.destroy › ProductsController@destroy 删除
//GET|HEAD        products/{product}/edit ........ products.edit › ProductsController@edit 展示编辑表单

// 一部分 Laravel 生成文件命令
// php artisan make:model Product 生成模型
// php artisan make:request ProductPostRequest 生成表单验证请求
// php artisan make:controller ProductsController 生成控制器
// php artisan route:list 查看路由列表
// php artisan cache:clear 清除缓存
// php artisan config:clear 清除配置缓存
// php artisan view:clear 清除视图缓存
// php artisan route:clear 清除路由缓存
