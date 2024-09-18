@extends('layout')

@section('content')
@include('includes.flash-message')
<h1 class="text-center text-3xl font-bold mb-5">Tvoj košík</h1>

<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Názov produktu</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Množstvo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cena</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($cartItems as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button type="button" class="plus bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-2 rounded" data-item-id="{{ $item->id }}"><i class="fa-solid fa-plus"></i></button>
                        <input type="text" value="{{ $item->quantity }}" class="w-16 border border-gray-300 rounded-md px-2 py-1 item_quantity" min="1" readonly>
                        <button type="button" class="minus bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-2 rounded" data-item-id="{{ $item->id }}"><i class="fa-solid fa-minus"></i></button>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ $item->product->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="text-red-600 hover:text-red-800 transition duration-150">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr class="my-6 border-gray-300">

<div class="flex justify-end">
    <form action="{{route('order.index')}}" class="flex flex-col items-end">
        <h4 class="text-lg font-semibold mt-3">Celková cena: {{$totalPrice}}</h4>
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mt-4">Pokračovať</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function updateQuantity(itemId, newValue) {
    // AJAX request to update the model in the database
    $.ajax({
    url: '/cart/change',  // URL of the route that handles the update
    type: 'POST',
    data: {
        _token: '{{ csrf_token() }}',  // Include CSRF token
        itemId: itemId,
        quantity: newValue  // Use the updated newValue
    },
    success: function(response) {
        console.log('Quantity updated successfully:', response);
        location.reload(); // Refresh the page to reflect the updated total price and quantity
    },
    error: function(xhr, status, error) {
        console.error('Error updating quantity:', error);
    }
});
}


$('.plus').click(function() {
    var $input = $(this).siblings('.item_quantity');
    var currentValue = parseInt($input.val(), 10);
    var itemId = $(this).data('item-id');

    var newValue = currentValue + 1; // Increase the quantity by 1
    $input.val(newValue);  // Update input field value

    updateQuantity(itemId, newValue); // Call function to update the quantity
});

$('.minus').click(function() {
    var $input = $(this).siblings('.item_quantity');
    var currentValue = parseInt($input.val(), 10);
    var minValue = parseInt($input.attr('min'), 10) || 1; // Ensure there's a minimum value of 1
    var itemId = $(this).data('item-id');

    if (currentValue > minValue) {
        var newValue = currentValue - 1;  // Decrease the quantity by 1
        $input.val(newValue);  // Update input field value

        updateQuantity(itemId, newValue); // Call function to update the quantity
    }
});



</script>

@endsection



