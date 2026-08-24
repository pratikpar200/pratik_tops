<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <header>
        <h1>My Website Header</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 My Website Footer</p>
    </footer>
</body>
</html>