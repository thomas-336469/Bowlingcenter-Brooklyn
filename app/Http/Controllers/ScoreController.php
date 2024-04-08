<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{

    private $scoreModel;

    public function __construct(Score $scoreModel)
    {
        $this->scoreModel = $scoreModel;
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $reservation_id = $this->scoreModel->getReservationId($user_id);
        $result = $this->scoreModel->getScores($reservation_id[0]->id);

        $data = [
            'score' => $result,
        ];

        return view('scores', $data);
    }

    public function add()
    {
        return view('addscore');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|integer|between:0,300', // Set maximum score limit to 300
            'date' => 'required|date',
        ], [
            'score.between' => 'Het aantal punten is niet geldig, voer een waarde in kleiner of gelijk aan 300 in.',
        ]);

        Score::create([
            'reservation_id' => request('reservation_id'),
            'name' => request('name'),
            'score' => request('score'),
            'date' => request('date'),
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

    public function edit($id)
    {
        $score = Score::findOrFail($id);

        return view('editscore', compact('score'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|integer|between:0,300', // Set maximum score limit to 300
            'date' => 'required|date',
        ], [
            'score.between' => 'Het aantal punten is niet geldig, voer een waarde in kleiner of gelijk aan 300 in.',
        ]);

        // Find the score by its ID
        $score = Score::findOrFail($id);

        // Update the score attributes with the new values
        $score->name = $request->input('name');
        $score->score = $request->input('score');
        $score->date = $request->input('date');
        // You may update other attributes as needed

        // Save the updated score
        $score->save();

        // Redirect back to the scores page with a success message
        return redirect()->route('scores')->with('success', 'Score updated successfully.');
    }

    public function filterByDate(Request $request)
    {
        $filterDate = $request->input('filter_date');
        $user_id = auth()->user()->id;
        $reservation_id = $this->scoreModel->getReservationId($user_id);

        $scores = $this->scoreModel
            ->where('reservation_id', $reservation_id[0]->id)
            ->whereDate('date', $filterDate)
            ->orderBy('score', 'desc')
            ->get();

        if ($scores->isEmpty()) {
            return redirect()->back()->with('error', 'Er is geen uitslag beschikbaar voor deze geselecteerde datum.');
        }

        $data = [
            'score' => $scores,
        ];

        return view('scores', $data);
    }
}
