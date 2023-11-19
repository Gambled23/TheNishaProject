<style>
    .hidden {
        display: none;
    }
</style>

<div data-carousel="slide">
    <img src='{{ URL::to("/images/{$producto->nombre}.jpg") }}' data-carousel-item="active" alt="Image 1">
    <img src='{{ URL::to("/images/{$producto->nombre}1.jpg") }}' class="hidden" alt="Image 2">
    <img src='image3.jpg' class="hidden" alt="Image 3">
</div>
<button data-carousel-prev>Previous</button>
<button data-carousel-next>Next</button>

<script>
    // Select the carousel and the buttons
    let carousel = document.querySelector('[data-carousel="slide"]');
    let nextButton = document.querySelector('[data-carousel-next]');
    let prevButton = document.querySelector('[data-carousel-prev]');

    // Add event listeners to the buttons
    nextButton.addEventListener('click', function() {
        // Get the current active image
        let activeImage = carousel.querySelector('[data-carousel-item="active"]');
        // Get the next image
        let nextImage = activeImage.nextElementSibling || carousel.firstElementChild;

        // Change the active image
        activeImage.removeAttribute('data-carousel-item');
        activeImage.classList.add('hidden');
        nextImage.setAttribute('data-carousel-item', 'active');
        nextImage.classList.remove('hidden');
    });

    prevButton.addEventListener('click', function() {
        // Get the current active image
        let activeImage = carousel.querySelector('[data-carousel-item="active"]');
        // Get the previous image
        let prevImage = activeImage.previousElementSibling || carousel.lastElementChild;

        // Change the active image
        activeImage.removeAttribute('data-carousel-item');
        activeImage.classList.add('hidden');
        prevImage.setAttribute('data-carousel-item', 'active');
        prevImage.classList.remove('hidden');
    });
</script>
