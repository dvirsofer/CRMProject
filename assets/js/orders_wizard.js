window.addedProducts = {};
window.selectedCustomer = {};

(function() {
    $('.footable').footable();

    $('#customer').on('change', chooseCustomerEvent);
    $('.add-row').on('click', addRowEvent);
    $('.footable').footable().on('click', '.remove-row', removeRowEvent);

    initWizard();


    var $currentObj = $('#customer');
    var chosenCustomerId = $currentObj.val();

    if (chosenCustomerId) {
        customers.forEach(function(customer) {
            if (chosenCustomerId == customer.CUST_ID) {
                window.selectedCustomer = customer;
            }
        });
    }

    if (order_rows) {
        order_rows.forEach(function(row) {
            addRow(row.QUANTITY, row.P_ID);
        });
    }

})();

function chooseCustomerEvent(event) {
    var $currentObj = $(this);
    var chosenCustomerId = $currentObj.val();

    customers.forEach(function(customer) {
        if (chosenCustomerId == customer.CUST_ID) {
            window.selectedCustomer = customer;
            $('#first_name').val(customer.FIRST_NAME);
            $('#last_name').val(customer.LAST_NAME);
        }
    });
}

function addRowEvent(e) {
    e.preventDefault();
    var product_id = $('#product_id').val();
    var quantity = $('#quantity').val();
    addRow(quantity, product_id);
}

function addRow(quantity, product_id) {
    //get the footable object
    var footable = $('.footable').data('footable');

    products.forEach(function(product) {
        if (product_id == product.P_ID) {
            if (product_id in window.addedProducts) {
                return;
            }
            //build up the row we are wanting to add
            var newRow = '<tr><td>' + product_id + '</td><td>' + product.DESCRIPTION + '</td><td>' + product.WAREHOUSE_NAME + '</td><td>' + quantity + '</td><td><button class="remove-row btn btn-danger btn-xs"><i class="fa fa-remove"></i></button></td></tr>';

            window.addedProducts['' + product_id] = {
                'P_ID': product_id,
                'DESCRIPTION': product.DESCRIPTION,
                'WAREHOUSE_ID': product.WAREHOUSE_ID,
                'WAREHOUSE_NAME': product.WAREHOUSE_NAME,
                'QUANTITY': quantity
            };

            try {
                //add it
                footable.appendRow(newRow);
            }
            catch(err) {
                return;
            }
        }
    });
}

function removeRowEvent(e) {
    e.preventDefault();

    //get the footable object
    var footable = $('.footable').data('footable');

    //get the row we are wanting to delete
    var $row = $(this).parents('tr:first');
    var product_id = $row.find('td:first').text();
    delete window.addedProducts[product_id];

    //delete the row
    footable.removeRow($row);
}

function onFinishWizard() {

    $.post("requests.php",
        {
            "action": "save_order",
            "customer": window.selectedCustomer,
            "products": window.addedProducts
        },
        function(data, status){
            if (data["status"]) {
                var order_id = data["order_id"];
                swal("Good job!", "New order number " + order_id + " has been created!", "success");
            }
        });
}

function onFinishUpdateWizard() {

    $.post("requests.php",
        {
            "order_id": order_id,
            "action": "save_order",
            "customer": window.selectedCustomer,
            "products": window.addedProducts
        },
        function(data, status){
            if (data["status"]) {
                var order_id = data["order_id"];
                swal("Good job!", "New order number " + order_id + " has been modified!", "success");
            }
        });
}

function onCancelWizard() {
    location.href =" index.php";
}

function initWizard() {
    var $validator = $("#wizardForm").validate({
        rules: {
            customer: {
                required: true
            },
            product_id: {
                required: true
            },
            quantity: {
                number: true
            }
        }
    });


    $('#wizardCard').bootstrapWizard({
        tabClass: 'nav nav-pills',
        nextSelector: '.btn-next',
        previousSelector: '.btn-back',
        onNext: function(tab, navigation, index) {
            var $valid = $('#wizardForm').valid();

            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
        onInit : function(tab, navigation, index){

            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            $width = 100/$total;

            $display_width = $(document).width();

            if ($display_width < 600 && $total > 3){
                $width = 50;
            }
            navigation.find('li').css('width',$width + '%');

            var wizard = navigation.closest('.card-wizard');
            $(wizard).find('.btn-later').hide();
        },
        onTabClick : function(tab, navigation, index){
            // Disable the posibility to click on tabs
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            var wizard = navigation.closest('.card-wizard');

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $(wizard).find('.btn-next').hide();
                $(wizard).find('.btn-later').show();
                $(wizard).find('.btn-finish').show();
            } else if($current == 1){
                $(wizard).find('.btn-back').hide();
            } else {
                $(wizard).find('.btn-back').show();
                $(wizard).find('.btn-next').show();
                $(wizard).find('.btn-later').hide();
                $(wizard).find('.btn-finish').hide();
            }
        }
    });
}