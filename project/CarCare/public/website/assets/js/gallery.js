/* Gallery Filtering & Lightbox Modal JS */
document.addEventListener("DOMContentLoaded", function () {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item-col');

    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                        item.classList.add('animate', 'fadeIn');
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // Modal Image Preview
    const previewModal = document.getElementById('galleryPreviewModal');
    if (previewModal) {
        previewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const imgSrc = button.getAttribute('data-img');
            const title = button.getAttribute('data-title');
            
            document.getElementById('modalImage').src = imgSrc;
            document.getElementById('modalTitle').innerText = title;
        });
    }
});
