<div class="bg-white-800 text-black p-3 flex flex-col rounded-xl">
    <h2 class="text-center text-xl font-semibold mb-4">Kategórie</h2>
    <hr class="mb-4 border-gray-600">
    <ul class="space-y-2 flex-grow overflow-y-auto">
        @foreach($categories as $category)
            <li>
                <a href="{{route('category.view.show', $category->id)}}" class="block px-3 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-chevron-down ml-2"></i> {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Na začiatku skry všetky deti kategórie
    $('.children').hide();

    // Pridaj kliknutie na kategórie, ktoré majú deti
    $('.has-children').on('click', function(e) {
        e.preventDefault();  // Zabránime predvolenému správaniu odkazu

        // Nájdeme prislúchajúce podkategórie (deti)
        var children = $(this).next('.children');

        // Skryj všetky ostatné otvorené podkategórie, ak ich nepotrebujeme nechať otvorené
        $('.children').not(children).slideUp();

        // Zobraz alebo skry konkrétne podkategórie
        children.slideToggle();
    });
});
</script>

