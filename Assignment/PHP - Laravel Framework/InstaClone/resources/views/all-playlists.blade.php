<!DOCTYPE html>
<html>
<head>
    <title>All Playlists</title>
</head>
<body>
    @if (isset($message))
        <p style="color: green; font-weight: bold;">{{ $message }}</p>
    @endif

    <h2>All Playlists</h2>
    <ul>
        @foreach ($playlists as $playlist)
            <li>
                <strong>{{ $playlist->name }}</strong> — {{ $playlist->description }}
                (ID: {{ $playlist->id }})
            </li>
        @endforeach
    </ul>
</body>
</html>