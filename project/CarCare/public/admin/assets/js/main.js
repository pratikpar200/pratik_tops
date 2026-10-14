/* Admin Main JS */
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    const sidebar = document.getElementById('adminSidebar');
    const mainContent = document.getElementById('adminMainContent');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function () {
            if (window.innerWidth < 992) {
                sidebar.classList.toggle('show-mobile');
            } else {
                sidebar.classList.toggle('collapsed');
                if (mainContent) mainContent.classList.toggle('expanded');
            }
        });
    }
});
