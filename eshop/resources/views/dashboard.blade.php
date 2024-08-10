@extends('layout')

@section('content')





    <h2 class="text-center">Naše kategorie</h2>
    @foreach($categories as $category)
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
@endforeach
</ul>


   <div class="d-inline-flex flex-wrap">



</div>
@endsection
