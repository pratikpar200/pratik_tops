<!DOCTYPE html>
<html>
<head>
    <title>Edit Playlist</title>
</head>
<body>
    <h1>Edit Playlist</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($playlist->cover_image)
        <p>Current cover:</p>
        <img src="{{ asset('storage/' . $playlist->cover_image) }}" width="150"><br><br>
    @endif

    <form action="{{ route('playlists.update', $playlist->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $playlist->name) }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description', $playlist->description) }}</textarea><br><br>

        <label>Cover Image (leave empty to keep current):</label><br>
        <input type="file" name="cover_image"><br><br>

        <button type="submit">Update Playlist</button>
    </form>
</body>
</html>