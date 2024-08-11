<div class="sidebar d-flex flex-column p-3" style="width: 250px;">
    <h2 class="text-center text-white">Admin Panel</h2>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#dashboard" class="nav-link ">Hlavná stranka</a>
        </li>
        <li class="nav-item">
            <a href="/admin" class="nav-link ">Objednávky</a>
        </li>
        <li class="nav-item">
            <a href=" {{route('admin.users')}} " class="nav-link ">Uživatelia</a>
        </li>
        <li class="nav-item">
            <a href=" {{route('admin.product')}} " class="nav-link ">Produkty</a>
        </li>
        <li class="nav-item">
            <a href=" {{route('admin.category')}} " class="nav-link">Kategórie</a>
        </li>
       
    </ul>
</div>
