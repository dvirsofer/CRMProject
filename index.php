<?php

@session_start();

include_once 'database/Database.php';


$db = new Database();

$customers = getCustomers($db);

var_export($customers);

function getCustomers($db) {
    $q = "select * from customers";
    $result = $db->createQuery($q);
    return $result;
}