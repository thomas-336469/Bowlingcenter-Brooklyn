<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MazinReservation;
use App\Models\MazinPersoons;

class MazinReservationController extends Controller
{
    public function index()
    {
        $filterDate = request('filter_date'); // Get the entered date from the index.blade.php file
        $mazinReservations = MazinReservation::when($filterDate, function ($query, $filterDate) {
            return $query->whereDate('datum', $filterDate);
        })->get(); // Get all the reservations from the database that match the entered date

        return view('mazinReservation.index', compact('mazinReservations'));
    }

    public function edit($id)
    {
        $mazinReservation = MazinReservation::findOrFail($id);

        return view('MazinReservation.edit', compact('mazinReservation'));
    }
}
