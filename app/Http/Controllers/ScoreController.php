<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{

    private $scoreModel;

    public function __construct(Score $scoreModel)
    {
        $this->scoreModel = $scoreModel;
    }

    public function index()
    {
        $reservation_id = 1;
        $result = $this->scoreModel->getScores($reservation_id);

        $list = "";
        foreach ($result as $scoreOutput) {

            $list .= "<div class='py-1 m-5 bg-[#fbd158]'>
            <div class='flex gap-10 m-3 w-l'>
                <p class='align-self-center'>Naam: $scoreOutput->name | Score: $scoreOutput->score</p>
                <div>
                    <button class='bg-[#fbede2] py-3 w-20 rounded-md'>Edit</button>
                    <button class='bg-[#fbede2] py-3 w-20 rounded-md'>Delete</button>
                </div>
            </div>
        </div>";
        }


        $data = [
            'score' => $list,
        ];

        return view('scores', $data);
    }

    public function add()
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
