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

            if (!empty( Session::get("order.item.{$request->menu_id}"))) {
                
                Session::increment("order.item.{$request->menu_id}.qty", $request->quantity);

            } else {

                Session::put("order.item.{$request->menu_id}.qty", $request->quantity);

            }

            $price = Menu::find($request->menu_id)->price;
            Session::increment('order.total', $price * $request->quantity);
            Session::put("order.item.{$request->menu_id}.notes", $request->notes);
        }
    }

    function updateCart(Request $request)
    {
        Session::put('order.total', 0);
        foreach ($request->changes as $key => $change) {
            Session::put("order.item.{$key}.qty", $change);
            $price = Menu::find($key)->price;
            Session::increment('order.total', $price * $change);
        }

        return redirect()->back()->with('data', $request->changes);
    }
}
