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
            $order_items = [];
            $seats = explode(' ', Session::get('customer.seat'));

            foreach ($seats as $seat) {
                Seat::where('seat', $seat)->update(['status' => false]);
            }

            $order = Order::create([
                'customer_name' => Session::get('customer.name'),
                'customer_phone' => Session::get('customer.phone'),
                'total' => Session::get('order.total') + Session::get('order.total') * 11 / 100,
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

    function storeOrder(Request $request)
    {
        $data = $request->json()->all();
        $seat = implode(' ', $data['seat']);

        foreach ($data['seat'] as $seat) {
            Seat::where('seat', $seat)->update(['status' => false]);
        }

        $store = Order::create([
            'customer_name' => $data['customer_name'],
            'customer_phone' => $data['customer_phone'],
            'total' => $data['subtotal'] + ($data['subtotal'] * 11 / 100),
            'seat' => $seat
        ]);

        foreach ($data['items'] as $item) {
            OrderItem::create([
                'order_id' => $store['id'],
                'menu_id' => $item['id'],
                'quantity' => $item['qty'],
                'notes' => $item['notes'],
            ]);
        }
    }
}
