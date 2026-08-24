<!DOCTYPE html>
<html>
<head>
    <title>Comment XSS Demo</title>
</head>
<body>
    <h2>Instagram-style Comment Box (XSS Demo)</h2>

    <form method="GET" action="/comment-demo">
        <label for="comment">Enter a comment:</label><br>
        <input type="text" name="comment" id="comment" size="60" value="{{ $rawComment ?? '' }}">
        <button type="submit">Post Comment</button>
    </form>

    <hr>

    <h3>❌ Vulnerable Output (using {!! !!} - NOT escaped)</h3>
    <div style="border:1px solid red; padding:10px;">
        {!! $rawComment ?? 'No comment posted yet.' !!}
    </div>

    <h3>✅ Safe Output (using {{ }} - Blade auto-escaped)</h3>
    <div style="border:1px solid green; padding:10px;">
        {{ $rawComment ?? 'No comment posted yet.' }}
    </div>
</body>
</html>