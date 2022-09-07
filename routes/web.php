<?php

use App\Models\Menu;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PageController;

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

// Page Route
Route::get('/', [PageController::class, 'login']);
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/seat', [PageController::class, 'seat'])->name('seat');
Route::get('/payment', [PageController::class, 'payment'])->name('payment');
Route::get('/summary', [PageController::class, 'summary'])->name('summary');

// Success & Store Route
Route::get('/success', [OrderController::class, 'store'])->name('success');

// Store Route
Route::get('/add', [OrderItemController::class, 'addCart'])->name('addCart');
Route::post('/addseat', [OrderController::class, 'addSeat'])->name('addSeat');
Route::post('/sessionStore', [LoginController::class, 'loginCustomer'])->name('loginCustomer');