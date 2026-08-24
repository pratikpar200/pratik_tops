<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Gallery</title>
</head>
<body>
    <h1>Profile Picture Gallery</h1>

    @forelse ($files as $file)
        <img src="{{ asset('storage/' . $file) }}" width="150" style="margin: 10px;">
    @empty
        <p>No profile pictures uploaded yet.</p>
    @endforelse
</body>
</html>