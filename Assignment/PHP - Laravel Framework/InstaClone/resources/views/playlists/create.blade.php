<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
</head>
<body>
    <h1>Create Event</h1>

    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <label>Event Name:</label><br>
        <input type="text" name="event_name" value="{{ old('event_name') }}"><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" value="{{ old('date') }}"><br><br>

        <label>Location:</label><br>
        <input type="text" name="location" value="{{ old('location') }}"><br><br>

        <button type="submit">Create Event</button>
    </form>
</body>
</html>