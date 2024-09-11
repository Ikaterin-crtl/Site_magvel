document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector('.carousel-control.prev');
    const nextButton = document.querySelector('.carousel-control.next');
    const indicators = document.querySelectorAll('.carousel-indicators button');
    const carouselInner = document.querySelector('.carousel-inner');
    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        carouselInner.style.transform = `translateX(${offset}%)`;
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentIndex);
        });
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : indicators.length - 1;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex < indicators.length - 1) ? currentIndex + 1 : 0;
        updateCarousel();
    });

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
    });
});


document.getElementById('menuToggle').addEventListener('click', function() {
    var navbar = document.getElementById('navbar');
    var menuToggle = document.getElementById('menuToggle');
    navbar.classList.toggle('menu-active');
    menuToggle.classList.toggle('active');
});
