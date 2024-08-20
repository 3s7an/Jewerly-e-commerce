<nav class="navbar d-flex justify-content-end">


    <div class="d-flex justify-content-end">

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


                <a class="mx-4" href="{{ route('login') }}">login</a>
            @endguest

        </div>
</nav>
