<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfitLossController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleReportController;
use App\Http\Controllers\SaleReturnController;
use App\Http\Controllers\SaleReturnReportController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Models\SaleReturnReport;

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
Route::resource('sales', SaleController::class);
Route::resource('sale_returns', SaleReturnController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('customers', CustomerController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('users', UserController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('units', UnitController::class);
Route::get('currencies', [CurrencyController::class, 'index'])->name('currencies.index');
Route::resource('currencies', CurrencyController::class);
Route::resource('profit_loss', ProfitLossController::class);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');


Route::get('/purchase-report', function () {
    return view('purchase_report.purchase_report');
})->name('purchase.report');

Route::get('/purchase-return-report', function () {
    return view('purchase_report.purchase_return_report');
})->name('purchase_return_report');

Route::get('/sale-report', function () {
    return view('sale_report.sale_report');
})->name('sale.report');
Route::get('/sale-report', [SaleReportController::class, 'index'])->name('sale_report');

Route::get('/sale-return-report', [SaleReturnReportController::class, 'index'])->name('sale_return_report');

