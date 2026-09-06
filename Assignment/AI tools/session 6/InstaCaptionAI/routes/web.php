<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptionController;

Route::get('/', function () {
    return view('caption_form');
});

Route::post('/generate-caption', [CaptionController::class, 'generateCaption']);

Route::get('/', function () {
    return view('caption_form');
});

Route::post('/generate-caption', function (\Illuminate\Http\Request $request) {
    $topic = $request->input('topic');
    $keywords = $request->input('keywords');
    return view('caption_form', compact('topic', 'keywords'));
});