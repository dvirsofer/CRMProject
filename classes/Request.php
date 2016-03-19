<?php

@include_once('classes/Utils.php');

class Request {

	private $_req = NULL;
	private $_sanitized = NULL;
	
	function __construct() {
		$this->_req = $this->resolve_request();
		$this->_sanitized = !is_null($this->_req) ? $this->sanitize_request() : NULL;
	}
	
	public function get_request() {
		return $this->_req;
	}
	
	public function get_sanitized() {
		return $this->_sanitized;
	}
	
	/**
	 * returns the value of a param after testing it against the validation filter;
	 * returns a fallback value if param doesn't exist in the request
	 *
	 * @access public
	 * @param string $param_name
	 * @param mixed $fallback_value the value to return in case the param doesn't exist
	 * @param mixed $validate validation filter
	 * @return mixed
	 */
	public function get_param($param_name, $fallback_value = NULL, $validate = NULL) {
		
		if ($this->param_not_empty($param_name)) {
			
			$val = trim($this->_req[$param_name]);
			
			// make sure no rogue slashes were introduced by magic quotes
			if (get_magic_quotes_gpc())
				$val = stripslashes($val);
			
			if (!is_null($validate)) {
				// apply validation on the value first...
				return (is_array($validate) ? $this->sanitize_input($val, $validate['filter'], $validate['options']) : $this->sanitize_input($val, $validate));
			} else {
				// ... or return it as-is
				return $val;
			}
			
		} else {
			// ... or return the provided fallback value if it doesn't exist
			return $fallback_value;
		}
		
	}
	
	/**
	 * shortcut method to return the stripped, sanitized (string) value of a param
	 *
	 * @access public
	 * @param string $param_name
	 * @param mixed $fallback_value the value to return in case the param doesn't exist
	 * @param boolean $encode_amp encode ampersands; turn off when stripping urls
	 * @return mixed
	 */
	public function get_stripped_param($param_name, $fallback_value = NULL, $encode_amp = TRUE) {
		$stripped = $this->get_param($param_name, $fallback_value,
			array(
				'filter' => FILTER_SANITIZE_STRING,
				'options' => array('flags' => ($encode_amp ? (FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_AMP) : FILTER_FLAG_STRIP_LOW))
			)
		);
		if (!is_null($stripped) && ($stripped != ''))
			$stripped = str_replace(array('&#34;', '&#39;'), array('"', "'"), $stripped);
		return $stripped;
	}
	
	/**
	 * shortcut method to return integer values
	 *
	 * @access public
	 * @param string $param_name
	 * @param mixed $fallback_value the value to return in case the param doesn't exist
	 * @return mixed
	 */
	public function get_int_param($param_name, $fallback_value = NULL) {
		return $this->get_param($param_name, $fallback_value, FILTER_VALIDATE_INT);
	}
	
	/**
	 * shortcut method to return boolean values
	 *
	 * @access public
	 * @param string $param_name
	 * @param mixed $fallback_value the value to return in case the param doesn't exist
	 * @return mixed
	 */
	public function get_boolean_param($param_name, $fallback_value = NULL) {
		return $this->get_param($param_name, $fallback_value, FILTER_VALIDATE_BOOLEAN);
	}
	
	/**
	 * shortcut method to return float values
	 *
	 * @access public
	 * @param string $param_name
	 * @param mixed $fallback_value the value to return in case the param doesn't exist
	 * @return mixed
	 */
	public function get_float_param($param_name, $fallback_value = NULL) {
		return $this->get_param($param_name, $fallback_value, FILTER_VALIDATE_FLOAT);
	}
	
	/**
	 * applies sanitize/validate filter on input array
	 * 
	 * IMPORTANT NOTE!
	 * When using a validate filter result will be filtered AND cast to target type
	 * When using a sanitize filter result will retain its original type (i.e. string)
	 * see http://us.php.net/manual/en/filter.filters.php
	 *
	 * @access private
	 * @param array $input
	 * @param array|int $filter
	 * @param mixed $options
	 * @return array
	 */
	private function sanitize_input($input, $filter, $options = NULL) {
		return (is_array($input) ? filter_var_array($input, $filter) : (!is_null($options) ? filter_var($input, $filter, $options) : filter_var($input, $filter)));
	}
	
	/**
	 * tests if the request includes a specified param and that it is set to some value
	 *
	 * @access private
	 * @param string $param_name
	 * @return boolean
	 */
	private function param_not_empty($param_name) {
		return ($this->param_exists($param_name) && (trim($this->_req[$param_name]) != ''));
	}
	
	/**
	 * tests if the request includes a specified param; called internally by param_not_empty.
	 * use directly only(!!!) on array-based inputs (checkbox sets and similar).
	 *
	 * @access public
	 * @param string $param_name
	 * @return boolean
	 */
	public function param_exists($param_name) {
		return (!is_null($this->_req) && isset($this->_req[$param_name]));
	}
	
	/**
	 * sanitizes all parameters in the request to be used in a postback
	 *
	 * @access private
	 * @param boolean $encode_amp encode ampersands
	 * @return object
	 */
	private function sanitize_request($encode_amp = TRUE) {
		$pb = array();
		foreach($this->_req as $param => $value) {
			if (is_array($value)) {
				$san = array();
				foreach($value as $vkey => $vval) {
						$san[$vkey] = filter_var($vval,
						FILTER_SANITIZE_STRING,
						($encode_amp ? (FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_AMP) : FILTER_FLAG_STRIP_LOW)
					);
				}
			} else {
					$san = filter_var($value,
					FILTER_SANITIZE_STRING,
					($encode_amp ? (FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_AMP) : FILTER_FLAG_STRIP_LOW)
				);
			}
			$pb[$param] = $san;
		}
		return Utils::array_to_obj($pb);
	}
	
	/**
	 * streamlines get/post requests
	 *
	 * @access private
	 * @return array
	 */
	private function resolve_request() {
		switch($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				$req = &$_GET;
				break;
			case 'POST':
				$req = &$_POST;
				break;
			default:
				$req = &$_REQUEST;
		}
		return $req;
	}
	
}

/* End of file: ./classes/Request.php */