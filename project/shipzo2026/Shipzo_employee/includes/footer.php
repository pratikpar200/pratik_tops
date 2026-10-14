        <!-- Footer -->
        <footer class="glass-footer py-3 mt-auto">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <p class="mb-0">&copy; 2026 Shipzo Transport. All rights reserved.</p>
                <div class="footer-links d-flex gap-3">
                    <a href="#" class="text-white-50 text-decoration-none small">Support</a>
                    <a href="#" class="text-white-50 text-decoration-none small">Privacy Policy</a>
                </div>
            </div>
        </footer>

    </main> <!-- End Main Content -->
</div> <!-- End Glass Wrapper -->

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS for Sidebar Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggleSidebar');
        const closeBtn = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');

        if(toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.add('show');
            });
        }

        if(closeBtn) {
            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('show');
            });
        }
    });
</script>

</body>
</html>
