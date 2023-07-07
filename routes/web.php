<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;


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
Route::get('/', function () {
    return view('front.page.home');
});

Route::get('/home', [HomeController::class, 'index'])->name("home");


// backend
Route::group(['middleware' => 'guest'], function () {
    Route::match(['get', 'post'], "login", [LoginController::class, 'index']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name("admin");
});



// login
Route::get('/login', [LoginController::class, 'index'])->name("login");
// Route::post('/login', [LoginController::class, 'user_login'])->name("login");
