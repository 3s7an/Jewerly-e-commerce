
// profile
$(document).ready(function() {

    // Pridavanie atributu read only
    function toggleReadOnly(toggle) {
    if (toggle) {
        $("#firstName, #lastName, #street, #postalCode, #city").attr("readonly", "readonly");
    } else {
        $("#firstName, #lastName, #street, #postalCode, #city").removeAttr("readonly");
    }
}

        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var street = $("#street").val();
        var postalCode = $("#postalCode").val();
        var city = $("#city").val();

// Po kliknuti na tlacitko zmenit udaje sa objavia tlacitka spat a ulozit
    $(".contact-button").click(function (e) {
        e.preventDefault();
        $(this).hide();
        $(".buttons").show();
        toggleReadOnly(false);



    });

    // Tlacitko spat vracia na povodnu stranku
    $(".back-button").click(function (e) {
        e.preventDefault();
        $(".contact-button").show();
        $(".buttons").hide();
        toggleReadOnly(true);

        $("#firstName").val(firstName);
        $("#lastName").val(lastName);
        $("#email").val(email);
        $("#street").val(street);
        $("#postalCode").val(postalCode);
        $("#city").val(city);

    });

    // Tlacitko ulozit posiela data laravelu

    $(".save-button").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        // Ziskanie hodnot z inputov
         // Získanie hodnôt z inputov
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var street = $("#street").val();
        var postalCode = $("#postalCode").val();
        var city = $("#city").val();

        // Ajax sekcia
        $.ajax({
            url: '/profile/update-data', // URL endpoint, ktorý bude spracovávať požiadavku v Laravel
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                firstName: firstName,
                lastName: lastName,
                email: email,
                street: street,
                postalCode: postalCode,
                city: city
            },
            success: function(response) {
                // Tu môžeš spracovať odpoveď z Laravel backendu
                alert("Údaje boli úspešne uložené");
                toggleReadOnly(true);


            },
            error: function(xhr, status, error) {
                // Tu môžeš spracovať chyby
                alert("Nastala chyba pri ukladaní údajov.");
            }
        });



    });





});

    // admin category
    $(document).ready(function() {
        var $formToggle = $('.form_toggle');
        var $toggler = $('.toggler');

        // Button text based on the initial visibility of the form
        if ($formToggle.is(':visible')) {
            $toggler.text('Hide');
        } else {
            $toggler.text('Add category');
        }

        $toggler.click(function (e) {
            e.preventDefault();
            $formToggle.toggle();

            if ($formToggle.is(':visible')) {
                $toggler.text('Hide');
            } else {
                $toggler.text('Add category');
            }
        });
    });

    // admin collections
    $(document).ready(function() {
        var $formToggle = $('.form_toggle');
        var $toggler = $('.toggler');

        // Button text based on the initial visibility of the form
        if ($formToggle.is(':visible')) {
            $toggler.text('Hide');
        } else {
            $toggler.text('Add collection');
        }

        $toggler.click(function (e) {
            e.preventDefault();
            $formToggle.toggle();

            if ($formToggle.is(':visible')) {
                $toggler.text('Hide');
            } else {
                $toggler.text('Add collection');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
            const selectElement = document.getElementById('products');
            const choices = new Choices(selectElement, {
                removeItemButton: true,
                searchEnabled: true,
                itemSelectText: '',
                placeholder: true,
                placeholderValue: 'Choose products to collection...',
            });
        });

        // admin product
        $(document).ready(function() {
            var $formToggle = $('.form_toggle');
            var $toggler = $('.toggler');

            // Button text based on the initial visibility of the form
            if ($formToggle.is(':visible')) {
                $toggler.text('Hide');
            } else {
                $toggler.text('Add product');
            }

            $toggler.click(function(e) {
                e.preventDefault();
                $formToggle.toggle();

                if ($formToggle.is(':visible')) {
                    $toggler.text('Hide');
                } else {
                    $toggler.text('Add product');
                }
            });
        });

        // cart
        $(document).ready(function() {
            function updateQuantity(itemId, newValue) {
                // AJAX request to update the model in the database
                $.ajax({
                    url: '/cart/change', // URL of the route that handles the update
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include CSRF token
                        itemId: itemId,
                        quantity: newValue // Use the updated newValue
                    },
                    success: function(response) {
                        console.log('Quantity updated successfully:', response);
                        location
                            .reload(); // Refresh the page to reflect the updated total price and quantity
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
            $input.val(newValue); // Update input field value

            updateQuantity(itemId, newValue); // Call function to update the quantity
            });

                $('.minus').click(function() {
                var $input = $(this).siblings('.item_quantity');
                var currentValue = parseInt($input.val(), 10);
                var minValue = parseInt($input.attr('min'), 10) || 1; // Ensure there's a minimum value of 1
                var itemId = $(this).data('item-id');

                if (currentValue > minValue) {
                    var newValue = currentValue - 1; // Decrease the quantity by 1
                    $input.val(newValue); // Update input field value

                    updateQuantity(itemId, newValue); // Call function to update the quantity
                }
            });

        });

        // navbar
        $(document).ready(function() {
            // Toggler
        $('#user-dropdown-toggle').click(function() {
            // e.stopPropagation();
            $('#user-dropdown-menu').slideToggle("slow");
        });


        $(document).click(function(e) {
            if (!$(e.target).closest('#user-dropdown-toggle, #user-dropdown-menu').length) {
                $('#user-dropdown-menu').hide();
            }
        });


        // Searchbar
        $('#search').on('input', function() {
            const query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: '{{route("search")}}',
                    method: 'GET',
                    data: { search: query },
                    success: function(data) {

                        // Vyčistíme predchádzajúce výsledky
                        $('#search-results').empty();

                        // Predpokladáme, že 'data' obsahuje pole produktov
                        if (data.length > 0) {
                            $.each(data, function(index, product) {
                                console.log(product.id);
                                $('#search-results').append('<div class="result-item"><a href="{{ url("products") }}/' + product.id + '">' + product.name + '</a></div>');
                            });
                        } else {
                            $('#search-results').append('<div>Žiadne výsledky</div>');
                        }
                    },
                    error: function() {
                        $('#search-results').empty().append('<div>Chyba pri vyhľadávaní</div>');
                    }
                });
            } else {
                $('#search-results').empty(); // Vycistime výsledky, ak je menej ako 2 znaky
            }
        });
    });


    // old sidebar
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

    // category show
    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        const isExpanded = menu.classList.contains('hidden');
        menu.classList.toggle('hidden', !isExpanded);
      }


