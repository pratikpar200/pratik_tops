<!DOCTYPE html>
<html>
<head>
    <title>All Playlists</title>
</head>
<body>
    <h2>All Playlists</h2>
    <ul>
        @foreach ($playlists as $playlist)
            <li>
                <strong>{{ $playlist->name }}</strong> — {{ $playlist->description }}
            </li>
        @endforeach
    </ul>
</body>
</html>