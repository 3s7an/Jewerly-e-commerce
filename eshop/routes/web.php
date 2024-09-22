<?php


use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Dashboard routa
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/category/show{category}', [DashboardController::class, 'showCategory'])->name('category.view.show');

// Admin routy
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::delete('/products{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/products/add', [ProductController::class, 'interIndex'])->name('admin.add-product');

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::get('/category/add', [CategoryController::class, 'interIndex'])->name('admin.intercategory');

     Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

    Route::delete('/category{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');

    Route::get('/users{user}', [UserController::class, 'show'])->name('admin.user.show');

    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.user.update');

    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');

    Route::get('/orders{order}', [OrderController::class, 'show'])->name('admin.order.show');

    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('admin.order.update');






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

    Route::post('/cart/change', [CartController::class, 'update'])->name('cart.update');
});

// Order routy
Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

Route::post('/orders', [OrderController::class, 'store'])->name('order.store');





// Nezaradena routa
Route::get('/products/{product}', [DashboardController::class, 'show'])->name('products.show');


// Profile routy
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/profile/{user}/edit', [UserController::class, 'editData'])->name('profile.edit');

Route::post('/profile/update-data', [ProfileController::class, 'updateUserData'])->name('profile.update');






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

