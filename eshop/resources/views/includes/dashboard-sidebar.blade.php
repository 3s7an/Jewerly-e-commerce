<div class="sidebar d-flex flex-column p-3" style="width: 250px; width: 250px;  background-color: rgb(226, 221, 221)">
    <h2 class="text-center text-primary">Kategórie</h2>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto ">
        @foreach($categories as $category)
    <li class="nav-item">
       <a href="" class="nav-link">{{ $category->name }}</a>

        @if($category->children->isNotEmpty())
            <ul>
                @foreach($category->children as $childCategory)
                    @include('components.category-item', ['category' => $childCategory])
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
</ul>

    </ul>
</div>
