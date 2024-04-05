<?php

namespace App\Http\Controllers;

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

        // Return the view with the reservations
        return view('workerreservation.index', compact('reservations'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Check if there is a free alley for the given date
        $endDate = $request->date->addHours($request->duration);

        $isAlleyFree = WorkerReservation::whereBetween('start_date', [$request->date, $endDate])->exists();

        // Validate the request
        $request->validate([
            'option_id' => 'required',
            'user_name' => 'required|string',
            'user_phone' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'total_cost' => 'required|numeric',
            'amount_of_people' => 'required|integer',
            'amount_of_children' => 'required|integer',
        ]);

        // Create a new reservation
        WorkerReservation::create([
            'option_id' => $request->option_id,
            'user_name' => $request->user_name,
            'user_phone' => $request->user_phone,
            'date' => $request->date,
            'duration' => $request->duration,
            'total_cost' => $request->total_cost,
            'amount_of_people' => $request->amount_of_people,
            'amount_of_children' => $request->amount_of_children,
            'user_id' => Auth::id(),
        ]);

        // Redirect to the reservations index
        return Redirect::route('workerreservation.index');
    }
}
