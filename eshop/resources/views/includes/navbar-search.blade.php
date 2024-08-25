<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <!-- Eshop Brand with Custom Font -->
        <a class="navbar-brand fs-3" href="{{ route('dashboard') }}">
            <span class="text-warning">Eshop</span>
        </a>

     
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarContent">
            <form class="d-flex ms-auto me-auto my-2 my-lg-0" action="{{ route('dashboard') }}" method="get">
                @csrf

                <input class="form-control me-2 search-bar" type="search" placeholder="Search" name="search" id="search">
                <button class="btn btn-warning btn-sm" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
