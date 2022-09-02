<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function loginCustomer(Request $request)
    {
        $order = Order::create([
            'quantity' => 0,
            'total' => 0,
            'customer_id' => Customer::latest()->first()->id + 1
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'order_id' => $order->id
        ]);

        $session = [
            'customer_id' => $customer->id,
            'phone' => $request->phone,
            'seat_option' => $request->seat_option,
            'order_id' => $order->id
        ];

        $request->session()->put('customer', $session);

        return redirect('/');
    }
}
