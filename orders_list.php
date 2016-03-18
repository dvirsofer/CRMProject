<?php

@session_start();

@include_once('database/Database.php');
@include_once('database/Order.php');

$db = new Database();
$orders = Order::getOrderHeaders($db);

debug($orders);

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
                                    <a href="edit_order.php?order_id=<?php echo($order['ORDER_ID']); ?>" class="btn btn-primary pull-right">Edit <i class="fa fa-edit"></i></a>
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


</html>