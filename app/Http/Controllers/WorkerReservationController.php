<?php

namespace App\Http\Controllers;

use App\Models\Alley;
use App\Models\UserReservation;
use App\Models\WorkerReservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WorkerReservationController extends Controller
{
    public function index()
    {
        // Fetch all reservations
        $reservations = WorkerReservation::all();

        // Merge user reservations with worker reservations
        $reservations = $reservations->merge(UserReservation::all());

        // Return the view with the reservations
        return view('workerreservation.index', compact('reservations'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'option_id' => 'required',
            'user_name' => 'required|string',
            'user_phone' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'amount_of_people' => 'required|integer',
            'amount_of_children' => 'required|integer',
        ]);

        // Check if there is a free alley for the given date
        $date = date('Y-m-d H:i:s', strtotime($request->date));
        $endDate = date('Y-m-d H:i:s', strtotime($date . ' + ' . $request->duration . ' hours'));

        $takenAlleys = WorkerReservation::whereBetween('date', [$date, $endDate])
            ->get()
            ->concat(UserReservation::whereBetween('date', [$date, $endDate])->get());

        $isAlleyFree = $takenAlleys->count() < Alley::count();

        if (!$isAlleyFree) {
            return Redirect::back()->withErrors(['date' => 'There are no free alleys for the given date']);
        }

        // Create a new reservation
        WorkerReservation::create([
            'option_id' => $request->option_id,
            'alley_id' => Alley::whereNotIn('id', $takenAlleys->pluck('alley_id'))->first()->id,
            'rate_id' => 1,
            'user_name' => $request->user_name,
            'user_phone' => $request->user_phone,
            'date' => $request->date,
            'duration' => $request->duration,
            'total_cost' => $request->duration * 2,
            'amount_of_people' => $request->amount_of_people,
            'amount_of_children' => $request->amount_of_children,
            'user_id' => Auth::id(),
        ]);

        // Redirect to the reservations index
        return Redirect::route('worker.reservations.index');
    }
}
