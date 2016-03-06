<?php

@session_start();

@require_once('classes/Request.php');
@require_once('database/Customer.php');
@require_once('database/Order.php');

$req = new Request();

if (!is_null($req->get_request())) {
    $action = $req->get_stripped_param('action', NULL);
    if (!is_null($action) && function_exists('api_' . strtolower($action))) {
        $res = call_user_func('action_' . strtolower($action), $req);
        if (!is_null($res) && $res) {
            ob_start();
            header('Content-type: application/json; charset=UTF-8');
            echo(json_encode($res));
            ob_end_flush();
            exit;
        }
    }
}

function action_save_order_header(Request $req) {
    $customer_id = $req->get_int_param('customer_id');
    $db = new Database();
    if (!empty($customer_id)) {
        Order::insertHeader($db, $customer_id);
    }
}


