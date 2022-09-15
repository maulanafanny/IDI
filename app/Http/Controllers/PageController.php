<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    function menu()
    {
        return view('menu', [
            'menus' => Menu::all(),
            'session' => Session::all()
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
        ]);
    }

    function seat() {
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

    function payment() {
        if (Session::get('order.total') === 0) {
            return redirect()->back()->with('alert', 'Kamu belum memilih menu');
        }

        if (Session::get('customer.seat') === 'dine-in') {
            return redirect()->back()->with('alert', 'You haven\'t chosen for a seat yet');
        }

        return view('payment', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
            'seat' => Session::get('customer.seat')
        ]);
    }

    function summary() {
        return view('summary', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
            'seat' => Session::get('customer.seat')
        ]);
    }

    function history() {
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

    function login() {
        return view('login');
    }
}
