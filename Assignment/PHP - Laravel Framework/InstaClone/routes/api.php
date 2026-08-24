<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Login route - authenticates user and returns Sanctum token
Route::post('/login', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation error',
            'errors' => $validator->errors(),
        ], 422);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || !Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'message' => 'Login successful',
        'user' => $user,
        'token' => $token,
    ], 200);
});

// Favorite songs route - protected by Sanctum + API request logging
Route::middleware(['auth:sanctum', 'log.api'])->get('/favorite-songs', function (Request $request) {
    $favoriteSongs = [
        'Kesariya - Arijit Singh',
        'Apna Bana Le - Arijit Singh',
        'Tum Hi Ho - Arijit Singh',
        'Raataan Lambiyan - Jubin Nautiyal',
        'Chaiyya Chaiyya - Sukhwinder Singh',
    ];

    return response()->json([
        'message' => 'Favorite songs fetched successfully',
        'user' => $request->user()->name,
        'favorite_songs' => $favoriteSongs,
    ], 200);
});

// Logout route - revokes the current Sanctum token + API request logging
Route::middleware(['auth:sanctum', 'log.api'])->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Logged out successfully. Token revoked.',
    ], 200);
});