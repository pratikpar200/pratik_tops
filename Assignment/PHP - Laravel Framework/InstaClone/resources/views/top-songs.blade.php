<!DOCTYPE html>
<html>
<head>
    <title>Top Songs</title>
</head>
<body>
    <h2>Hello, {{ $username }}!</h2>
    <h3>Top Trending Songs</h3>
    <ul>
        @foreach ($songs as $song)
            <li>{{ $song }}</li>
        @endforeach
    </ul>
</body>
</html>