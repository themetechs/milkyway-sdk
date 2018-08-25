<?php
/**
 * The widgets factory class for milkyway SDK
 *
 * @package     milkywaySDK
 * @subpackage  Widgets
 * @copyright   Copyright (c) 2018, Muzahid
 * @license     http://opensource.org/licenses/gpl-3.0.php GNU Public License
 * @since       1.0.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'milkyway_SDK_Widgets_Factory' ) ) :
	/**
	 * Widgets factory model for milkyway SDK.
	 */
	class milkyway_SDK_Widgets_Factory {

		/**
		 * milkyway_SDK_Widgets_Factory constructor.
		 *
		 * @param milkyway_SDK_Product $product_object Product Object.
		 * @param array                 $widgets the widgets.
		 */
		public function __construct( $product_object, $widgets ) {
			if ( $product_object instanceof milkyway_SDK_Product && $widgets && is_array( $widgets ) ) {
				foreach ( $widgets as $widget ) {
					$class    = 'milkyway_SDK_Widget_' . str_replace( ' ', '_', ucwords( str_replace( '_', ' ', $widget ) ) );
					$instance = new $class( $product_object );
					$instance->setup_hooks();
				}
			}
		}
	}
endif;
