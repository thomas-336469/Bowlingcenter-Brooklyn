<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MazinReservation;
use App\Models\MazinPersoons;

class MazinReservationController extends Controller
{
    public function index()
    {
        $mazinReservations = MazinReservation::all();

        return view('MazinReservation.index', compact('mazinReservations'));
    }

    public function edit($id)
    {
        $mazinReservation = MazinReservation::findOrFail($id);

        return view('MazinReservation.edit', compact('mazinReservation'));
    }
}
