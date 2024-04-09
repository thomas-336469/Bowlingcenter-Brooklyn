<?php

namespace App\Http\Controllers;

use App\Models\MazinReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Baan;


class BaanReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $mazinReservations = MazinReservation::all();
        return view('baanReservation.index', compact('mazinReservations', 'user'));
    }


    public function edit($id)
    {
        $mazinReservation = MazinReservation::where('BaanId', $id)->firstOrFail();
        return view('baanReservation.edit', compact('mazinReservation'));
    }





    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nummer' => 'required',
            ]);

            $mazinReservation = MazinReservation::where('BaanId', $id)->firstOrFail();
            $baan = $mazinReservation->baan;

            if ($request->nummer < 7 && !is_null($mazinReservation->AantalKinderen)) {
                // Flash an error message
                session()->flash('error', 'Deze baan is ongeschikt voor kinderen omdat ze geen hekjes hebben');
                return redirect()->back();
            }

            $baan->Nummer = $request->nummer;
            $baan->save();

            // Flash a success message
            //ssession()->flash('success', 'Baanummer is gewijzigd');
        } catch (\Exception $e) {
            // Flash an error message
            session()->flash('error', 'Er is iets misgegaan: ' . $e->getMessage());
        }

        $user = Auth::user(); // Get the authenticated user
        $mazinReservations = MazinReservation::all();

        return view('baanReservation.index')->with(['success' => 'Baanummer is gewijzigd', 'mazinReservations' => $mazinReservations, 'user' => $user]);
    }
}
