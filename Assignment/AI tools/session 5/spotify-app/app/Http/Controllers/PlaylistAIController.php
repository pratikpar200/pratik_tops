<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class PlaylistAIController extends Controller
{
    public function generatePlaylistDescription(Request $request)
    {
        $prompt = $request->input('prompt', 'Summarize this playlist: Best Bollywood hits for a road trip');

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $summary = $result->choices[0]->message->content;

        return response()->json([
            'status' => 'success',
            'summary' => $summary
        ]);
    }

    public function showSummaryForm(Request $request)
    {
        $summary = null;
        $error = null;

        if ($request->isMethod('post')) {
            $prompt = $request->input('prompt');

            if (empty($prompt)) {
                $error = "Please enter a playlist description before submitting.";
                return view('ai_summary', compact('summary', 'error'));
            }

            try {
                $result = OpenAI::chat()->create([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt],
                    ],
                ]);

                $summary = $result->choices[0]->message->content;

            } catch (\OpenAI\Exceptions\ErrorException $e) {
                $error = "AI service error: Please check the API key or try again later.";

            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                $error = "Network error: Unable to connect to the AI service. Please check your internet connection.";

            } catch (\Exception $e) {
                $error = "Something went wrong while generating the summary. Please try again.";
            }
        }

        return view('ai_summary', compact('summary', 'error'));
    }
}