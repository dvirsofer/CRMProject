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
        $productInfo = Products::getProductById($product_id);
    }
    else {
        // update product in database
        $productId = $_POST['pid'];
        $warehouseId = $_POST['warehouse_id'];
        $productName = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $update = Products::updateProduct($productId, $productName, $warehouseId, $quantity);
        if($update) {
            $success = 'Product is update';
        }
        else {
            $err = 'Product no update';
        }

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
                                <option value="0">Select Product</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?php echo($product->P_ID); ?>"><?php echo($product->DESCRIPTION); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && ($formType==1)){ ?>

                    <form method="post" action="edit_product.php">
                        <input type="hidden" class="form-control" name="pid" value="<?php echo($productInfo->P_ID) ?>">
                        <input type="hidden" class="form-control" name="warehouse_id" value="<?php echo($productInfo->WAREHOUSE_ID) ?>">
                        <input type="hidden" class="form-control" name="formType" value="2">
                        <div class="form-group">
                            <label for="product_name">Name:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo($productInfo->DESCRIPTION) ?>">
                            <label for="quantity">Quantity</label>
                            <input type="number" min="0" class="form-control" id="quantity" name="quantity" value="<?php echo($productInfo->QUANTITY) ?>">
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
<script src="assets/js/product.js"></script>


<?php include_once('parts/bottom.php'); ?>
