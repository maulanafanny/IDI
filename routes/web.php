<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    OrderController,
    OrderItemController,
    PageController,
    DashboardController,
    MenuController,
    DropzoneController,
    NewOrderController
};

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
Route::get('/', [PageController::class, 'index'])->name('landing');
Route::get('/display-menu', [PageController::class, 'displayMenu'])->name('landing.menu');

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/seat', [PageController::class, 'seat'])->name('seat');
Route::get('/payment', [PageController::class, 'payment'])->name('payment');
Route::get('/summary', [PageController::class, 'summary'])->name('summary');
Route::get('/history', [PageController::class, 'history'])->name('history');

// Success & Store Route
Route::get('/success', [OrderController::class, 'store'])->name('success');

// Order CRUD Route
Route::get('/add', [OrderItemController::class, 'addCart'])->name('addCart');
Route::post('/update', [OrderItemController::class, 'updateCart'])->name('updateCart');
Route::post('/addseat', [OrderController::class, 'addSeat'])->name('addSeat');
Route::post('/sessionStore', [LoginController::class, 'loginCustomer'])->name('loginCustomer');

// Admin Page
Route::prefix('dash')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('order', [DashboardController::class, 'order'])->name('dash.order');
    Route::resource('menu', MenuController::class, ['except'=> ['show']]);
});

Route::post('/updateseat', [DashboardController::class, 'updateSeat'])->name('updateSeat');
Route::get('list', [PageController::class, 'menuList'])->name('list');
Route::get('display-list', [PageController::class, 'displayMenuList'])->name('displayList');
Route::post('dropzone-store', [DropzoneController::class, 'store'])->name('dropzone.store');
Route::post('update/{id}', [OrderController::class, 'update'])->name('order.update');
Route::get('barcode', [PageController::class, 'barcode'])->name('barcode');

Route::get('/new-order/{any}', [NewOrderController::class, 'index'])->name('neworder');