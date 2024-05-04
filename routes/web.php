<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'details']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/contact', function () {
    return view('welcome');
});

Route::get('/checkout', [PaymentController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/signin', [AuthController::class, 'loginPage']);

Route::get('/register', [AuthController::class, 'registerPage']);

Route::get('/my-orders', [UserController::class, 'myOrders']);

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/dashboard/products', function () {
    return view('welcome');
});

Route::get('/dashboard/add-product', function () {
    return view('welcome');
});

Route::get('/dashboard/modify-product', function () {
    return view('welcome');
});

Route::get('/dashboard/all-orders', function () {
    return view('welcome');
});
