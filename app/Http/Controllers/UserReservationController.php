<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserReservation;

class UserReservationController extends Controller
{
    public function index()
    {
        $reservations = UserReservation::all();

        return view('UserReservation.index', compact('reservations'));
    }

    public function create()
    {
        return view('UserReservation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'option' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'amount_of_people' => 'required|integer',
        ]);

        UserReservation::create($request->all());
        
        return redirect()->route('reservations.index')
            ->with('success', 'UserReservation created successfully.');
    }

    public function show(UserReservation $UserReservation)
    {
        return view('UserReservation.show', compact('UserReservation'));
    }

    public function edit(UserReservation $UserReservation)
    {
        return view('UserReservation.edit', compact('UserReservation'));
    }

    public function update(Request $request, UserReservation $UserReservation)
    {
        $request->validate([
            'option' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'amount_of_people' => 'required',
        ]);

        $UserReservation->update($request->all());

        return redirect()->route('UserReservation.index')
            ->with('success', 'UserReservation updated successfully');
    }

    public function destroy(UserReservation $UserReservation)
    {
        $UserReservation->delete();

        return redirect()->route('UserReservation.index')
            ->with('success', 'UserReservation deleted successfully');
    }
}
