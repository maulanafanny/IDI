<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderItemController extends Controller
{
    function addCart(Request $request)
    {
        if ($request->ajax()) {

            if (!empty( Session::get('order.item')[$request->menu_id])) {
                
                Session::increment('order.item.' . $request->menu_id, $request->quantity);

            } else {

                Session::put('order.item.' . $request->menu_id, $request->quantity);

            }

            $price = Menu::find($request->menu_id)->price;
            Session::increment('order.total', $price * $request->quantity);
        }
    }
}
