<nav class="bg-gray-200 text-gray-800 w-full z-50 shadow-lg">


    <div class="container mx-auto flex justify-between items-center py-2">
        <!-- Logo -->
        <a class="text-3xl font-bold" href="{{ route('dashboard') }}">
            <span class="text-gray-900 font-playpen text-xxl sm:max-x:mx-4">Jewerly</span>
        </a>

       <!-- Searchbar -->


<div class="hidden md:block">
    <form class="flex" action="{{ route('dashboard') }}" method="get">
        @csrf
        <input class="form-input w-full rounded-l-md border-1 border-gray-700 focus:outline-none px-4 py-2" type="search" placeholder="Type here..." name="search" id="search">
        <button class="bg-gray-800 hover:bg-gray-900 text-white rounded-r-md px-4 py-2 border-2" type="submit">Search</button>
    </form>
    <div id="search-results" class="mt-2 text-center"></div>
</div>



        <div class="flex items-center space-x-4">
            <!-- Auth linky -->
            @auth
            <div class="relative">
                <!-- User toggler -->
                <button id="user-dropdown-toggle" class="flex items-center focus:outline-none">
                    <i class="fa-solid fa-user text-2xl"></i>
                </button>
                <div id="user-dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10 hidden">
                    <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('profile.index') }}">Profile</a>
                    <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{route('my-orders.show')}}">My orders</a>

                    @if (Auth::user()->is_admin == 1)
                    <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('admin.dashboard') }}">Admin panel</a>
                @endif

                    <div class="border-t my-2"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100" type="submit">Log out</button>
                    </form>
                </div>
            </div>
            <a href="{{ route('cart.index') }}" class="ml-4">
                <div class="relative inline-block">
                    <i class="fa-solid fa-cart-shopping text-2xl"></i>
                    @if($totalItems > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 bg-red-600 text-white text-xs font-bold rounded-full">
                            {{$totalItems}}
                        </span>
                    @endif
                </div>
            </a>
            @endauth

            @guest
            <!-- Guest sekcia -->
            <a class="text-gray-800 hover:text-gray-900" href="{{ route('login') }}">Log in</a>
            @endguest
        </div>
    </div>

    <!-- Mobile Search Form -->
    <div class="block md:hidden mt-4 mx-7">
        <form class="flex" action="{{ route('dashboard') }}" method="get">
            @csrf
            <input class="form-input w-full rounded-l-md border-2 border-gray-700 focus:outline-none px-4 py-2" type="search" placeholder="Search" name="search" id="search">
            <button class="bg-gray-800 text-white rounded-r-md px-4 py-2" type="submit">Vyhladať</button>
        </form>
    </div>
</nav>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
        // Toggler
    $('#user-dropdown-toggle').click(function() {
        $('#user-dropdown-menu').slideToggle("fast"); //
    });


    $(document).click(function(e) {
        if (!$(e.target).closest('#user-dropdown-toggle, #user-dropdown-menu').length) {
            $('#user-dropdown-menu').hide();
        }
    });


    // Searchbar
    $('#search').on('input', function() {
        const query = $(this).val();

        if (query.length >= 2) {
            $.ajax({
                url: '{{route("search")}}',
                method: 'GET',
                data: { search: query },
                success: function(data) {

                    // Vyčistíme predchádzajúce výsledky
                    $('#search-results').empty();

                    // Predpokladáme, že 'data' obsahuje pole produktov
                    if (data.length > 0) {
                        $.each(data, function(index, product) {
                            console.log(product.id);
                            $('#search-results').append('<div class="result-item"><a href="{{ url("products") }}/' + product.id + '">' + product.name + '</a></div>');
                        });
                    } else {
                        $('#search-results').append('<div>Žiadne výsledky</div>');
                    }
                },
                error: function() {
                    $('#search-results').empty().append('<div>Chyba pri vyhľadávaní</div>');
                }
            });
        } else {
            $('#search-results').empty(); // Vycistime výsledky, ak je menej ako 2 znaky
        }
    });
});
</script>


