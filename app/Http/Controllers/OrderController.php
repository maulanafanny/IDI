<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function addSeat(Request $request, $id)
    {
        Order::where('id', '=', $id)->update(['seat' => $request->seat]);
        return redirect('payment');
    }
}
