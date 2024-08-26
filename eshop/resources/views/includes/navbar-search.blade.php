<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <!-- Eshop Brand with Custom Font -->
        <a class="navbar-brand fs-3" href="{{ route('dashboard') }}">
            <span class="text-warning">Zlatníctvo</span>
        </a>

    <div class="collapse navbar-collapse" id="navbarContent">
            <form class="d-flex ms-auto me-auto my-2 my-lg-0" action="{{ route('dashboard') }}" method="get">
                @csrf

                <input class="form-control me-2 search-bar" type="search" placeholder="Search" name="search" id="search">
                <button class="btn btn-warning btn-sm" type="submit">Vyhladať</button>
            </form>
        </div>



        <div class="d-flex">
            @auth

            <div class="d-flex">
                <ul>
                    <li class="nav-item dropdown list-unstyled ">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user fa-2xl"></i></a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a>
                            <a class="dropdown-item" href="#">Moje objednávky</a>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin panel</a>
                            <div class="dropdown-divider"></div>


                            <form action="{{ route('logout')}} " method="post">
                                @csrf


                            <button class="btn btn-danger btn-small" type="submit">Odhlásiť sa</button>
                        </ul>
                        </form>
                        </div>
                        <div>
                            <a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>
                        </div>




            @endauth

            @guest


                <a class="mx-4" href="{{ route('login') }}">login</a>
            @endguest

        </div>
        </div>

    </div>
</nav>
