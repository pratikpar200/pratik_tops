document.addEventListener('DOMContentLoaded', function() {
    // Topbar Sidebar Toggle
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');

    if (toggleSidebarBtn && sidebar) {
        toggleSidebarBtn.addEventListener('click', function() {
            sidebar.classList.add('show');
        });
    }

    if (closeSidebarBtn && sidebar) {
        closeSidebarBtn.addEventListener('click', function() {
            sidebar.classList.remove('show');
        });
    }

    // Chart Placeholders setup
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    borderColor: '#00cec9',
                    backgroundColor: 'rgba(0, 206, 201, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: 'rgba(255,255,255,0.8)' }
                    }
                },
                scales: {
                    y: { ticks: { color: 'rgba(255,255,255,0.6)' }, grid: { color: 'rgba(255,255,255,0.1)' } },
                    x: { ticks: { color: 'rgba(255,255,255,0.6)' }, grid: { display: false } }
                }
            }
        });
    }
});
