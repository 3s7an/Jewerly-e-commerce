<li class="nav-item ml-2">
    <a href="" class="nav-link"><i class="fa-solid fa-angle-right mx-2"></i>{{ $category->name }}</a>

    @if($category->children->isNotEmpty())
        <ul class="nav nav-pills flex-column mb-auto ">
            @foreach($category->children as $childCategory)
                @include('components.category-item', ['category' => $childCategory])
            @endforeach
        </ul>
    @endif
</li>

