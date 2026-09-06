<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    // create API endpoint to add a song to user's playlist
    public function addSong(Request $request)
    {
        $songName = $request->input('song_name');
        $userId = $request->input('user_id');

        if (!$songName || !$userId) {
            return response()->json([
                'status' => 'error',
                'message' => 'song_name and user_id are required'
            ], 400);
        }

        // Normally you would save this to database using a Playlist model
        return response()->json([
            'status' => 'success',
            'message' => "Song '$songName' added to user $userId's playlist"
        ], 200);
    }
}