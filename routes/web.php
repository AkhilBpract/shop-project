<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

    Route::get('/product',[ProductController::class,'list'])->name('product');

    Route::get('/add-product',[ProductController::class,'add'])->name('add_product');

    Route::post('/store-product',[ProductController::class,'store'])->name('store_product');

    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit_product');

    Route::patch('/update-product/{id}',[ProductController::class,'update'])->name('update_product');

    Route::get('/delete-product/{id}',[ProductController::class,'delete'])->name('delete_product');
    

    Route::resource('product_category', ProductCategoryController::class);

   
    Route::get('/transaction_list',[TransactionController::class,'index'])->name('transaction_list');

    Route::get('/transaction',[TransactionController::class,'transaction'])->name('transaction');

    Route::post('/get-type',[TransactionController::class,'type'])->name('get_type');

    Route::post('/get-product',[TransactionController::class,'product'])->name('get_product');

    Route::post('/get-price',[TransactionController::class,'price'])->name('get_price');

   

    Route::post('/store',[TransactionController::class,'store'])->name('store');

    
});
