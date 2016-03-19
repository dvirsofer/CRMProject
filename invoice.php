<?php


@session_start();

@require_once('classes/Request.php');
@require_once('database/Order.php');
@require_once('database/Invoice.php');

$db = new Database();
$request =  new Request();

$order_id = $request->get_int_param('order_id');

$invoice_header = Invoice::getInvoiceHeader($order_id, $db);
$invoice_header = $invoice_header[0];
$invoice_rows = Invoice::getInvoiceRows($invoice_header['INVOICE_ID'], $db);
$total_quantity = 0;

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <h1>
                            <a href="#">
                                <img width="100px" height="100px" src="https://lh5.ggpht.com/iUifCV93j6Rntv9giTdahkX0ZHXjndRDpqemxBabX2BXNq_oxKT6g7JMZE3jIiRul0eJ=w300">
                            </a>
                        </h1>
                    </div>
                    <div class="col-xs-6 text-right">
                        <h1>INVOICE</h1>
                        <h1><small>Invoice #<?php echo($invoice_header['INVOICE_ID']); ?></small></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <div class="card">
                            <div class="header">
                                <h4>From: <a href="#">Automated CRM</a></h4>
                            </div>
                            <div class="content">
                                <p>
                                    <strong>Details</strong> <br>
                                    This is an automated report generated with our system
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-5 col-xs-offset-2 text-right">
                        <div class="card">
                            <div class="header">
                                <h4>To : <a href="#"><?php echo(ucfirst($invoice_header['FIRST_NAME'])); ?></a></h4>
                            </div>
                            <div class="content">
                                <p>
                                    <strong>First Name:</strong> <?php echo(ucfirst($invoice_header['FIRST_NAME'])); ?> <br>
                                    <strong>Last Name:</strong> <?php echo(ucfirst($invoice_header['LAST_NAME'])); ?> <br>
                                    <strong>Customer:</strong> <?php echo($invoice_header['CUST_ID']); ?><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / end client details section -->
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <h4>Product ID</h4>
                        </th>
                        <th>
                            <h4>Description</h4>
                        </th>
                        <th>
                            <h4>Warehouse Name</h4>
                        </th>
                        <th>
                            <h4>Quantity</h4>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($invoice_rows as $invoice_row): ?>
                        <tr>
                            <td><?php echo($invoice_row['P_ID']); ?></td>
                            <td><?php echo($invoice_row['DESCRIPTION']); ?></td>
                            <td><?php echo($invoice_row['WAREHOUSE_NAME']); ?></td>
                            <td><?php echo($invoice_row['QUANTITY']); ?></td>
                        </tr>
                    <?php
                        $total_quantity += $invoice_row['QUANTITY'];
                        endforeach;
                    ?>
                    </tbody>
                </table>
                <div class="row text-right">
                    <div class="col-xs-2 col-xs-offset-8">
                        <p>
                            <strong>
                                Total Quantity: <br>
                            </strong>
                        </p>
                    </div>
                    <div class="col-xs-2">
                        <strong>
                            <?php echo($total_quantity); ?><br>
                        </strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-danger btn-lg" onclick="cancelInvoice(<?php echo($invoice_header['INVOICE_ID']); ?>)">Cancel Invoice</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>

<script>
    function cancelInvoice(invoice_id) {
        $.post("requests.php",
            {
                "action": "remove_invoice",
                "invoice_id": invoice_id
            },
            function(data, status){
                if (data["status"]) {
                    location.href = "index.php";
                }
            });
    }
</script>

</html>