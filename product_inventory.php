<?php

@require_once('help_functions.php');
@require_once('database/Products.php');

@session_start();

$sort_info = "";
$sort_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sort_type = $_POST['sort_type'];
    $sort_info = $_POST['sort_info'];
    $products = Products::getAllSortProducts($sort_info, $sort_type);

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

                    <form method="post" action="product_inventory.php">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="sort_info">Sort By</label>
                                <select class="form-control" id="sort_info" name="sort_info">
                                    <option value="0">select sort info</option>
                                    <option <?php if($sort_info === "p_id") { ?> selected="selected" <?php } ?> value="p_id">Id</option>
                                    <option <?php if($sort_info === "description") { ?> selected="selected" <?php } ?> value="description">Description</option>
                                    <option <?php if($sort_info === "quantity") { ?> selected="selected" <?php } ?> value="quantity">Quantity</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sort_type">Sort</label>
                                <select class="form-control" id="sort_type" name="sort_type">
                                    <option value="0">select sort</option>
                                    <option <?php if($sort_type === "1") { ?> selected="selected" <?php } ?>  value="1">asc</option>
                                    <option <?php if($sort_type === "2") { ?> selected="selected" <?php } ?>  value="2">desc</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {?>

                        <h3>All Products</h3>
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Product ID</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            </thead>
                            <tbody>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td><?php echo($product->P_ID); ?></td>
                                    <td><?php echo($product->DESCRIPTION); ?></td>
                                    <td><?php echo($product->QUANTITY); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>


</html>
