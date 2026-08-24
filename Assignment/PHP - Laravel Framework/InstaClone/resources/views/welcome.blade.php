<!DOCTYPE html>
<html>
<head>
    <title>InstaClone - Home</title>
</head>
<body>
    <h1>Welcome to InstaClone</h1>

    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    <p>
        @auth
            <a href="{{ route('dashboard') }}">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a> |
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </p>
</body>
</html>