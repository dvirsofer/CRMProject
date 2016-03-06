(function() {
    $('#product_id').on('change', productDropdownEvent);

})();

function productDropdownEvent(event) {
    event.preventDefault();

    var $dropdown = $(event.currentTarget);
    var data = $dropdown.serialize();

    $.ajax({
        type: "POST",
        url: 'edit_product.php',
        data: data,
        success: function(result) {
            // console.log(result);

        }
    });

}