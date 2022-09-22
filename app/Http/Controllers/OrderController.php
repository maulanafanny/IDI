<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    function addSeat(Request $request)
    {
        if ($request->seat === null) {
            return redirect('seat')->with('alert', 'You haven\'t chosen for a seat yet');
        }

        Session::put('customer.seat', $request->seat);
        return redirect('payment');
    }

    function update(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'code' => $request->code,
            'status' => $request->status == 'true' ? true : false
        ]);

        return redirect('dash/order');
    }

    function store()
    {
        if (Session::get('customer.has_stored')) {
            return view('success');
        } else {
            $items = Session::get('order.item');
            $quantity = 0;
            $order_items = [];
            $seats = explode(' ', Session::get('customer.seat'));
    
            foreach ($seats as $seat) {
                Seat::where('seat', $seat)->update(['status' => false]);
            }
    
            foreach ($items as $id => $detail) {
                $quantity += $detail['qty'];
            }
    
            $order = Order::create([
                'customer_name' => Session::get('customer.name'),
                'customer_phone' => Session::get('customer.phone'),
                'total' => Session::get('order.total') + Session::get('order.total') * 11 / 100,
                'quantity' => $quantity,
                'seat' => Session::get('customer.seat')
            ]);
    
            foreach ($items as $id => $detail) {
                array_push($order_items, [
                    'order_id' => $order->id,
                    'menu_id' => $id,
                    'quantity' => $detail['qty'],
                    'notes' => $detail['notes']
                ]);
            }
    
            foreach ($order_items as $item) {
                OrderItem::create($item);
            }
    
            Session::put('customer.has_stored', true);
    
            return view('success');
        }
    }
}
