<style>
    .carousel-hidden {
        display: none;
    }
    .carousel-container {
        width: 90%; /* Adjust as needed */
        height: 90%; /* Adjust as needed */
        overflow: hidden;
        border-radius: 1px; /* Adjust as needed */
    }
    .carousel-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Changed from contain to cover */
        border-radius: 2%; /* Adjust as needed */
    }
</style>

<div class="mx-4 md:w-1/3 flex flex-col items-center"> 
    <div class="carousel-container" data-carousel="slide">
        @for ($i = 0; $i < $producto->imagenesTotales; $i++)
            <img src='{{ URL::to("/images/{$producto->nombre}_{$i}.jpg") }}' class="{{ $i == 0 ? '' : 'carousel-hidden' }}" alt="Image {{ $i + 1 }}">
        @endfor
    </div>
    <div class="flex justify-center mt-4">
        <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mr-2" data-carousel-prev title="Anterior imagen">🡠</button>
        <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded ml-2" data-carousel-next title="Siguiente imagen">🡢</button>
    </div>
</div>
<script>
    // Select the carousel and the buttons
    let carousel = document.querySelector('[data-carousel="slide"]');
    let nextButton = document.querySelector('[data-carousel-next]');
    let prevButton = document.querySelector('[data-carousel-prev]');

    // Add event listeners to the buttons
    nextButton.addEventListener('click', function() {
        // Get the current active image
        let activeImage = carousel.querySelector('img:not(.carousel-hidden)');
        // Get the next image
        let nextImage = activeImage.nextElementSibling || carousel.firstElementChild;

        // Change the active image
        activeImage.classList.add('carousel-hidden');
        nextImage.classList.remove('carousel-hidden');
    });

    prevButton.addEventListener('click', function() {
        // Get the current active image
        let activeImage = carousel.querySelector('img:not(.carousel-hidden)');
        // Get the previous image
        let prevImage = activeImage.previousElementSibling || carousel.lastElementChild;

        // Change the active image
        activeImage.classList.add('carousel-hidden');
        prevImage.classList.remove('carousel-hidden');
    });
</script>