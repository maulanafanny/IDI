<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    function addSeat(Request $request)
    {
        Session::put('customer.seat', $request->seat);
        return redirect('payment');
    }
}
