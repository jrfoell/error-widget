<?php
/**
 * Plugin Name: Error Widget
 * Description: Example of Error vs. Exception vs. WP_Error
 * Author: Justin Foell
 * Version: 1.0.0
 *
 * @package EEE
 */

define( 'EEE_PLUGIN_DIR', trailingslashit( dirname( __FILE__ ) ) );

require_once EEE_PLUGIN_DIR . 'vendor/autoload.php';

add_action( 'widgets_init', function() {
	register_widget( 'EEE\\ErrorWidget' );
} );
