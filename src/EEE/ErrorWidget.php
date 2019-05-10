<?php

namespace EEE;

use WP_Widget;
use Exception;

class ErrorWidget extends WP_Widget {

	/**
	 * Sets up the widgets name etc.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'error-widget',
			'description' => 'An *exception*al widget',
		);
		parent::__construct( 'error_widget', 'Error Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args Widget args.
	 * @param array $instance Array for this widget instance.
	 */
	public function widget( $args, $instance ) {

		$api = new RemoteAPI( 'https://baconipsum.co/api/?type=meat-and-filler' );

		try {
			$text = $api->get();
		} catch ( APIException $e ) {
			?><script>console.log("<?php echo esc_html( $e->getMessage() ); ?>");</script><?php
		} catch ( Exception $e ) {
			$text = 'Exception Caught';
		} finally {
			$text = $text ?? 'Bacon not found';
		}

		try {
			include EEE_PLUGIN_DIR . 'templates/widget.php';
		} catch ( \ParseError $e ) {
			echo '<p>Syntax Error</p>';
		}
	}

	/**
	 * Outputs the options form on admin.
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		// Outputs the options form on admin.
	}

	/**
	 * Processing widget options on save.
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 */
	public function update( $new_instance, $old_instance ) {
		// Processes widget options to be saved.
	}
}
