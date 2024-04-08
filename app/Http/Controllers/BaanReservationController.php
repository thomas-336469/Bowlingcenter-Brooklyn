<?php

namespace App\Http\Controllers;

use App\Models\MazinReservation;
use Illuminate\Http\Request;

class BaanReservationController extends Controller
{
    public function index() 
    {
        $mazinReservation = MazinReservation::all();
        return view('baanReservation.index', compact('mazinReservation'));
    }
}
