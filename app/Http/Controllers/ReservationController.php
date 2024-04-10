<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Persoons;
use App\Models\TypePersoons;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $filterDate = request('filter_date'); // Get the entered date from the index.blade.php file
        $Reservations = Reservation::when($filterDate, function ($query, $filterDate) {
            return $query->whereDate('datum', $filterDate);
        })->get(); // Get all the reservations from the database that match the entered date
        $user = Auth::user(); // Get the authenticated user

        return view('Reservation.index', compact('Reservations', 'user'));
    }
}
