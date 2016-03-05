<?php

@session_start();

include_once 'database/Database.php';

class Warehouse {

	/**
	 * Function to check if form was submitted ok
	 * @param $warehouseName
	 * @return string errors if found any
	 */
	public static function testNewWarehouse($warehouseName)
	{
		$err = '';
		if (empty($warehouseName)) {
			$err = "Please fill in all the form";
		}
		return $err;
	}

	/**
	 * Insert new warehouse details
	 */
	public static function insertWarehouse($warehouseName)
	{
		$db = new Database();
		$q = "begin insert_warehouse(:cwarehousename); end;";
		$stid = $db->parseQuery($q);
		oci_bind_by_name($stid, ':cwarehousename', $warehouseName);
		$r = oci_execute($stid);  // executes and commits
		return $r;
	}

	public static function getWarehouseList()
	{
		$db = new Database();
		$q = "select * from table(get_warehouse(1,99999))";
		$result = $db->fetchAll($q);
		return $result;
	}

	public static function getWarehouseById($warehouseId)
	{
		$db = new Database();
		$q = "select * from table(get_warehouse(1,99999))";
		$result = $db->fetchAll($q);
		return $result;
	}



    
}
