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
        $mazinPersoons = MazinPersoons::all();

        return view('MazinReservation.index', compact('mazinReservations', 'mazinPersoons'));
    }

    public function edit($id)
    {
        $mazinReservation = MazinReservation::findOrFail($id);
        $mazinPersoons = MazinPersoons::all();

        return view('MazinReservation.edit', compact('mazinReservation', 'mazinPersoons'));
    }
}
