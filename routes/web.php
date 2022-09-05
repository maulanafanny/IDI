<?php

use App\Models\Menu;
use App\Models\Seat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

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

Route::get('/', function () {

    return view('menu', [
        'menus' => Menu::all(),
        'session' => Session::all()
    ]);

})->name('menu');

Route::get('/cart', function () {
    
    return view('cart', [
        'menu' => Menu::get(),
        'item' => Session::get('order.item'),
        'total' => Session::get('order.total'),
    ]);

})->name('cart');

Route::get('/seat', function () {

    if (Session::get('customer.seat') === 'take-away') {
        return redirect('payment');
    }

    return view('seat', [
        'choices' => explode(' ', Session::get('customer.seat')),
        'seats' => Seat::all()
    ]);

})->name('seat');

Route::get('/payment', function () {

    return view('payment', [
        'menu' => Menu::get(),
        'item' => Session::get('order.item'),
        'total' => Session::get('order.total'),
        'seat' => Session::get('customer.seat')
    ]);

})->name('payment');

Route::get('/summary', function () {

    return view('summary', [
        'menu' => Menu::get(),
        'item' => Session::get('order.item'),
        'total' => Session::get('order.total'),
        'seat' => Session::get('customer.seat')
    ]);

})->name('summary');

Route::get('/success', [OrderController::class, 'store'])->name('success');

Route::post('/addseat/{id}', [OrderController::class, 'addSeat'])->name('addSeat');

Route::get('/add', [OrderItemController::class, 'addCart'])->name('addCart');

Route::get('/login', function ()
{
    return view('login');
});

Route::post('/sessionStore', [LoginController::class, 'loginCustomer'])->name('loginCustomer');