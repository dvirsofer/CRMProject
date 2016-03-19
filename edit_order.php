<?php

@session_start();

@require_once('database/Customer.php');
@require_once('database/Products.php');
@require_once('database/Order.php');
@include_once('classes/Request.php');

$db = new Database();
$request = new Request();

$order_id = $request->get_int_param('order_id');
$order_header = Order::getOrderHeader($order_id, $db)[0];
$order_rows = Order::getOrderRows($order_id, $db);

$customers = Customer::getCustomersList();
$products = Products::getAllProducts();

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main content start here -->
                    <div class="card card-wizard" id="wizardCard">
                        <form id="wizardForm" method="post" action="add_new_order.php">

                            <div class="header text-center">
                                <h3 class="title">Order Wizard</h3>
                                <p class="category">Add a new order step by step</p>
                            </div>

                            <div class="content">
                                <ul class="nav nav-pills">
                                    <li class="active" style="width: 33.3333%;"><a href="add_new_order.php#tab1" data-toggle="tab" aria-expanded="true">Choose Customer</a></li>
                                    <li style="width: 33.3333%;"><a href="add_new_order.php#tab2" data-toggle="tab">Choose Products</a></li>
                                    <li style="width: 33.3333%;"><a href="add_new_order.php#tab3" data-toggle="tab">Checkout</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <h5 class="text-center">Please choose customer:</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">Customer</label>
                                                    <select class="form-control required" name="customer" id="customer">
                                                        <option value="">Choose an option</option>
                                                        <?php foreach ($customers as $customer): ?>
                                                            <option value="<?php echo($customer->CUST_ID); ?>"<?php echo($order_header['CUST_ID'] == $customer->CUST_ID ? ' selected="selected"' : ''); ?>><?php echo($customer->FIRST_NAME); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input class="form-control" type="text" id="first_name" value="<?php echo($order_header['FIRST_NAME']); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input class="form-control" type="text" id="last_name" value="<?php echo($order_header['LAST_NAME']); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <table class="table demo table-bordered footable-loaded footable default" data-filter="#filter" data-page-size="5">
                                            <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product</th>
                                                <th>Warehouse</th>
                                                <th>Quantity</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                        <hr>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="product_id" class="control-label">Product</label>
                                                    <select class="form-control required" id="product_id">
                                                        <option value="">Choose a Product</option>
                                                        <?php foreach ($products as $product): ?>
                                                            <option value="<?php echo($product->P_ID); ?>"><?php echo($product->DESCRIPTION); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="quantity" class="control-label">Product</label>
                                                    <input class="form-control required" type="number" id="quantity">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button class="btn btn-primary add-row pull-right">Add Row</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <h2 class="text-center text-space">Almost there! <br><small> Click on "<b>Finish</b>" to place your order</small></h2>
                                    </div>

                                </div>
                            </div>

                            <div class="footer">
                                <button type="button" class="btn btn-default btn-fill btn-wd btn-back pull-left disabled" style="display: none;">Back</button>

                                <button type="button" class="btn btn-info btn-fill btn-wd btn-next pull-right">Next</button>
                                <button type="button" class="btn btn-info btn-fill btn-wd btn-finish pull-right" onclick="onFinishUpdateWizard()">Finish</button>
                                <button type="button" style="margin-right: 10px;" class="btn btn-danger btn-fill btn-wd btn-later pull-right" onclick="onCancelWizard()">Cancel</button>

                                <div class="clearfix"></div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div><div class="sweet-overlay" tabindex="-1"></div><div class="sweet-alert" tabindex="-1"><div class="icon error"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info"></div> <div class="icon success"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom"></div> <h2>Title</h2><p>Text</p><hr><button class="confirm">OK</button><button class="cancel">Cancel</button></div></div>

</body>

<?php include_once('parts/bottom.php'); ?>

<script>
    var customers = <?php echo(json_encode($customers)); ?>;
    var products = <?php echo(json_encode($products)); ?>;

    var order_rows = <?php echo(json_encode($order_rows)); ?>;
    var order_id = <?php echo($order_id); ?>;
</script>

<script src="assets/js/orders_wizard.js"></script>

</html>