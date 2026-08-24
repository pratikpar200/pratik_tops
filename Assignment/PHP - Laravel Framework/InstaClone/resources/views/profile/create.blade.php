<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Picture</title>
</head>
<body>
    <h1>Upload Profile Picture</h1>

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

    @if ($user->profile && $user->profile->profile_picture_url)
        <p>Current picture:</p>
        <img src="{{ asset('storage/' . $user->profile->profile_picture_url) }}" width="150"><br><br>
    @endif

    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Profile Picture:</label><br>
        <input type="file" name="profile_picture"><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>