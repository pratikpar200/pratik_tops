<?php

namespace App\Http\Controllers;

use OpenAI;

class TestOpenAIController extends Controller
{
    public function testInstall()
    {
        if (class_exists(OpenAI::class)) {
            return response()->json(['status' => 'success', 'message' => 'openai-php/client is installed correctly']);
        }
        return response()->json(['status' => 'error', 'message' => 'Package not found']);
    }
}