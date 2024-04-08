<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Alley;

class ReservationController extends Controller
{
    public $person_id = 1;

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

    public function update(Request $request, Reservation $reservation)
    {
        // Validate the request
        $request->validate([
            'alley_id' => 'required|exists:alleys,id',
        ]);

        // Get all alleys with bumpers
        $allChildAlleys = Alley::where('has_bumpers', true)->pluck('id')->toArray();

        // Check if the reservation has children and if the selected alley has bumpers
        if ($reservation->number_of_children > 0 && !in_array($request->alley_id, $allChildAlleys)) {
            return redirect()->back()->withErrors(['The selected alley does not have bumpers']);
        }


        //dd($reservation);
        $reservation->update([
            'alley_id' => $request->alley_id,
        ]);

        return redirect()->route('reservations')->with('success', 'Reservation updated');
    }
}
