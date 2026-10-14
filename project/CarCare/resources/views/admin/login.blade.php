<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - CAR CARE</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}?v={{ filemtime(public_path('admin/assets/css/style.css')) }}">
</head>
<body class="bg-admin-body">

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-5">

                <div class="admin-table-card p-5 text-center">

                    <h3 class="fw-bold font-heading text-warning mb-2">
                        <i class="fa-solid fa-shield-halved me-2"></i>
                        Admin Login
                    </h3>

                    <p class="text-muted text-sm mb-4">
                        Car Care Management System Access
                    </p>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/admin/login') }}">

                        @csrf

                        <div class="mb-3 text-start">
                            <label class="form-label text-xs fw-bold text-muted">
                                Username / Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control bg-dark-main border-secondary text-white"
                                placeholder="Enter admin email"
                                value="admin@carcare.com"
                                required>
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label text-xs fw-bold text-muted">
                                Admin Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control bg-dark-main border-secondary text-white"
                                placeholder="Enter password"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-warning fw-bold text-dark w-100 py-2 rounded-pill">
                            Enter Control Panel
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @if(session('logout_success'))
        <script>
            alert('Logout Successful');
            window.location.href = '{{ url('/admin/login') }}';
        </script>
    @endif

</body>
</html>