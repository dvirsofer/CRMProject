<?php

@session_start();

include_once 'database/Database.php';

class Customer {

	/**
	 * Function to check if form was submitted ok
	 * @param $first_name
	 * @param $last_name
	 * @return string errors if found any
	 */
	public static function testNewCustomer($first_name, $last_name)
	{
		$err = '';
		if ((empty($first_name)) || (empty($last_name))) {
			$err = "Please fill in all the form";
		} else {
			$string_exp = "/^[A-Za-z .'-]+$/";
			if (!preg_match($string_exp, $first_name)) {
				$err = 'The First Name you entered does not appear to be valid.';
				return $err;
			}
			if (!preg_match($string_exp, $last_name)) {
				$err = 'The Last Name you entered does not appear to be valid.';
				return $err;
			}
		}
		return $err;
	}

	/**
	 * Insert new customer details
	 */
	public static function insertCustomer($first_name, $last_name)
	{
		$db = new Database();
		$q = "begin insert_customer(:cfirst_name, :clast_name); end;";
		$stid = $db->parseQuery($q);
		oci_bind_by_name($stid, ':cfirst_name', $first_name);
		oci_bind_by_name($stid, ':clast_name', $last_name);
		$r = oci_execute($stid);  // executes and commits
		return $r;
	}

	public static function getCustomersList()
	{
		$db = new Database();
		$q = "select * from table(get_customers(1,99999))";
		$result = $db->fetchAll($q);
		return $result;
	}



//    /**
//     * get customer details by id
//     * @param $id - the customer number
//     * @return customers details
//     */
//    public static function getCustomerById($id, $db) {
//        $q = "select * from customers where cust_id='{$id}'";
//        $result = $db->createQuery($q);
//       	return $result;
//    }
//
//    /**
//     * get customer details by last name
//     * @param $last_name
//     * @return customers details
//     */
//    public static function getCustomersDetails($cust_id, $first_name, $last_name, $db) {
//    	if(!empty($cust_id) && empty($first_name) && empty($last_name)) { // Only cust id inserted
//    		$q = "select * from customers where cust_id='{$cust_id}'";
//    	} elseif(empty($cust_id) && !empty($first_name) && empty($last_name)) { // Only first name inserted
//    		$q = "select * from customers where Initcap(first_name) like Initcap('{$first_name}')";
//    	} elseif(empty($cust_id) && empty($first_name) && !empty($last_name)) { // Only last name inserted
//    		$q = "select * from customers where Initcap(last_name) like Initcap('{$last_name}')";
//    	} elseif(!empty($cust_id) && !empty($first_name) && empty($last_name)) { // Only cust_id & first_name inserted
//    		$q = "select * from customers where cust_id='{$cust_id}' or Initcap(first_name) like Initcap('{$first_name}')";
//    	} elseif(!empty($cust_id) && empty($first_name) && !empty($last_name)) { // Only cust_id & last_name inserted
//    		$q = "select * from customers where cust_id='{$cust_id}' or Initcap(last_name) like Initcap('{$last_name}')";
//    	} elseif(empty($cust_id) && !empty($first_name) && !empty($last_name)) { // Only first_name & last_name inserted
//    		$q = "select * from customers where Initcap(first_name) like Initcap('{$first_name}') and Initcap(last_name) like Initcap('{$last_name}')";
//    	} elseif(!empty($cust_id) && !empty($first_name) && !empty($last_name)) { // Inserted all
//    		$q = "select * from customers where cust_id='{$cust_id}' or (Initcap(first_name) like Initcap('{$first_name}') and Initcap(last_name) like Initcap('{$last_name}'))";
//    	} else { // Nothing inserted
//    		return FALSE;
//    	}
//    	$result = $db->createQuery($q);
//    	return $result;
//    }
//
//
//    /**
//     * Update customer details
//     * @param int $cust_id - customer id
//     * @param String $first_name - customer first name
//     * @param String $last_name - customer last name
//     * @return FALSE if error in update
//     */
//    public static function updateCustomer($cust_id, $first_name, $last_name) {
//    	$db = new Database();
//    	$q = "update customers set first_name = :cfirst_name, last_name = :clast_name where cust_id = :ccust_id";
//    	$stid = $db->parseQuery($q);
//    	oci_bind_by_name($stid, ':cfirst_name', $first_name);
//    	oci_bind_by_name($stid, ':clast_name', $last_name);
//    	oci_bind_by_name($stid, ':ccust_id', $cust_id);
//    	$r = oci_execute($stid);  // update details
//    	return $r;
//    }
//
//    /**
//     * Get all customers details
//     * @return array of customers
//     */
//    public static function getAllCustomers() {
//    	$db = new Database();
//    	$q = "select * from customers order by first_name";
//    	$result = $db->createQuery($q);
//    	return $result;
//    }
//
//    /**
//     * Get the total customers number
//     * @param Database $db
//     */
//    public static function getCustomersCount($db) {
//    	$q = "select count(*) as count from customers";
//    	$result = $db->createQuery($q);
//    	return $result[0]['COUNT'];
//    }
    
}
