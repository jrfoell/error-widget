<?php

namespace EEE;

use Exception;
use WP_Error;

class APIException extends Exception {

	public static function from_wp_error( WP_Error $error ) {
		$class = __CLASS__;
		return new $class( $error->get_error_message() );
	}

	public function __toString() {
		return $this->getMessage();
	}

	public function toHTML() {
		return '<pre>' . $this . '</pre>';
	}

}
