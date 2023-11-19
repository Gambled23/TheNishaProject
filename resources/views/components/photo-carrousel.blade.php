<style>
    .hidden {
        display: none;
    }
</style>

<div data-carousel="slide">
    @for ($i = 0; $i < $producto->imagenesTotales; $i++)
        <img src='{{ URL::to("/images/{$producto->nombre}_{$i}.jpg") }}' class="{{ $i == 0 ? '' : 'hidden' }}" alt="Image {{ $i + 1 }}">
    @endfor
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
        let activeImage = carousel.querySelector('img:not(.hidden)');
        // Get the next image
        let nextImage = activeImage.nextElementSibling || carousel.firstElementChild;

        // Change the active image
        activeImage.classList.add('hidden');
        nextImage.classList.remove('hidden');
    });

    prevButton.addEventListener('click', function() {
        // Get the current active image
        let activeImage = carousel.querySelector('img:not(.hidden)');
        // Get the previous image
        let prevImage = activeImage.previousElementSibling || carousel.lastElementChild;

        // Change the active image
        activeImage.classList.add('hidden');
        prevImage.classList.remove('hidden');
    });
</script>
