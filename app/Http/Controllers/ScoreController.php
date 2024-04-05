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

        $data = [
            'score' => $result,
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

    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $score->delete();

        return redirect()->back()->with('success', 'Score deleted successfully.');
    }
}
