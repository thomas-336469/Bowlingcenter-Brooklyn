<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public $person_id = 3;

    public function index()
    {
        $reservations = Reservation::where('person_id', $this->person_id)
            ->orderBy('reservation_date', 'desc')
            ->get();
        $user = Person::find($this->person_id);

        return view('reservation.index', compact('reservations', 'user'));
    }

    public function filter(Request $request)
    {
        $reservations = Reservation::where('person_id', $this->person_id)
            ->whereBetween('reservation_date', [$request->date, date('Y-m-d')])
            ->orderBy('reservation_date', 'desc')
            ->get();
        $user = Person::find($this->person_id);

        return view('reservation.index', compact('reservations', 'user'));
    }
}
