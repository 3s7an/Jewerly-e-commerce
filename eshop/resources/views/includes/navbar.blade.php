<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">

    <div class="container">

        <a class="navbar-brand" href=" {{route('dashboard')}} ">ESHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




            @auth

                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">{{ Auth::user()->email }}</a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a>
                            <a class="dropdown-item" href="#">Moje objednávky</a>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin panel</a>
                            <div class="dropdown-divider"></div>


                            <form action="{{ route('logout')}} " method="post">
                                @csrf


                            <button class="btn btn-danger btn-small" type="submit">Odhlásiť sa</button>
                        </form>
                        </div>
                    </li>

                </ul>



            @endauth

            @guest


                <a href="{{ route('login') }}">login</a>
            @endguest

        </div>
    </div>
    </div>
</nav>
