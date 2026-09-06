<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class CaptionController extends Controller
{
    protected $openAIService;

    // Inject OpenAIService into the controller
    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generateCaption(Request $request)
    {
        $topic = $request->input('topic');
        $keywords = $request->input('keywords');
        $caption = null;

        if ($topic && $keywords) {
            $caption = $this->openAIService->generateCaption($topic, $keywords);
        }

        return view('caption_form', compact('topic', 'keywords', 'caption'));
    }
}