<?php

@session_start();

@require_once('classes/Request.php');
@require_once('database/Customer.php');
@require_once('database/Order.php');
@require_once('database/Invoice.php');
@require_once('classes/Utils.php');

$req = new Request();

if (!is_null($req->get_request())) {
    $action = $req->get_stripped_param('action', NULL);
    if (!is_null($action) && function_exists('action_' . strtolower($action))) {
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

    $response = (object)array(
        "status" => false,
        "order_id" => -1,
    );

    $customer_id = $req->get_int_param('customer_id');
    $db = new Database();

    if (!empty($customer_id)) {
        Order::insertHeader($db, $customer_id);
        $response['order_id'] = Order::getLastAdded($db)[0]['LAST'];
        $response['status'] = true;
    }

    return $response;
}

function action_save_order_rows(Request $req) {

    $response = (object)array(
        "status" => false,
    );

    $order_rows = $req->get_stripped_param('order_rows', null);
    debug($order_rows);
    $response['status'] = true;

    return $response;
}


function action_save_order(Request $req) {
    $response = array(
        "status" => false,
        "order_id" => -1,
    );

    $request_array = $req->get_request();

    $response['order_id'] = $req->get_int_param('order_id', -1);

    $customer_id = $request_array['customer']['CUST_ID'];
    $products = $request_array['products'];
    $db = new Database();

    if (!empty($customer_id)) {

        if ($response['order_id'] == -1) {
            Order::insertHeader($db, $customer_id);
            $response['order_id'] = Order::getLastAdded($db)[0]['LAST'];
        } else {
            // delete old products
            Order::deleteOrderRows($response['order_id']);
        }

        $idx = 1;
        // insert products
        foreach ($products as $product) {
            Order::insertRow($idx, $response['order_id'], $product['P_ID'], $product['QUANTITY'], $db);
            $idx++;
        }

        $response['status'] = true;
    }

    return $response;
}

function action_generate_invoice(Request $request) {
    $db = new Database();

    $order_id = $request->get_int_param('order_id', -1);
    $order_date = $request->get_stripped_param('order_date', "");
    $order_date = date('Y-m-d', strtotime($order_date));
    $cust_id = $request->get_int_param('cust_id', -1);

    Invoice::insertInvoiceHeader($order_id, $order_date, $cust_id);

    $invoice_id = Invoice::getLastAdded($db)[0]['LAST'];
    $results = Order::getOrderRows($order_id, $db);

    foreach ($results as $index=>$result) {
        Invoice::insertRow($index + 1, $invoice_id, $result['P_ID'], $result['QUANTITY'], $db);
    }

    return array(
        "status" => true,
        "invoice_id" => $invoice_id,
    );
}