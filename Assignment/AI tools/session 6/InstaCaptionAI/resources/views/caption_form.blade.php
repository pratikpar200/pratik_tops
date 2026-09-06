<!DOCTYPE html>
<html>
<head>
    <title>InstaCaptionAI</title>
    <style>
        .hashtag {
            color: #1DA1F2;
            font-weight: bold;
        }
        .topic-highlight {
            background-color: yellow;
            padding: 2px 4px;
        }
    </style>
</head>
<body>
    <h2>Generate Instagram Caption</h2>

    <form method="POST" action="{{ url('/generate-caption') }}">
        @csrf
        <label>Photo Topic:</label><br>
        <input type="text" name="topic" placeholder="e.g., Sunset at the beach" value="{{ old('topic', $topic ?? '') }}"><br><br>

        <label>Keywords (3-5, comma separated):</label><br>
        <input type="text" name="keywords" placeholder="e.g., travel, sunset, peace, beach" value="{{ old('keywords', $keywords ?? '') }}"><br><br>

        <button type="submit">Submit</button>
    </form>

    @if(isset($caption) && $caption)
        <h3>AI-Generated Instagram Caption:</h3>
        <div style="border:1px solid #ccc; padding:15px; max-width:500px;">
            {!! nl2br(formatCaption($caption, $topic)) !!}
        </div>
    @endif
</body>
</html>

@php
    // Helper function to bold the topic and highlight hashtags
    function formatCaption($caption, $topic) {
        // Highlight the main topic wherever it appears (case-insensitive)
        if ($topic) {
            $caption = preg_replace('/(' . preg_quote($topic, '/') . ')/i', '<span class="topic-highlight"><b>$1</b></span>', $caption);
        }

        // Bold and color all hashtags (words starting with #)
        $caption = preg_replace('/#(\w+)/', '<span class="hashtag">#$1</span>', $caption);

        return $caption;
    }
@endphp