


    <div class="d-flex justify-content-end">

            @auth
                <div class="d-flex">
                <ul>
                    <li class="nav-item dropdown ">
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
                        </ul>
                        </form>
                        </div>
                        <div>
                            <a href="{{ route('cart.index') }}">Košík</a>
                        </div>
                    


            </div>



            @endauth

            @guest


                <a class="mx-4" href="{{ route('login') }}">login</a>
            @endguest

        </div>
