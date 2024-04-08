<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MazinReservation;

class MazinReservationController extends Controller
{
    public function index()
    {
        $mazinReservation = MazinReservation::all();

        return view('MazinReservation.index', compact('mazinReservation'));
    }
}
