<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandsProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeshowproductsController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// frontend

Route::match(['get'], '/', [HomeController::class, 'index'])->name("/");


// danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{id}', [HomeshowproductsController::class, 'show_category_home'])->name('danh-muc-san-pham');
Route::get('/thuong-hieu-san-pham/{id}', [HomeshowproductsController::class, 'show_brand_home'])->name('thuong-hieu-san-pham');
Route::get('/chi-tiet-san-pham/{id}', [HomeshowproductsController::class, 'product_details'])->name('chi-tiet-san-pham');


// backend
Route::middleware(['guest'])->group(function () {
    Route::match(['get'], "login", [LoginController::class, 'index'])->name("login");;
    Route::match(['post'], "login", [LoginController::class, 'user_login'])->name("login");;
    // Route::match(['get'], '/home', [HomeController::class, 'index'])->name("home");
});
Route::middleware(['auth'])->group(function () {
    Route::match(['get'], '/admin', [AdminController::class, 'index'])->name("admin");
    Route::prefix('/admin')->group(function () {

        // category products
        Route::get('/add-category-products', [CategoryProductController::class, 'add_category_products'])->name('add-category-products');
        Route::post('/add-category-products', [CategoryProductController::class, 'save_category_products'])->name('add-category-products');
        Route::get('/all-category-products', [CategoryProductController::class, 'all_category_products'])->name('all-category-products');

        // up active_category_status
        Route::get('/active-category-status/{id}', [CategoryProductController::class, 'active_category_status'])->name('active-category-status');
        Route::get('/unactive-category-status/{id}', [CategoryProductController::class, 'unactive_category_status'])->name('unactive-category-status');
        Route::get('/edit-category-products/{id}', [CategoryProductController::class, 'edit_category_products'])->name('edit-category-products');
        Route::get('/delete-category-products/{id}', [CategoryProductController::class, 'delete_category_products'])->name('delete-category-products');
        Route::post('/update-category-products/{id}', [CategoryProductController::class, 'update_category_products'])->name('update-category-products');


        // brands products
        Route::get('/add-brand-products', [BrandsProductController::class, 'add_brand_products'])->name('add-brand-products');
        Route::post('/add-brand-products', [BrandsProductController::class, 'save_brand_products'])->name('add-brand-products');
        Route::get('/all-brand-products', [BrandsProductController::class, 'all_brand_products'])->name('all-brand-products');

        // up active_brand_status
        Route::get('/active-brand-status/{id}', [BrandsProductController::class, 'active_brand_status'])->name('active-brand-status');
        Route::get('/unactive-brand-status/{id}', [BrandsProductController::class, 'unactive_brand_status'])->name('unactive-brand-status');
        Route::get('/edit-brand-products/{id}', [BrandsProductController::class, 'edit_brand_products'])->name('edit-brand-products');
        Route::get('/delete-brand-products/{id}', [BrandsProductController::class, 'delete_brand_products'])->name('delete-brand-products');
        Route::post('/update-brand-products/{id}', [BrandsProductController::class, 'update_brand_products'])->name('update-brand-products');


        // products
        Route::get('/add-products', [ProductsController::class, 'add_products'])->name('add-products');
        Route::post('/add-products', [ProductsController::class, 'save_products'])->name('add-products');
        Route::get('/all-products', [ProductsController::class, 'all_products'])->name('all-products');

        // up active-products
        Route::get('/active-products-status/{id}', [ProductsController::class, 'active_products_status'])->name('active-products-status');
        Route::get('/unactive-products-status/{id}', [ProductsController::class, 'unactive_products_status'])->name('unactive-products-status');
        Route::get('/edit-products/{id}', [ProductsController::class, 'edit_products'])->name('edit-products');
        Route::get('/delete-products/{id}', [ProductsController::class, 'delete_products'])->name('delete-products');
        Route::post('/update-products/{id}', [ProductsController::class, 'update_products'])->name('update-products');
    });
    Route::prefix('/home')->group(function () {
        Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('add-to-cart');
        Route::get('/cart-user', [CartController::class, 'index'])->name('cart-user');
        Route::post('/update-cart-qty/{id}', [CartController::class, 'update_qty'])->name('update-cart-qty');
        Route::get('/delete-cart/{id}', [CartController::class, 'delete_cart'])->name('delete-cart');
    });
});


Route::get('/cart', [CartController::class, 'cart'])->name('cart');




// login
// Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::get('/admin-logout', [LogoutController::class, 'admin_logout'])->name('admin-logout');
Route::get('/user-logout', [LogoutController::class, 'user_logout'])->name('user-logout');

// Route::post('/login', [LoginController::class, 'user_login'])->name("login");


// register
Route::get('/register', [RegisterController::class, 'index'])->name("register");
Route::post('/register', [RegisterController::class, 'user_register'])->name("register");
