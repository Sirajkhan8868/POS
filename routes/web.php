<?php

use App\Http\Controllers\BarcodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\StockAdjustmentController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::resource('barcodes', BarcodeController::class);
Route::resource('stock-adjustments', StockAdjustmentController::class);
Route::resource('quotations', QuotationController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase-returns', PurchaseReturnController::class);





