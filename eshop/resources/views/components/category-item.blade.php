@props(['category'])
<option value="{{ $category->id }}">  {{ $category->name }} </option>

    @foreach ($category->children as $child)
        <div style="margin-left: 20px">
            <x-category-item :category="$child" />
        </div>
    @endforeach

