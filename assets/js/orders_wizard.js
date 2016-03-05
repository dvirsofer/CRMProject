(function() {
    $('#customer').on('change', chooseCustomerEvent);
})();

function chooseCustomerEvent(event) {
    var $currentObj = $(this);
    var chosenCustomerId = $currentObj.val();

    customers.forEach(function(customer) {
        if (chosenCustomerId == customer.CUST_ID) {
            $('#first_name').val(customer.FIRST_NAME);
            $('#last_name').val(customer.LAST_NAME);
        }
    });

}