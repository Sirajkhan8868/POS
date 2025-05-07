<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    BarcodeController,
    CategoryController,
    CurrencyController,
    CustomerController,
    ExpenseController,
    HomeController,
    PermissionController,
    ProductController,
    ProfitLossController,
    PurchaseController,
    PurchaseReportController,
    PurchaseReturnController,
    QuotationController,
    RoleController,
    SaleController,
    SaleReportController,
    SaleReturnController,
    SaleReturnReportController,
    StockAdjustmentController,
    SupplierController,
    UnitController,
    UserController,
    PaymentReportController,
    ProductsController
};

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Auth routes
Auth::routes();

// Resource routes
Route::resource('products', ProductsController::class);
Route::resource('barcodes', BarcodeController::class);
Route::resource('stock-adjustments', StockAdjustmentController::class);
Route::resource('quotations', QuotationController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase-returns', PurchaseReturnController::class);
Route::resource('sales', SaleController::class);
Route::resource('sale_returns', SaleReturnController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('customers', CustomerController::class);
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('units', UnitController::class);
Route::resource('currencies', CurrencyController::class);
Route::resource('profit_losses', ProfitLossController::class);
Route::resource('categories', CategoryController::class);
Route::resource('payment_reports', PaymentReportController::class);

// Report views (if not using controllers)
Route::get('/purchase-report', [PurchaseReportController::class, 'index'])->name('purchase.report');
Route::get('/purchase-return-report', function () {
    return view('purchase_report.purchase_return_report');
})->name('purchase_return_report');

// Sale report
Route::get('/sale-report', [SaleReportController::class, 'index'])->name('sale.report');

// Sale return report
Route::get('/sale-return-report', [SaleReturnReportController::class, 'index'])->name('sale_return_report');

// Additional report routes
Route::get('/purchase-reports', [PurchaseReportController::class, 'index'])->name('purchase-reports.index');
Route::get('/sale-reports', [SaleReportController::class, 'index'])->name('sale-reports.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
