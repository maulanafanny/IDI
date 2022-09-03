<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function loginCustomer(Request $request)
    {
        $customer = [
            'name' => $request->name,
            'phone' => $request->phone,
            'seat_option' => $request->seat_option
        ];

        $order = [
            'item' => [],
            'total' => 0,
            'qty' => 0,
        ];

        $request->session()->put('customer', $customer);
        $request->session()->put('order', $order);

        return redirect('/');
    }
}
