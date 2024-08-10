<li>
    {{ $category->name }}

    @if($category->children->isNotEmpty())
        <ul>
            @foreach($category->children as $childCategory)
                @include('components.category-item', ['category' => $childCategory])
            @endforeach
        </ul>
    @endif
</li>

