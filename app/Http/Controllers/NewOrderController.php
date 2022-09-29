<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewOrderController extends Controller
{
    function index()
    {
        return view('neworder');
    }
}
