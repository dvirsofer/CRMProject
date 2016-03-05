<?php

@session_start();

@require_once('help_functions.php');
@require_once('database/Warehouse.php');

$err = '';
$success = '';

$warehouses = Warehouse::getWarehouseList();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get details from post
    $warehouseName = $_POST['warehouse_name'];

    // validate the name
    $err = Warehouse::testNewWarehouse($warehouseName);

    // save if no errors were found
    if (empty($err)) {
        $isAdded = Warehouse::insertWarehouse($warehouseName);
        $success = ($isAdded) ? 'Products Added!' : '';
    }
}

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav_warehouse.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main content start here -->
                    <h3>Add a new warehouse</h3>

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

                    <form method="post" action="add_new_warehouse.php">
                        <div class="form-group">
                            <label for="desc">Name</label>
                            <input type="text" class="form-control" id="warehouse_name" name="warehouse_name" placeholder="Name">
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

</html>