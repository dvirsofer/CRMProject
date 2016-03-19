<?php

@session_start();

@include_once('database/Database.php');
@include_once('database/Order.php');

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fromDate = $_POST['from_date'];
    $toDate = date('Y-m-d', strtotime($_POST['to_date'] . '+1 days'));
    $orders = Order::getOrderHeadersFilterDate($db, $fromDate, $toDate);

}
else {
    $orders = Order::getOrderHeaders($db);
}

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav_orders.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <!-- Main content start here -->
                    <form method="post" action="orders_list.php">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="from_date">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date" placeholder="Date" value="<?php
                                if(!empty($fromDate)) { echo $fromDate; } ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="to_date">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" placeholder="Date" value="<?php
                                if(!empty($toDate)) { echo $_POST['to_date']; } ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <hr>
                    <?php foreach ($orders as $order): ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Order number: <strong><?php echo($order['ORDER_ID']); ?></strong></h4>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>Date: <?php echo($order['ORDER_DATE']); ?></li>
                                        <li>Customer name: <?php echo($order['FIRST_NAME']); ?> <?php echo($order['LAST_NAME']); ?></li>
                                        <li>Status: <span class="<?php echo(($order['STATUS'] == 'Open') ? 'text-success' : 'text-warning'); ?>"><?php echo($order['STATUS']); ?></span></li>
                                    </ul>
                                    <?php if ($order['STATUS'] == 'Open'): ?>
                                        <a href="edit_order.php?order_id=<?php echo($order['ORDER_ID']); ?>" class="btn btn-primary pull-right">Edit <i class="fa fa-edit"></i></a>
                                        <button class="btn btn-primary" id="invoke_invoice" onclick="generateInvoice(<?php echo("{$order['ORDER_ID']}, '{$order['ORDER_DATE']}', {$order['CUST_ID']}"); ?>);">Invoke invoice</button>
                                    <?php endif; ?>
                                    <?php if ($order['STATUS'] == 'Closed'): ?>
                                        <a href="invoice.php?order_id=<?php echo($order['ORDER_ID']); ?>" class="btn btn-primary pull-right">Watch invoice <i class="fa fa-list-alt"></i></a>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>

<script src="assets/js/orders_list.js"></script>

</html>