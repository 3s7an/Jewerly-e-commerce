@extends('layout')

@section('content')
@include('includes.flash-message')
@include('includes.header')
<div class="flex justify-center min-h-screen">
    <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg ">

<div class="min-h-screen flex flex-col">
    <div class="flex flex-col items-center justify-center w-full">
        <h1 class="text-center my-8 md:my-20 font-bold text-2xl md:text-4xl font-popins ">
            Discover Our Products :
        </h1>

        <div class="flex flex-wrap gap-4 justify-center w-full">
            @foreach ($categories as $category)
                @include('includes.category-box')
            @endforeach
        </div>
    </div>
</div>

</div>
</div>


@endsection

