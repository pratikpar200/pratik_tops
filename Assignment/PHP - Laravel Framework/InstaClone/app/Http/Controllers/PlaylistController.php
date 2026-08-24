<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function songs($id)
    {
        $playlist = Playlist::findOrFail($id);
        $songs = $playlist->songs;

        return response()->json([
            'playlist' => $playlist->name,
            'songs' => $songs,
        ]);
    }

    public function index()
    {
        $playlists = Playlist::with('songs')->get();

        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string|max:200',
            'cover_image' => 'nullable|image',
        ], [
            'name.required' => 'Playlist name cannot be empty',
            'name.min' => 'Playlist name must be at least 3 characters',
            'cover_image.image' => 'Please upload a valid image file.',
            'description.max' => 'Description cannot exceed 200 characters.',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $validated['cover_image'] = $path;
        }

        Playlist::create($validated);

        return redirect()->route('playlists.index');
    }

    public function edit($id)
    {
        $playlist = Playlist::findOrFail($id);

        return view('playlists.edit', compact('playlist'));
    }

    public function update(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string|max:200',
            'cover_image' => 'nullable|image',
        ], [
            'name.required' => 'Playlist name cannot be empty',
            'name.min' => 'Playlist name must be at least 3 characters',
            'cover_image.image' => 'Please upload a valid image file.',
            'description.max' => 'Description cannot exceed 200 characters.',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($playlist->cover_image) {
                Storage::disk('public')->delete($playlist->cover_image);
            }

            $path = $request->file('cover_image')->store('covers', 'public');
            $validated['cover_image'] = $path;
        }

        $playlist->update($validated);

        return redirect()->route('playlists.index');
    }

    public function getTopSongs()
{
    $playlists = Playlist::with('songs')->get();

    return view('playlists.index', compact('playlists'));
}


    
    public function destroy($id)


    {
        $playlist = Playlist::findOrFail($id);

        if ($playlist->cover_image) {
            Storage::disk('public')->delete($playlist->cover_image);
        }

        $playlist->delete();

        return redirect()->route('playlists.index');
    }
}