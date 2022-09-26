<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    function getAll()
    {
        $seats = Seat::all();
        return response()->json($seats);
    }
}
