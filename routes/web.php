<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

    Route::get('/user',[UserController::class,'list'])->name('user');

    Route::get('/add-user',[UserController::class,'add_user'])->name('add_user');
    
    Route::post('/store',[UserController::class,'store'])->name('store');

    Route::get('/edit-user/{id}/',[UserController::class,'edit_user'])->name('edit_user');

    Route::patch('/update-user/{id}/',[UserController::class,'update'])->name('update');

    Route::get('/product',[ProductController::class,'list'])->name('product');

    Route::get('/add-product',[ProductController::class,'add'])->name('add_product');

    Route::post('/store-product',[ProductController::class,'store'])->name('store_product');

    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit_product');

    Route::patch('/update-product/{id}',[ProductController::class,'update'])->name('update_product');

    Route::get('/list-product-category',[CategoryController::class,'list'])->name('list_category');

    Route::get('/add-product-category',[CategoryController::class,'add'])->name('add_category');

    Route::post('/store-product-category',[CategoryController::class,'store'])->name('store_category');

    Route::get('/edit-product-category/{id}',[CategoryController::class,'edit'])->name('edit_category');

    Route::patch('/update-product-category/{id}',[CategoryController::class,'update'])->name('update_category');

   
   


    
});
