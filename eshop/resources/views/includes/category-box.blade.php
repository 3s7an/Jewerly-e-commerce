<div class="flex flex-col card max-w-sm bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{$category->getImageURL()}}" alt="category image" class="w-36 h-36">

    <div class="p-4">
      <a href="{{route('category.view.show', $category->id)}}" class="block text-center text-lg font-semibold text-gray-800 hover:text-blue-500">
        {{$category->name}}
      </a>
    </div>
  </div>



