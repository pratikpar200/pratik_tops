<!DOCTYPE html>
<html>
<head>
    <title>AI Playlist Summary</title>
</head>
<body>
    <h2>Generate Playlist Summary</h2>

    <form method="POST" action="{{ url('/ai-summary') }}">
        @csrf
        <label>Enter Playlist Description:</label><br>
        <textarea name="prompt" rows="4" cols="50" placeholder="e.g., Summarize this playlist: Best Bollywood hits for a road trip">{{ old('prompt') }}</textarea><br><br>
        <button type="submit">Generate Summary</button>
    </form>

    @if(isset($summary))
        <h3>AI-Generated Summary:</h3>
        <p>{{ $summary }}</p>
    @endif

    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif
</body>
</html>