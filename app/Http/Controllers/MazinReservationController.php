<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MazinReservation;
use App\Models\MazinPersoons;
use App\Models\MazinTypePersoons;
use Illuminate\Support\Facades\Auth;

class MazinReservationController extends Controller
{
    public function index()
    {
        $filterDate = request('filter_date'); // Get the entered date from the index.blade.php file
        $mazinReservations = MazinReservation::when($filterDate, function ($query, $filterDate) {
            return $query->whereDate('datum', $filterDate);
        })->get(); // Get all the reservations from the database that match the entered date
        $user = Auth::user(); // Get the authenticated user

        return view('mazinReservation.index', compact('mazinReservations', 'user'));
    }
}
