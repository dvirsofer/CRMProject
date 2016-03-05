<?php

@session_start();

@require_once('help_functions.php');
@require_once('database/Warehouse.php');
@require_once('database/Products.php');

$err = '';
$success = '';

$warehouses = Warehouse::getWarehouseList();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get details from post
    $desc = $_POST['desc'];
    $warehouse_id = $_POST['warehouse_id'];
    $quantity = $_POST['quantity'];

    // validate the name
    $err = Products::testNewProduct($desc, $warehouse_id, $quantity);

    // save if no errors were found
    if (empty($err)) {
        $isAdded = Products::insertProduct($desc, $warehouse_id, $quantity);
        $success = ($isAdded) ? 'Products Added!' : '';
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
                    <h3>Add a new product</h3>

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

                    <form method="post" action="add_new_product.php">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="warehouse_id">Select Warehouse:</label>
                            <select class="form-control" id="warehouse_id" name="warehouse_id">
                                <?php foreach ($warehouses as $warehouse): ?>
                                    <option value="<?php echo($warehouse->WAREHOUSE_ID); ?>"><?php echo($warehouse->WAREHOUSE_NAME); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" min="0" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>

