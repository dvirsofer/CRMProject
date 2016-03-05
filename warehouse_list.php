<?php

@require_once('help_functions.php');
@require_once('database/Warehouse.php');

@session_start();

$warehouses = Warehouse::getWarehouseList();

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
                    <h3>All Warehouses</h3>
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Warehouse ID</th>
                        <th>Warehouse Name</th>
                        </thead>
                        <tbody>
                        <?php foreach($warehouses as $warehouse): ?>
                            <tr>
                                <td><?php echo($warehouse->WAREHOUSE_ID); ?></td>
                                <td><?php echo($warehouse->WAREHOUSE_NAME); ?></td>
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
