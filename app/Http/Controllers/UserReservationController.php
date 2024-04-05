<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReservation;

class UserReservationController extends Controller
{
    public function index()
    {
        return view('UserReservation.index');
    }

    public function create()
    {
        return view('UserReservation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'rate_id' => 'required',
            'alley_id' => 'required',
            'option_id' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'total_cost' => 'required',
            'amount_of_people' => 'required',
            'amount_of_children' => 'required',
        ]);

        UserReservation::create($request->all());

        return redirect()->route('UserReservation.index')
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
            'user_id' => 'required',
            'rate_id' => 'required',
            'alley_id' => 'required',
            'option_id' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'total_cost' => 'required',
            'amount_of_people' => 'required',
            'amount_of_children' => 'required',
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
