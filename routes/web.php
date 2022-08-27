<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');


    Route::resource('customer', CustomerController::class);

    Route::resource('vendor', VenderController::class);

    Route::resource('product_category', ProductCategoryController::class);

    Route::resource('product', ProductController::class);

    Route::resource('sale', SaleController::class);

    Route::resource('purchase', PurchaseController::class);

    Route::post('/get-product',[SaleController::class,'product'])->name('get_product');

    Route::post('/get-price',[SaleController::class,'price'])->name('get_price');   

    

    Route::post('/get-product/purchase',[SaleController::class,'product'])->name('product');

    Route::post('/get-price/purchase',[SaleController::class,'price'])->name('price');   


   

   

    
});
