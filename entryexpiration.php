<?php
/**
Plugin Name: Entry Expiration for Gravity Forms
Plugin URI: http://travislop.es/plugins/gravity-forms-entry-expiration/
Description: Provides a simple way to remove old entries in Gravity Forms.
Version: 2.0.3
Author: travislopes
Author URI: http://travislop.es
Text Domain: gravityformsentryexpiration
Domain Path: /languages
 **/

define( 'GF_ENTRYEXPIRATION_VERSION', '2.0.3' );

// If Gravity Forms is loaded, bootstrap the Entry Expiration Add-On.
add_action( 'gform_loaded', array( 'GF_EntryExpiration_Bootstrap', 'load' ), 5 );

/**
 * Class GF_EntryExpiration_Bootstrap
 *
 * Handles the loading of Gravity Forms Entry Expiration and registers with the Add-On Framework.
 */
class GF_EntryExpiration_Bootstrap {

	/**
	 * If the Add-On Framework exists, Gravity Forms Entry Expiration is loaded.
	 *
	 * @access public
	 * @static
	 */
	public static function load() {

		// If Add-On Framework is not loaded, exit.
		if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-entryexpiration.php' );

		GFAddOn::register( 'GF_Entry_Expiration' );

	}

}

/**
 * Returns an instance of the GFEntryExpiration class.
 *
 * @see    GF_Entry_Expiration::get_instance()
 *
 * @return object GF_Entry_Expiration
 */
function gf_entryexpiration() {
	return GF_Entry_Expiration::get_instance();
}
