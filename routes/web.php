<?php

use App\Models\Menu;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
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
    ]);
})->name('menu');

Route::get('/cart', function () {
    $data = Customer::find(1)->with('order.orderItem.menu')->first();
    return view('cart', [
        'orders' => $data->order->orderItem,
        'order_customer' => $data->order,
        'payments' => $data->order->orderItem->groupBy('menu.category')
    ]);
})->name('cart');

Route::get('/seat', function () {
    return view('seat');
})->name('seat');

Route::get('/payment', function () {
    $data = Customer::find(1)->with('order.orderItem.menu')->first();
    return view('payment', [
        'order_customer' => $data->order,
        'payments' => $data->order->orderItem->groupBy('menu.category')
    ]);
})->name('payment');

Route::get('/add', [OrderItemController::class, 'addCart'])->name('addCart');
