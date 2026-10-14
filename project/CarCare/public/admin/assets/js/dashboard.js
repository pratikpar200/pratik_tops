/* Admin Dashboard Search Filter Script */
document.addEventListener("DOMContentLoaded", function () {
    const searchInputs = document.querySelectorAll('.table-search-input');
    searchInputs.forEach(input => {
        input.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const table = this.closest('.admin-table-card').querySelector('tbody');
            if (!table) return;
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const text = rows[i].textContent.toLowerCase();
                if (text.indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    });
});
