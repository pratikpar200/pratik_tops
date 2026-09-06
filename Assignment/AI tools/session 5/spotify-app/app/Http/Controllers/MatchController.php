<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    // create an API endpoint to fetch all upcoming IPL matches
    // each match has id, team1, team2, and match_date
    // if no upcoming matches are found, return a JSON error response
    public function getUpcomingMatches()
    {
        $upcomingMatches = [
            ["id" => 1, "team1" => "Mumbai Indians", "team2" => "Chennai Super Kings", "match_date" => "2026-04-10"],
            ["id" => 2, "team1" => "Royal Challengers Bangalore", "team2" => "Kolkata Knight Riders", "match_date" => "2026-04-12"],
        ];

        // Error handling: check if matches list is empty
        if (empty($upcomingMatches)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No upcoming matches found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'matches' => $upcomingMatches
        ], 200);
    }
}