<div class="flex flex-col p-4 w-64 bg-yellow-500 min-h-screen">
    <!-- Admin Panel Header -->
    <h2 class="text-center text-white text-2xl font-bold mb-4">Admin Panel</h2>
    <hr class="border-white mb-4">

    <!-- Navigation -->
    <ul class="space-y-2">
        <li>
            <a href="#dashboard" class="block text-white hover:bg-yellow-600 rounded-md px-3 py-2">Hlavná stranka</a>
        </li>
        <li>
            <a href="{{route('admin.orders')}}" class="block text-white hover:bg-yellow-600 rounded-md px-3 py-2">Objednávky</a>
        </li>
        <li>
            <a href="{{route('admin.users')}}" class="block text-white hover:bg-yellow-600 rounded-md px-3 py-2">Uživatelia</a>
        </li>
        <li>
            <a href="{{route('admin.product')}}" class="block text-white hover:bg-yellow-600 rounded-md px-3 py-2">Produkty</a>
        </li>
        <li>
            <a href="{{route('admin.category')}}" class="block text-white hover:bg-yellow-600 rounded-md px-3 py-2">Kategórie</a>
        </li>
    </ul>
</div>

