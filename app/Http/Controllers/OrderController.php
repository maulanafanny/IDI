<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function addCart(Request $request, Order $order)
    {
        if ($request->ajax()) {
            return $order->create([
                'menu_id' => $request->menu_id,
            ]);
        }
    }
}
