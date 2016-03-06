<?php
@session_start();

include_once 'database/Database.php';
include_once 'database/Inventory.php';
include_once 'database/Balance.php';

class Products {

    /**
     * Function to check if form was submitted ok
     * @return errors if found any
     */
    public static function testNewProduct($desc, $warehouse_id, $quantity) {
        $err = '';
        if ((empty($desc)) || (empty($warehouse_id)) || (empty($quantity))) {
            $err = "Please fill in all the fields";
        }
        return $err;
    }
    
    /**
     * Find the product details by description
     * @param $desc- the product description
     * @return an array of the product if found or FALSE otherwise
     */
    public static function getProduct($desc) {
    	$db = new Database();
    	$q = "SELECT * FROM products WHERE description='{$desc}'";
    	$result = $db->createQuery($q);
    	if (count($result) > 0) {
    		return $result;
    	} else {
    		return FALSE;
    	}
    }
    
    /**
     * Find the product details by id
     * @param $p_id- the product id
     * @return an array of the product if found or FALSE otherwise
     */
    public static function getProductById($p_id) {
    	$db = new Database();
    	$q = "select * from table(get_product_by_id(:pid))";
		$stid = $db->parseQuery($q);
		oci_bind_by_name($stid, ':pid', $p_id);
		$result = $db->fetchAll($q, $stid);
		return $result[0];
    }
    
    /**
     * Get all products details
     * @return array of products
     */
    public static function getAllProducts() {
		$db = new Database();
		$q = "select * from table(get_products(1,99999))";
		$result = $db->fetchAll($q);
		return $result;
    }
    
    /**
     * insert new product
     * @return FALSE if any error in inserting
     */
    public static function insertProduct($desc, $warehouse_id, $quantity) {
    	$db = new Database();
    	
    	$q = "begin insert_product(:cdesc, :cwarehouse_id, :cquantity); end;";
    	$stid = $db->parseQuery($q);
    	oci_bind_by_name($stid, ':cdesc', $desc);
    	oci_bind_by_name($stid, ':cwarehouse_id', $warehouse_id);
    	oci_bind_by_name($stid, ':cquantity', $quantity);
    	$r = oci_execute($stid);  // executes and commits
    	
    	return $r;
    }

	public static function updateProduct($product_id, $desc, $warehouse_id, $quantity) {
		$db = new Database();

		$q = "begin update_product(:pid, :cdesc, :cwarehouse_id, :quantity); end;";
		$stid = $db->parseQuery($q);
		oci_bind_by_name($stid, ':pid', $product_id);
		oci_bind_by_name($stid, ':cdesc', $desc);
		oci_bind_by_name($stid, ':cwarehouse_id', $warehouse_id);
		oci_bind_by_name($stid, ':quantity', $quantity);
		$r = oci_execute($stid);  // executes and commits

		return $r;
	}
    
//    /**
//     * Find the product id by it's description
//     * @param $desc- the product description
//     * @return the product id if found or FALSE otherwise
//     */
//    public static function getProductId($desc) {
//    	$db = new Database();
//    	$q = "select p_id from products where description='{$desc}'";
//    	$result = $db->createQuery($q);
//    	if (count($result) > 0) {
//    		return $result[0]['P_ID'];
//    	} else {
//    		return FALSE;
//    	}
//    }
//
//    /**
//     * Find the description by the product id
//     * @param $p_id- the product id
//     * @return a string of the product description if found or FALSE otherwise
//     */
//    public static function getProductDesc($p_id, $db) {
//    	$q = "select description from products where p_id='{$p_id}'";
//    	$result = $db->createQuery($q);
//    	if (count($result) > 0) {
//    		return $result[0]['DESCRIPTION'];
//    	} else {
//    		return FALSE;
//    	}
//    }
    
//    /**
//     * Find the product price by it's id
//     * @param $p_id- the product id
//     * @return an integer of the product price if found or FALSE otherwise
//     */
//    public static function getProductPrice($p_id) {
//    	$db = new Database();
//    	$q = "select price from products where p_id='{$p_id}'";
//    	$result = $db->createQuery($q);
//    	if (count($result) > 0) {
//    		return $result[0]['PRICE'];
//    	} else {
//    		return FALSE;
//    	}
//    }
    
    /**
     * Reduce quantity of product with id as param $p_id by quantity as the param $quantity
     * @param int $p_id
     * @param int $quantity
     * @param Database $db
     */
    public static function reduceQuantity($p_id, $quantity, $db) {
    	$q = "select * from products p, inventory i where i.p_id = p.p_id and p.p_id = '{$p_id}'";
    	$result = $db->createQuery($q);
    	$old_quantity = $result[0]['QUANTITY'];
    	$new_quantity = $old_quantity - $quantity;
    	$q = "begin update_quantity(:cp_id, :cquantity); end;";
		$stid = $db->parseQuery($q);
		oci_bind_by_name($stid, ':cp_id', $p_id);
		oci_bind_by_name($stid, ':cquantity', $new_quantity);
    	oci_execute($stid);  // executes and commits
    	
    	// if new_quantity < 10 -> Make an order to store -> Add Balance move
    	if($new_quantity < 10 && $new_quantity >= 0) {
    		Balance::insertBalanceWithParameters($p_id, $_SESSION['id'], (10), $result[0]['STORE_PRICE'], 'Debit', $db);
    	} elseif($new_quantity < 0) { // Ordered more than in Inventory
			Balance::insertBalanceWithParameters($p_id, $_SESSION['id'], ($new_quantity*-1 + 10), $result[0]['STORE_PRICE'], 'Debit', $db);
		}
    }
    
    /**
     * Find the quantity of a product
     * @param $desc- the product description
     * @return the quantity of the product in the inventory if found or FALSE otherwise
     */
    public static function getProductMaxQuantity($desc) {
    	$db = new Database();
    	$q = "select quantity from (select p.p_id, p.description, p.price, i.quantity from products p, inventory i where p.p_id = i.p_id order by p.p_id) where description='{$desc}'";
    	$result = $db->createQuery($q);
    	if (count($result) > 0) {
    		return $result[0]['QUANTITY'];
    	} else {
    		return FALSE;
    	}
    }
    
    /**
     * Get product details by description and id
     * @param String $desc
     * @param int $p_id
     * @return array of products:
     */
    public static function getProductDetails($desc, $p_id) {
    	$db = new Database();
    	$q = "select p.p_id, p.description, p.price, i.quantity from products p, inventory i where (p.p_id = i.p_id) and (p.description='{$desc}' or p.p_id='{$p_id}')";
    	$result = $db->createQuery($q);
    	return $result;
    }
    
}
