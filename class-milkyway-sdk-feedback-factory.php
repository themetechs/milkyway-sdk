<?php
/**
 * The feedback factory class for milkyway SDK
 *
 * @package     milkywaySDK
 * @subpackage  Feedback
 * @copyright   Copyright (c) 2018, Muzahid
 * @license     http://opensource.org/licenses/gpl-3.0.php GNU Public License
 * @since       1.0.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'milkyway_SDK_Feedback_Factory' ) ) :
	/**
	 * Feedback model for milkyway SDK.
	 */
	class milkyway_SDK_Feedback_Factory {

		/**
		 * @var array $instances collection of the instances that are registered with the factory
		 */
		private $_instances = array();

		/**
		 * milkyway_SDK_Feedback_Factory constructor.
		 *
		 * @param milkyway_SDK_Product $product_object Product Object.
		 * @param array                 $feedback_types the feedback types.
		 */
		public function __construct( $product_object, $feedback_types ) {
			if ( $product_object instanceof milkyway_SDK_Product && $feedback_types && is_array( $feedback_types ) ) {
				foreach ( $feedback_types as $type ) {
					$class                     = 'milkyway_SDK_Feedback_' . ucwords( $type );
					$instance                  = new $class( $product_object );
					$this->_instances[ $type ] = $instance;
					$instance->setup_hooks();
				}
			}
		}

		/**
		 * Get the registered instances
		 */
		public function get_instances() {
			return $this->_instances;
		}
	}
endif;
