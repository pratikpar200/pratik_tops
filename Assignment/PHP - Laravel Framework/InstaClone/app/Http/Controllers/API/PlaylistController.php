<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display all playlists.
     */
    public function index()
    {
        $playlists = Playlist::all();

        return response()->json([
            'success' => true,
            'data' => $playlists
        ]);
    }

    /**
     * Store a new playlist.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $playlist = Playlist::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $request->cover_image,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Playlist created successfully.',
            'data' => $playlist
        ], 201);
    }

    /**
     * Display a specific playlist.
     */
    public function show(string $id)
    {
        $playlist = Playlist::find($id);

        if (!$playlist) {
            return response()->json([
                'success' => false,
                'message' => 'Playlist not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $playlist
        ]);
    }

    /**
     * Update a specific playlist.
     */
    public function update(Request $request, string $id)
    {
        $playlist = Playlist::find($id);

        if (!$playlist) {
            return response()->json([
                'success' => false,
                'message' => 'Playlist not found.'
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $playlist->update($request->only([
            'name',
            'description',
            'cover_image'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Playlist updated successfully.',
            'data' => $playlist
        ]);
    }

    /**
     * Delete a specific playlist.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::find($id);

        if (!$playlist) {
            return response()->json([
                'success' => false,
                'message' => 'Playlist not found.'
            ], 404);
        }

        $playlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Playlist deleted successfully.'
        ]);
    }
}