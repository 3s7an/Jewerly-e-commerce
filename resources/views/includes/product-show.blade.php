@extends('layout')

@section('content')

<style>
    /* Hover behavior: on hover, all stars before the hovered one should also turn yellow */
    .peer:hover ~ .star {
        color: #fbbf24; /* Tailwind yellow-400 */
    }

    /* Checked behavior: when a star is checked, all previous stars should be yellow */
    .peer-checked ~ .star {
        color: #fbbf24; /* Tailwind yellow-500 */
    }

    /* Hover behavior on individual stars */
    .peer:hover ~ .star:hover,
    .peer:hover ~ .star ~ .star:hover,
    .peer:hover ~ .star ~ .star ~ .star:hover,
    .peer:hover ~ .star ~ .star ~ .star ~ .star:hover {
        color: #fbbf24; /* Tailwind yellow-400 */
    }
</style>


<div class="flex justify-center min-h-screen bg-gray-100">
    <div class="container mx-auto max-w-7xl bg-white shadow-lg p-6">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 mb-6 md:mb-0">
                <div class="relative w-full overflow-hidden">
                    <!-- Carousel Wrapper -->
                    <div class="flex transition-transform duration-500 ease-in-out" id="carousel-slides">
                      <!-- Slide 1 -->
                      <div class="flex-none w-full">
                        <img src="{{$product->getImageURL() }}" alt="Slide 1" class="w-full h-auto">
                      </div>
                      <!-- Slide 2 -->
                      <div class="flex-none w-full">
                        <img src="{{$product->getImageURL() }}" alt="Slide 2" class="w-full h-auto">
                      </div>
                      <!-- Slide 3 -->
                      <div class="flex-none w-full">
                        <img src="{{$product->getImageURL() }}" alt="Slide 3" class="w-full h-auto">
                      </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button id="prev-btn" class="absolute top-1/2 left-4 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                      &#10094; <!-- Left arrow -->
                    </button>
                    <button id="next-btn" class="absolute top-1/2 right-4 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                      &#10095; <!-- Right arrow -->
                    </button>
                  </div>

            </div>


            <div class="md:w-1/2 md:pl-6 align-center justify-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4 text-center">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 mb-2 text-center font-bold">Popis produktu:</p>
                <p class="text-gray-700 mb-6 text-base text-center">{{ $product->description }}</p>
                <div class="flex  mb-4 justify-center">
                    <span class="text-lg font-semibold text-center">Cena:</span>
                    <span class="text-2xl font-bold text-gray-600 ml-2 text-center">{{ $product->price }} €</span>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="bg-gray-500 text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-gray-600 transition duration-200 flex items-center justify-center mx-auto" type="submit" name="cart-send">
                        <i class="fa-solid fa-cart-shopping mr-2"></i> Add to cart
                    </button>
                </form>
            </div>

        </div>


        <h1 class="mt-6 text-3xl font-bold ml-3">Reviews</h1>

        @foreach ($reviews as $review)


          <div class="w-full bg-white p-6 rounded-lg shadow-md my-2">
              <p class="text-gray-700 text-lg mb-4">{{ $review->text ?? 'No text available' }}</p>
              <p class="text-yellow-500 font-bold mb-2">Rating : {{ $review->rating ?? 'N/A' }} / 5</p>
              <p class="text-gray-500 text-sm">{{ $review->user->name ?? 'Anonymous' }}</p>
              <a href="">delete</a>
              <a href="">edit</a>
          </div>




        @endforeach
    <br>

    <form action ="{{route('review.store')}}" method="get">

      <input type="hidden" name="product_id" value="{{$product->id}}">

      <div class="flex items-center space-x-2 my-2">
        <label for="rating" class="mr-2">Rating</label>
        <div class="flex items-center flex-row-reverse">
            <!-- Star 5 -->
            <input type="radio" id="star1" name="rating" value="5" class="hidden peer" />
            <label for="star1" class="star text-gray-400 cursor-pointer text-3xl peer-checked:text-yellow-500 hover:text-yellow-500 peer-hover:text-yellow-500">&#9733;</label>

            <!-- Star 4 -->
            <input type="radio" id="star2" name="rating" value="4" class="hidden peer" />
            <label for="star2" class="star text-gray-400 cursor-pointer text-3xl peer-checked:text-yellow-500 hover:text-yellow-500 peer-hover:text-yellow-500">&#9733;</label>

            <!-- Star 3 -->
            <input type="radio" id="star3" name="rating" value="3" class="hidden peer" />
            <label for="star3" class="star text-gray-400 cursor-pointer text-3xl peer-checked:text-yellow-500 hover:text-yellow-500 peer-hover:text-yellow-500">&#9733;</label>

            <!-- Star 2 -->
            <input type="radio" id="star4" name="rating" value="2" class="hidden peer" />
            <label for="star4" class="star text-gray-400 cursor-pointer text-3xl peer-checked:text-yellow-500 hover:text-yellow-500 peer-hover:text-yellow-500">&#9733;</label>

            <!-- Star 1 -->
            <input type="radio" id="star5" name="rating" value="1" class="hidden peer" />
            <label for="star5" class="star text-gray-400 cursor-pointer text-3xl peer-checked:text-yellow-500 hover:text-yellow-500 peer-hover:text-yellow-500">&#9733;</label>
        </div>
    </div>

      <textarea id="text" name="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 my-3" placeholder="Write your impressions of the product"></textarea>


      <button class="bg-gray-500 text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-gray-600 transition duration-200" type="submit" name="review-send"> Send </button>

    </form>



    </div>
</div>

<script>
    const carouselSlides = document.getElementById('carousel-slides');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

let currentIndex = 0;

const updateCarousel = () => {
  const width = carouselSlides.clientWidth;
  carouselSlides.style.transform = `translateX(-${currentIndex * width}px)`;
};

nextBtn.addEventListener('click', () => {
  const totalSlides = carouselSlides.children.length;
  currentIndex = (currentIndex + 1) % totalSlides;
  updateCarousel();
});

prevBtn.addEventListener('click', () => {
  const totalSlides = carouselSlides.children.length;
  currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
  updateCarousel();
});

window.addEventListener('resize', updateCarousel);

</script>
@endsection






