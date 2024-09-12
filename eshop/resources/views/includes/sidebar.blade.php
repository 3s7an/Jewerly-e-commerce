<div class="sidebar d-flex flex-column bg-light" style="width: 250px; position: fixed; top: 0; left: 0; background-color: rgba(207, 197, 197, 0.541) ">
    <h2 class="text-primary">Kategorie</h2>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($categoriesTree as $category)
            <x-category-item :category="$category" />
            {{$category->name}}
        @endforeach
    </ul>
</div>

