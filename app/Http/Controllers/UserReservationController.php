<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function index()
    {
        return view('UserReservation.index');
    }
}
