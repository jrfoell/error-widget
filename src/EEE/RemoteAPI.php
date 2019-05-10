<?php

namespace EEE;

use Exception;

class RemoteAPI {

	private $url;

	public function __construct( $url ) {
		$this->url = $url;
	}

	/**
	 * Get a string.
	 *
	 * @return string
	 * @throws APIException Exception if there are GET issues.
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  2019-05-09
	 */
	public function get() {
		$json = $this->request( $this->url, 'GET' );

		$data = json_decode( $json );
		if ( is_array( $data ) ) {
			return current( $data );
		}
		return $data;
	}

	/**
	 * Get the request.
	 *
	 * @param string $url The URL.
	 * @param string $method GET, POST, etc.
	 * @return string Response data.
	 * @throws APIException Exception if there are remote request issues.
	 * @author Justin Foell <justin.foell@webdevstudios.com>
	 * @since  2019-05-09
	 */
	private function request( $url, $method ) {
		$response = wp_remote_request( $url,
			[
				'method' => $method,
			]
		);

		/*
		if ( is_wp_error( $response ) ) {
			return $response;
		}
		*/

		if ( is_wp_error( $response ) ) {
			//throw new Exception( $response->get_error_message() );
			//throw new APIException( $response->get_error_message() );
			throw APIException::from_wp_error( $response );
		}

		return wp_remote_retrieve_body( $response );
	}
}