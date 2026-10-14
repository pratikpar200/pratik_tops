        <!-- Footer directly inside the wrapper -->
        <footer class="glass-footer text-center mt-auto p-3">
            <p class="mb-0 text-white-50 small">&copy; 2026 Shipzo Transport.</p>
        </footer>
    </main> <!-- End Main Content -->
    </div> <!-- End Glass Wrapper -->

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Custom JS -->
    <script src="js/main.js"></script>
    
    <!-- Status Toggle Script -->
    <script>
    function toggleStatus(id, type, currentStatus) {
        Swal.fire({
            title: 'Change Status?',
            text: "Are you sure you want to change the status?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('toggle_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${id}&type=${type}&status=${currentStatus}`
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        let btn = document.getElementById(`status-btn-${type}-${id}`);
                        if(data.new_status === 'Active' || data.new_status === 'active') {
                            btn.className = 'btn btn-sm btn-success status-toggle-btn';
                            btn.innerHTML = 'Active';
                        } else {
                            btn.className = 'btn btn-sm btn-danger status-toggle-btn';
                            btn.innerHTML = 'Inactive';
                        }
                        // Update onclick handler
                        btn.setAttribute('onclick', `toggleStatus(${id}, '${type}', '${data.new_status}')`);
                        
                        Swal.fire('Updated!', 'Status has been updated successfully.', 'success');
                    } else {
                        Swal.fire('Error!', 'Failed to update status.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                });
            }
        })
    }
    </script>
</body>
</html>
