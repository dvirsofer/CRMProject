(function() {

})();


function generateInvoice(order_id, order_date, cust_id) {
    $.post("requests.php",
        {
            "action": "generate_invoice",
            "order_id": order_id,
            "cust_id": cust_id,
            "order_date": order_date
        },
        function(data, status){
            if (data["status"]) {
                location.reload();
            }
        });
}