<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">eshop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <form class="d-flex ms-auto me-auto my-2 my-lg-0">
                <input class="form-control me-2" type="search" placeholder="Search" name="search" id="search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>

            <a class="nav-link" href="#">kosik</a>
        </div>
    </div>
</nav>
