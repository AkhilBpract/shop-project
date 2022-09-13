<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeeController;
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

    Route::resource('product_category', ProductCategoryController::class);
    
    Route::resource('product', ProductController::class);   
    
    Route::post('/get-product',[AjaxController::class,'product'])->name('get_product');
    
    Route::post('/get-price',[AjaxController::class,'salePrice'])->name('get_price'); 
    
    Route::post('/get-purchase-price',[AjaxController::class,'purchasePrice'])->name('get_purchase_price');    
  
});
// admin routes
    
    Route::get('/report',[ReportController::class,'report'])->name('report')->middleware(['auth','admin']);
    
    Route::get('/profit-loss',[ReportController::class,'profitreport'])->name('profitreport')->middleware(['auth','admin']);
    
    Route::resource('employees', EmployeeController::class)->middleware(['auth', 'admin']);

// admin && Sales Department routes

    Route::resource('sales', SaleController::class)->middleware(['auth','salesdepartment']);

    Route::resource('customers', CustomerController::class )->middleware(['auth','salesdepartment']);    

//  admin && purchase Department routes        

    Route::resource('purchases', PurchaseController::class)->middleware(['auth','purchasedepartment']);      

    Route::resource('vendors', VendorController::class)->middleware(['auth','purchasedepartment']);


