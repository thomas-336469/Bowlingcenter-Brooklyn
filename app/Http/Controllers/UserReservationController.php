<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserReservation;
use Illuminate\Support\Facades\Log;

class UserReservationController extends Controller
{
    public function index()
    {
        $reservations = UserReservation::all();

        return view('UserReservation.index', ['reservations' => $reservations]);
    }

    public function create()
    {
        $options = Option::all();
        return view('UserReservation.create', ['options' => $options]);
    }

    public function store(Request $request)
    {        
        $request->validate([
            'option_id' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'amount_of_people' => 'required',
            'amount_of_children' => 'required'
        ]);
    
        $request->merge([
            'total_cost' => 0,
            'alley_id' => 1,
            'rate_id' => 1
        ]);
    
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

        Log::info('2nd Store method called', ['request' => $request->all()]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully');

        Log::info('3rd Store method called', ['request' => $request->all()]);
    }
}
