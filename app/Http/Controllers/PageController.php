<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    function index()
    {
        return view('landing', [
            'bestSeller' => Menu::inRandomOrder()->where('best_seller', true)->take(4)->get()
        ]);
    }

    function menu()
    {
        return view('menu', [
            'menus' => Menu::all(),
        ]);
    }

    function menuList(Request $request)
    {
        if ($request->search == '') {
            $menus = Menu::all();
        } else {
            $menus = Menu::where('category', $request->search)->get();
        }

        return view('partials.menu_list', [
            'request' => $request->search,
            'menus' => $menus
        ]);
    }

    function cart()
    {
        if (Session::get('order.total') === 0) {
            return redirect()->back()->with('alert', 'Kamu belum memilih menu');
        }

        return view('cart', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
            'session' => Session::all()
        ]);
    }

    function seat()
    {
        $choices = explode(' ', Session::get('customer.seat'));
        $choicesText = '';

        foreach ($choices as $choice) {
            $choicesText = $choicesText . ' ' . $choice;
        }

        if (Session::get('order.total') === 0) {
            return redirect()->back()->with('alert', 'Kamu belum memilih menu');
        }

        if (Session::get('customer.seat') === 'take-away') {
            return redirect('payment');
        }

        return view('seat', [
            'choices' => $choices,
            'choicesText' => $choicesText,
            'seats' => Seat::all()
        ]);
    }

    function payment()
    {
        if (Session::get('order.total') === 0) {
            return redirect()->back()->with('alert', 'Kamu belum memilih menu');
        }

        if (Session::get('customer.seat') === 'dine-in') {
            return redirect('/seat')->with('alert', 'Kamu belum memilih seat');
        }

        return view('payment', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
            'seat' => Session::get('customer.seat')
        ]);
    }

    function summary()
    {
        return view('summary', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
            'seat' => Session::get('customer.seat')
        ]);
    }

    function history()
    {
        if (Session::get('customer.has_stored') === null) {
            return redirect()->back()->with('alert', 'Kamu belum menyelesaikan pesanan');
        }

        return view('history', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
            'seat' => Session::get('customer.seat')
        ]);
    }

    function login(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return view('login');
    }
}
