<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/view/{id}', [MainController::class, 'view_product'])->name('view_product');


Route::middleware("auth")->group(function(){
    Route::get('/logout', [MainController::class, 'logout_func'])->name('logout');
    Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
    Route::get('/cart', [MainController::class, 'cart'])->name('cart');
    Route::post('/add_product', [MainController::class, 'add_to_cart'])->name('add_to_cart');
    Route::post('/delete_item', [MainController::class, 'delete_item'])->name('delete_item');
});
Route::middleware("guest")->group(function(){
    Route::get('/login', [MainController::class, 'login_view'])->name('login');
    Route::get('/register', [MainController::class, 'register_view'])->name('register');
    Route::post('/auth', [MainController::class, 'authenticate'])->name('auth');
    Route::post('/reg', [MainController::class, 'register'])->name('reg');
});