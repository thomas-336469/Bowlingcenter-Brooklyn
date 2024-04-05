<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {

        return view('addscore');
    }

    public function store()
    {
        Score::create([
            'reservation_id' => request('reservation_id'),
            'name' => request('name'),
            'score' => request('score'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect(route('scores'));
    }
}
