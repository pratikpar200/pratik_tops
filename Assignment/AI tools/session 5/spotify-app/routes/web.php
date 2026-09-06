<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistAIController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ai-summary', [PlaylistAIController::class, 'showSummaryForm']);
Route::post('/ai-summary', [PlaylistAIController::class, 'showSummaryForm']);