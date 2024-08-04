
<div class="d-flex flex-wrap mt-4">
    <div class="d-flex flex-wrap">

<div class="card border-primary mb-3 mr-3" style="max-width: 20rem; min-width:20rem">

    <div class="card-body mx-auto">

      <h4 class="card-title">{{$product->name}}</h4>


      <p class="card-text">{{$product->description}}</p>
      <p class="card-text">{{$product->price}}</p>

      <form action="{{route('products.destroy', $product->id)}}" method="post">
        @csrf
        @method('delete')
      <button class="btn btn-sm">X</button>
    </form>

    </div>
</div>
    </div>
</div>
