<?php

@require_once('help_functions.php');
@require_once('database/Products.php');

@session_start();

$sales = Balance::getSalesProducts();

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
                    <h3>All Sales Products</h3>
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Product ID</th>
                        <th>Description</th>
                        <th>Warehouse Name</th>
                        <th>Quantity</th>
                        </thead>
                        <tbody>

                        <?php foreach($sales as $sale): ?>
                            <tr>
                                <td><?php echo($sale['P_ID']); ?></td>
                                <td><?php echo($sale['DESCRIPTION']); ?></td>
                                <td><?php echo($sale['WAREHOUSE_NAME']); ?></td>
                                <td><?php echo($sale['QUANTITY']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>


</html>


