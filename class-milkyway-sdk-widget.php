<?php
/**
 * The widget model class for milkyway SDK
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
if ( ! class_exists( 'milkyway_SDK_Widget' ) ) :
	/**
	 * Widget model for milkyway SDK.
	 */
	abstract class milkyway_SDK_Widget {
		/**
		 * @var milkyway_SDK_Product $product milkyway Product.
		 */
		protected $product;

		/**
		 * milkyway_SDK_Widget constructor.
		 *
		 * @param milkyway_SDK_Product $product_object Product Object.
		 */
		public function __construct( $product_object ) {
			if ( $product_object instanceof milkyway_SDK_Product ) {
				$this->product = $product_object;
			}
			$this->setup_hooks();
		}

		/**
		 * Registers the hooks and then delegates to the child
		 */
		public function setup_hooks() {
			$this->setup_hooks_child();
		}

		/**
		 * Abstract function for delegating to the child
		 */
		protected abstract function setup_hooks_child();

	}
endif;
