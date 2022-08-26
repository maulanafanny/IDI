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
});

Route::get('/checkout', function () {
    $data = Customer::find(1)->with('order.orderItem.menu')->first();
    return view('checkout', [
        'orders' => $data->order->orderItem,
        'order_customer' => $data->order,
        'payments' => $data->order->orderItem->groupBy('menu.category')
    ]);
});

Route::get('/add', [OrderItemController::class, 'addCart'])->name('addCart');