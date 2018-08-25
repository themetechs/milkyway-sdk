<?php
/**
 * File responsible for sdk files loading.
 *
 * @package     milkywaySDK
 * @copyright   Copyright (c) 2018, Muzahid
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.1.0
 */
$products      = apply_filters( 'milkyway_sdk_products', array() );
$path          = dirname( __FILE__ );
$files_to_load = array(
	'class-milkyway-sdk-loader.php',
	'class-milkyway-sdk-product.php',
	'class-milkyway-sdk-logger.php',
	'class-milkyway-sdk-licenser.php',
	'class-milkyway-sdk-rollback.php',
	'class-milkyway-sdk-feedback-factory.php',
	'class-milkyway-sdk-feedback.php',
	'class-milkyway-sdk-feedback-deactivate.php',
	'class-milkyway-sdk-feedback-review.php',
	'class-milkyway-sdk-feedback-translate.php',
	'class-milkyway-sdk-notification-manager.php',
	'class-milkyway-sdk-widget.php',
	'class-milkyway-sdk-widget-dashboard-blog.php',
	'class-milkyway-sdk-widgets-factory.php',
	'class-milkyway-sdk-endpoints.php',
);

foreach ( $files_to_load as $file ) {
	$file_path = $path . '/' . $file;
	if ( is_readable( $file_path ) ) {
		require_once $file_path;
	}
}
foreach ( $products as $product ) {
	milkyway_SDK_Loader::init_product( $product );
}
