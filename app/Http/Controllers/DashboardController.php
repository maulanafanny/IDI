<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        return view('dashboard.seat', [
            'seats' => Seat::all(),
        ]);
    }

    function order()
    {
        return view('dashboard.order', [
            'orders' => Order::with('orderItem.menu')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    function orderDestroy($id)
    {
        Order::destroy($id);

        return redirect('/dash/order');
    }

    function updateSeat(Request $request)
    {
        if ($request->seat) {
            $seats = Seat::all();

            foreach ($seats as $index => $seat) {
                if ($request->seat[$index] == 'true') {
                    $seat->update(['status' => true]);
                } else {
                    $seat->update(['status' => false]);
                }
            }
        }

        return redirect()->back();
    }
}
