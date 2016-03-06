<?php

@require_once('help_functions.php');
@require_once('database/Products.php');
@require_once('database/Warehouse.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get details from post
    $product_id = $_POST['product_id'];
    $productInfo = Products::getProductById($product_id);
    return json_encode($productInfo);
}