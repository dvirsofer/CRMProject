<?php

class Utils {
	
	public static function normalize_string($str, $replacement = '_') {
		if (is_null($str))
			return '';
		$clean = trim(iconv('UTF-8', 'ASCII//TRANSLIT', $str));
		$clean = preg_replace('/[^0-9a-zA-Z_-]/', $replacement, $clean);
		return strtolower($clean);
	}
	
	/**
	 * translates object to escaped json string
	 *
	 * @access public
	 * @param mixed $obj
	 * @return string
	 */
	public static function convert_to_escaped_json($obj) {
		return htmlspecialchars(json_encode($obj), ENT_QUOTES, 'UTF-8');
	}
	
	/**
	 * recursive conversion of array to plain objcet
	 *
	 * @access public
	 * @param array $array
	 * @return object
	 */
	public static function array_to_obj($array) {
		if (!is_array($array))
			return $array;
		$obj = new stdClass();
		if (is_array($array) && count($array) > 0) {
			foreach ($array as $name=>$value) {
				$name = strtolower(trim($name));
				if (isset($name))
					$obj->$name = Utils::array_to_obj($value);
			}
			return $obj;
		} else {
			return FALSE;
		}
	}
	
	/**
	 * maps and filters postback errors (if any) against possible errors we're interested to identify
	 *
	 * @access public
	 * @param array $postback_errors the errors returned from postback processing
	 * @param array $relevant_errors the errors we're interested in
	 * @return array
	 */
	public static function map_postback_errors($postback_errors = array(), $relevant_errors = array()) {
		$map = array();
		if (!empty($postback_errors) && !empty($relevant_errors)) {
			foreach($relevant_errors as $e)
				$map[$e] = in_array($e, $postback_errors);
		}
		return $map;
	}
	
}
