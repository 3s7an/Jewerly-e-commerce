@extends('layout')

@section('content')
<div class="flex justify-center min-h-screen bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl rounded-lg bg-white shadow-lg p-6 mt-24">
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
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 mb-2">Popis produktu</p>
                <p class="text-gray-700 mb-6 text-base">{{ $product->description }}</p>
                <div class="flex  mb-4">
                    <span class="text-lg font-semibold mx-auto">Cena:</span>
                    <span class="text-2xl font-bold text-green-600 ml-2">{{ $product->price }} €</span>
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


        <h1 class="mt-6 text-3xl font-bold">Recenzie</h1>

    <p>

    </p>
    <br>

    <form action ="{{route('review.store')}}" method="get">

      <label for ="rating">Počet hviezdičiek</label>
      <input type ="number" name="rating" id="rating" min="1" max="5"  class=" border rounded-md border-gray-300 my-2">

      <input type="hidden" name="product_id" value="{{$product->id}}">


      <textarea id="text" name="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 my-3" placeholder="Vyborny produkt"></textarea>



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






