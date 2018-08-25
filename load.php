<?php
/**
 * Loader for the milkywaySDK
 *
 * Logic for loading always the latest SDK from the installed themes/plugins.
 *
 * @package     milkywaySDK
 * @copyright   Copyright (c) 2018, Muzahid
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.1.0
 */

// Current SDK version and path.
$milkyway_sdk_version = '2.2.3';
$milkyway_sdk_path    = dirname( __FILE__ );

global $milkyway_sdk_max_version;
global $milkyway_sdk_max_path;

if ( version_compare( $milkyway_sdk_version, $milkyway_sdk_max_version ) >= 0 ) {
	$milkyway_sdk_max_version = $milkyway_sdk_version;
	$milkyway_sdk_max_path    = $milkyway_sdk_path;
}

// load the latest sdk version from the active milkyway products
if ( ! function_exists( 'milkyway_sdk_load_latest' ) ) :
	/**
	 * Always load the latest sdk version.
	 */
	function milkyway_sdk_load_latest() {
		global $milkyway_sdk_max_path;
		require_once $milkyway_sdk_max_path . '/start.php';
	}
endif;
add_action( 'init', 'milkyway_sdk_load_latest' );
