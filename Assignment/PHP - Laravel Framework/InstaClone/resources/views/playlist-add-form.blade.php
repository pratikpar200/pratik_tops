<!DOCTYPE html>
<html>
<head>
    <title>Add Playlist</title>
</head>
<body>
    <h2>Create New Playlist</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/playlist/store">
        @csrf
        <label for="name">Playlist Name:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}"><br><br>
        <button type="submit">Create Playlist</button>
    </form>
</body>
</html>