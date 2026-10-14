/* Counter Animation Script */
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.counter-value');
    if (counters.length === 0) return;

    let animated = false;
    const animateCounters = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const speed = 200; // lower = faster
            const inc = target / speed;

            const updateCount = () => {
                const current = +counter.innerText;
                if (current < target) {
                    counter.innerText = Math.ceil(current + inc);
                    setTimeout(updateCount, 15);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };
            updateCount();
        });
    };

    window.addEventListener('scroll', () => {
        const counterSection = document.querySelector('.counter-section');
        if (counterSection && !animated) {
            const pos = counterSection.getBoundingClientRect().top;
            if (pos < window.innerHeight - 100) {
                animateCounters();
                animated = true;
            }
        }
    });
});
