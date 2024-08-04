<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">

    <div class="container">

        <a class="navbar-brand" href=" {{route('dashboard')}} ">Klentoníctvo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">

                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link active" href="#">{{ $category->name}}
                    </a>
                </li>
                @endforeach


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
            </ul>




            @auth

                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Profil</a>
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
