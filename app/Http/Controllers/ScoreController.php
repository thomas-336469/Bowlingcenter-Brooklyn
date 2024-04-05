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

    public function edit($id)
    {
        $score = Score::findOrFail($id);

        return view('editscore', compact('score'));
    }

    public function update(Request $request, $id)
    {
        // Find the score by its ID
        $score = Score::findOrFail($id);

        // Update the score attributes with the new values
        $score->name = $request->input('name');
        $score->score = $request->input('score');
        // You may update other attributes as needed

        // Save the updated score
        $score->save();

        // Redirect back to the scores page with a success message
        return redirect()->route('scores')->with('success', 'Score updated successfully.');
    }
}
