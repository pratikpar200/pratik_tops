<!DOCTYPE html>
<html>
<head>
    <title>Playlists</title>
</head>
<body>
    <h1>All Playlists</h1>

    <a href="{{ route('playlists.create') }}">+ Add New Playlist</a>
    <br><br>

    @foreach ($playlists as $playlist)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;">
            @if ($playlist->cover_image)
                <img src="{{ asset('storage/' . $playlist->cover_image) }}" width="150"><br>
            @endif

            <h3>{{ $playlist->name }}</h3>
            <p>{{ $playlist->description }}</p>

            <ul>
                @forelse ($playlist->songs as $song)
                    <li>{{ $song->title }}</li>
                @empty
                    <li>No songs in this playlist.</li>
                @endforelse
            </ul>

            <a href="{{ route('playlists.edit', $playlist->id) }}">Edit</a>

            <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this playlist?')">Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>