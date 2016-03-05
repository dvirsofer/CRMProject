<?php

@session_start();

@require_once('help_functions.php');
@require_once('database/Products.php');
@require_once('database/Warehouse.php');

$err = '';
$success = '';

$products = Products::getAllProducts();
$warehouses = Warehouse::getWarehouseList();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get details from post
    $formType = $_POST['formType'];
    if($formType == 1) {
        $product_id = $_POST['product_id'];
    }
    else {
        $product_id = $_POST['product_id'];
        $productInfo = Products::getProductById($product_id);
    }



}

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav_product.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main content start here -->
                    <h3>Edit product</h3>

                    <?php if(!empty($err)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i>
                            <?php echo($err); ?>
                        </div>
                    <?php }?>

                    <?php if(!empty($success)) { ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-info-circle"></i>
                            <?php echo($success); ?>
                        </div>
                    <?php }?>

                    <form method="post" action="edit_product.php">
                        <input type="hidden" class="form-control" name="formType" value="1">
                        <div class="form-group">
                            <label for="product_id">Select Product:</label>
                            <select class="form-control" id="product_id" name="product_id">
                                <?php foreach ($products as $product): ?>
                                    <option value="<?php echo($product->P_ID); ?>"><?php echo($product->DESCRIPTION); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

                    <form method="post" action="edit_product.php">
                        <input type="hidden" class="form-control" name="formType" value="2">
                        <div class="form-group">
                            <label for="warehouse_id">Select New Warehouse:</label>
                            <select class="form-control" id="warehouse_id" name="warehouse_id">
                                <?php foreach ($warehouses as $warehouse): ?>
                                    <option value="<?php echo($warehouse->WAREHOUSE_ID); ?>"><?php echo($warehouse->WAREHOUSE_NAME); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="product_name">Name:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="">
                            <label for="quantity">Quantity</label>
                            <input type="number" min="0" class="form-control" id="quantity" name="quantity" value=<?php $productInfo->QUANTITY ?>>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <?php } ?>

                </div>

            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>
