<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $scores = collect([
            ['score' => 76, 'team' => 'A'],
            ['score' => 62, 'team' => 'B'],
            ['score' => 82, 'team' => 'C'],
            ['score' => 86, 'team' => 'D'],
            ['score' => 91, 'team' => 'E'],
            ['score' => 67, 'team' => 'F'],
            ['score' => 67, 'team' => 'G'],
            ['score' => 82, 'team' => 'H'],
        ]);

        $ranks = $scores
            ->sortByDesc('score')
            ->groupBy('score') // Group teams with same score together
            ->map(function ($teams) {
                static $rank = 1; // Initialize counter

                $count = $teams->count(); // Get number of teams with the same score

                $rankRange = range($rank, $rank + $count - 1); // Create an array of ranks

                $rank += $count; // Update counter

                return $teams->map(function ($team, $index) use ($rankRange) {
                    $team['rank'] = $rankRange[$index]; // Assign the rank to each team
                    return $team;
                });
            })
            ->collapse();

            return view('rank', ['ranks' => $ranks]);

        $ranks->each(function ($team) {
            echo $team['score'] . ' rank ' . $team['rank'] . "<br>";
        });
    }
}
