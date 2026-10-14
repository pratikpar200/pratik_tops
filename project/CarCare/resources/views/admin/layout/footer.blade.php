<!-- Admin Footer -->
        <footer class="admin-footer bg-dark text-white border-top border-secondary border-opacity-25 py-3 px-4 mt-auto">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between text-xs text-muted">
                <div>
                    &copy; {{ date('Y') }} <span class="text-warning font-heading fw-bold">CAR CARE</span> Admin Panel. All Rights Reserved.
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ url('/') }}" target="_blank" class="text-muted text-decoration-none me-3 hover-warning"><i class="fa-solid fa-globe me-1"></i> Visit Main Website</a>
                    <a href="{{ url('/admin/settings') }}" class="text-muted text-decoration-none me-3 hover-warning">Settings</a>
                    <a href="{{ url('/admin/profile') }}" class="text-muted text-decoration-none hover-warning">Help & Support</a>
                </div>
            </div>
        </footer>
    </div> <!-- End Main Content Container -->
</div> <!-- End Admin Wrapper -->

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Admin JS Files -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>

@if(session('login_success'))
    <script>
        alert('Login Successful');
    </script>
@endif

</body>
</html>