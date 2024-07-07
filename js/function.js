<script>
$(document).ready(function(){
    // Function to filter products based on selected brands
    function filterProducts() {
        var selectedBrands = [];

        // Collect selected brands
        $('.get_manufacturer:checked').each(function() {
            selectedBrands.push($(this).data('manufacturer-id'));
        });

        // AJAX request to update product display based on selected brands
        $.ajax({
            type: 'POST',
            url: 'filter_products.php', // Replace with the actual backend script to fetch and display products
            data: { brands: selectedBrands },
            success: function(response) {
                // Update the product display area with the new content
                $('#product-display').html(response);
            }
        });
    }

    // Attach click event to the checkboxes
    $('.get_manufacturer').on('change', function() {
        filterProducts();
    });
});
</script>
