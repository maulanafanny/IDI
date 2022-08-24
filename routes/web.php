<?php

use App\Http\Controllers\OrderItemController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

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
        'menus' => Menu::paginate(6),
    ]);
});

Route::get('/checkout', function () {
    return view('checkout', [
        'menus' => Menu::all()
    ]);
});

Route::get('/add', [OrderItemController::class, 'addCart'])->name('addCart');