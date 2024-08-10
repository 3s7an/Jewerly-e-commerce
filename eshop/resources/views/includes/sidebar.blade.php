
<div class="sidebar d-flex flex-column p-3" style="width: 250px;">
    <h2 class="text-center text-white">Kategórie</h2>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">


           @foreach ($categoriesTree as $category)
           <x-category-item :category="$category" />

            {{$category->name}}
           @endforeach





    </ul>
</div>
