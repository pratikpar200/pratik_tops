<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class OpenAIService
{
    public function generateCaption($topic, $keywords)
    {
        $prompt = "Act as a professional social media content creator. 
                   Write a short, catchy, and trend-aware Instagram caption about \"{$topic}\". 
                   Naturally include these keywords: {$keywords}. 
                   Use 1-2 relevant emojis within the caption. 
                   End with exactly 4 trending and relevant hashtags. 
                   Keep the caption under 150 characters (excluding hashtags). 
                   Tone: fun, relatable, and engaging for Gen Z audience.";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return $result->choices[0]->message->content;
    }
}