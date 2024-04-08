<?php

namespace App\Http\Controllers;

use App\Models\MazinReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaanReservationController extends Controller
{
    public function index() 
    {
        $user = Auth::user(); // Get the authenticated user
        $mazinReservations = MazinReservation::all();
        return view('baanReservation.index', compact('mazinReservations', 'user'));
    }
}
