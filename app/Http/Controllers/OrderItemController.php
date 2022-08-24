<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    function addCart(Request $request, OrderItem $order)
    {
        if ($request->ajax()) {
            if ( !empty($order->where('menu_id', '=', $request->menu_id)->first()) ) {
                $item = $order->where('menu_id', '=', $request->menu_id)->first();

                return $order->where('menu_id', '=', $request->menu_id)->update([
                    'quantity' => $item->quantity+1,
                    'total' => $item->menu->price * ($item->quantity+$request->quantity)
                ]);
            } else {
                $item = Menu::where('id', '=', $request->menu_id)->first();
                return $order->create([
                    'order_id' => 1,
                    'menu_id' => $request->menu_id,
                    'total' => $item->price * $request->quantity,
                    'quantity' => $request->quantity,
                ]);
            }
        }
    }
}
