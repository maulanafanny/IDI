<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    function index()
    {
        return view('dashboard.dashboard');
    }

    function order()
    {
        return view('dashboard.order');
    }

    function menu()
    {
        return view('dashboard.menu', [
            'menus' => Menu::all()
        ]);
    }

    function seat()
    {
        return view('dashboard.seat', [
            'seats' => Seat::all(),
        ]);
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

        return redirect()->back()->with($request->seat);
    }
}
