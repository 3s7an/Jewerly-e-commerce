<?php


use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Dashboard routa
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Admin routy
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::delete('/products{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

    Route::delete('/category{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');


});



// Auth routy
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'autenthificate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cart routy

Route::middleware('auth')->group(function () {

    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

// Order routy



// Nezaradena routa
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


// Profile routy
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/profile/{user}/edit', [UserController::class, 'editData'])->name('profile.edit');

Route::put('/profile/{user}', [UserController::class, 'updateData'])->name('profile.update');






/*
ADMIN ROUTY ZALOHA
Route::post('admin/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');

Route::delete('admin/products{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.product')->middleware('auth');

Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category')->middleware('auth');

Route::post('admin/category', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users')->middleware('auth');
*/

