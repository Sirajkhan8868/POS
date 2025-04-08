<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route to show the home page (could be the welcome page or a custom view)
Route::get('/', function () {
    return view('welcome');  // or you can point this to another view if needed
});

// Authentication routes
Auth::routes();

// Redirect home route to HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');
