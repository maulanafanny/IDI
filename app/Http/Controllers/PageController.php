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
        return view('cart', [
            'menu' => Menu::get(),
            'item' => Session::get('order.item'),
            'total' => Session::get('order.total'),
        ]);
    }

    function seat() {
        if (Session::get('customer.seat') === 'take-away') {
            return redirect('payment');
        }
    
        return view('seat', [
            'choices' => explode(' ', Session::get('customer.seat')),
            'seats' => Seat::all()
        ]);
    }

    function payment() {
        if (Session::get('customer.seat') === 'dine-in') {
            return redirect('seat')->with('alert', 'You haven\'t chosen for a seat yet');
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

    function login() {
        return view('login');
    }
}
