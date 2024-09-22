    @extends('layout')

    @section('content')

    <nav class="breadcrumb">
        @foreach ($parentCategories as $parentCategory)
            <a href="{{ route('category.view.show', $parentCategory->id) }}" class="m-10">
                {{ $parentCategory->name }}
            </a>
            @if (!$loop->last)
                &gt;
            @endif
        @endforeach
    </nav>

        <h1 class="text-5xl m-10 text-center">
            {{ $category->name }}
        </h1>



        @if ($category->children->isNotEmpty())
            <div class="flex justify-center">
            @foreach ($category->children as $childCategory)
            <div class="card bg-white shadow-lg rounded-lg p-1 hover:shadow-xl transition-shadow mb-8 mx-auto">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAPDxAPDw8VEA8PEBAQDw8PDhAQFhAVFhUXGBURFRUYHCogGBslHRcVITIhJSk3Li8vFx8zODMtNyotLisBCgoKDQ0OGBAQFyslICUtLS03Ly0rLS0tLS0tLS0rLSs1ListLy0rLS0uLTctKy01LSstKysyNzUtKysrNS0rK//AABEIAMIBAwMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAQUDBAYCB//EADwQAAICAQMCAwUGAwcFAQEAAAECAAMRBBIhBTETQVEGIjJhcRRCUoGRobHB0QcVI2Jyk/AzkqLh8bIW/8QAFgEBAQEAAAAAAAAAAAAAAAAAAAEC/8QAGBEBAQEBAQAAAAAAAAAAAAAAAAERMSH/2gAMAwEAAhEDEQA/APuMREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERARIkwEREBERAREQEREBIkxAiJMQIiTECIkxAiJMQIkxEBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERARIkwEREBERAREQEREBERAREQEREBERAREQEREBERAREQETV6he1ae4u5mIAHp5k/PAB48+JU6f2l05KBNSmoDgnFTo7KB3Yhew9c9oHQSGYDucfXicr7bHWWaC06TUfZLQMqwA8mGVLEHblc+8MYOOZHT+jaW6ui+9l1Oq09GGsFm4qxVd7DBzklchu/f1gdSlqt8LA/Qgz3Pn/AFL2O6ZaKLnK6W87altDKrWHJG0Z+NycDJycCevZf2lVr7aze3hAUppS44tJ3ktgklfu8ehXtnAuXprvolJquv1VsK3cUncVNlvuKDjO0FsDOOf6zP0jqa3812LdUQ3h3oysGKna6gjg4OBkeeR5SC0iIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiJ4awDuQM8DJAgaHtCaxprXss8Ja18TxT9wr2P8vznE6W1BbprL6glNmdMusr8Mq3iEH7O7Ae4jkABvM4Hc5m7/ad7QJQun0pqS8arxXsrcMVKVbcZI+E7mUg+RWa/QtAz9JNKbMWm5nDbNQF3uWFVoIx8BUHI4zLg6Pr3VKazTXZYFNtyqtfc3Z42YHOMsM+U5Lq3sRoE1H2hzez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" alt="">
            <a href="{{route('category.view.show', $childCategory->id)}}">{{ $childCategory->name }}</a>
            <input type="hidden" name="" value="{{$childCategory->id}}">
            </div>
            @endforeach
        </div>

        @endif

        <hr class="mb-10">
        @if ($products->isNotEmpty())

            <div class="flex">
                @foreach ($products as $product)
                    @include('includes.product-box')
                @endforeach
            </div>

        @else
            <p>No products available in this category.</p>
        @endif



        @endsection


