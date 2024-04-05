<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserReservation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rate;
use App\Models\Alley;
use App\Models\WorkerReservation;

class UserReservationController extends Controller
{
    // Display a listing of the reservations.
    public function index()
    {
        $reservations = UserReservation::all();

        return view('UserReservation.index', compact('reservations'));
    }

    // Show the form for creating a new reservation.
    public function create()
    {
        $options = Option::all();
        return view('UserReservation.create', compact('options'));
    }

    // Store a newly created reservation in storage.
    public function store(Request $request)
    {        
        // Validate the incoming request data.
        $request->validate([
            'option_id' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'amount_of_people' => 'required',
            'amount_of_children' => 'required'
        ]);
    
        // Merge additional data into the request.
        $request->merge([
            'total_cost' => 0,
            'alley_id' => 1,
            'rate_id' => 1
        ]);

        // get the date times for the whereBetween query
        $date = date('Y-m-d H:i:s', strtotime($request->date));
        $endDate = date('Y-m-d H:i:s', strtotime($date . ' + ' . $request->duration . ' hours'));

        // get all reservations for the given date
        $takenAlleys = WorkerReservation::whereBetween('date', [$date, $endDate])
            ->get()
            ->concat(UserReservation::whereBetween('date', [$date, $endDate])->get());
        $isAlleyFree = $takenAlleys->count() < Alley::count();

        // Check if there are any free alleys if not return back with an error
        if (!$isAlleyFree) {
            return Redirect::back()->withErrors(['date' => 'There are no free alleys for the given date']);
        }

        // Get the rate for the given date
        $daytime = ($request->date < date('Y-m-d 18:00:00')) ? 'Day' : 'Night';
        $rate = Rate::where('weekday', date('l', strtotime($request->date)))->where('period', $daytime)
            ->first();
    
        // Create a new reservation record.
        UserReservation::create([
            'user_id' => auth()->user()->id,
            'option_id' => $request->option_id,
            'rate_id' => $request->rate_id,
            'alley_id' => $request->alley_id,
            'date' => $request->date,
            'duration' => $request->duration,
            'total_cost' => $request->total_cost,
            'amount_of_people' => $request->amount_of_people,
            'amount_of_children' => $request->amount_of_children
        ]);

        // Log the store action.
        Log::info('2nd Store method called', ['request' => $request->all()]);

        // Redirect to index page with success message.
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully');

        // This log will not be reached as it is after the return statement.
        Log::info('3rd Store method called', ['request' => $request->all()]);
    }

    // Display the specified reservation.
    public function show(UserReservation $userReservation)
    {
        return view('UserReservation.show', ['userReservation' => $userReservation]);
    }

    // Show the form for editing the specified reservation.
    public function edit($id)
    {
        $reservation = UserReservation::findOrFail($id);
        return view('UserReservation.edit', compact('reservation'), ['options' => Option::all()]);
    }

    // Update the specified reservation in storage.
    public function update($id, Request $request, UserReservation $userReservation)
    {
        // Validate the incoming request data.
        $request->validate([
            'option_id' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'amount_of_people' => 'required',
            'amount_of_children' => 'required'
        ]);

        // Find the reservation by ID and update it with new data.
        $userReservation = UserReservation::findOrFail($id);
        $userReservation->update($request->all());

        // Redirect to index page with success message.
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully');
    }

    // Remove the specified reservation from storage.
    public function destroy($id)
    {
        // Find the reservation by ID and delete it.
        $reservation = UserReservation::findOrFail($id);
        $reservation->delete();

        // Redirect to index page with success message.
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully');
    }
}
