<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'details']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/signin', [AuthController::class, 'loginPage'])->name("login");

Route::post('/signin', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerPage']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    
    Route::get('/checkout', [PaymentController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/my-orders', [UserController::class, 'myOrders']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/dashboard/products', [DashboardController::class, 'productsList'])->name("dashboard-products-list");
    
    Route::get('/dashboard/product/add', [DashboardController::class, 'addProduct']);
    
    Route::post('/dashboard/product/add', [ProductController::class, 'store']);
    
    Route::get('/dashboard/product/modify/{id}', [DashboardController::class, 'modifyProduct']);
    
    Route::get('/dashboard/orders', [DashboardController::class, 'ordersList']);
});