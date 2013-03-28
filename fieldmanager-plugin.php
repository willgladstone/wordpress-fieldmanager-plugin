<?php
/**
 * @package Fieldmanager
 * @subpackage Plugin
 * @version 0.1
 */
/*
Plugin Name: Fieldmanager Plugin
Plugin URI: http://github.com/willgladstone/fieldmanager-plugin
Description: A blank template for creating Plugins for wordpress-fieldmanager
Author: Bradford Campeau-Laurion, Will Gladstone
Version: 0.1
Author URI: http://www.alleyinteractive.com/
*/

require_once( dirname( __FILE__ ) . '/php/class-fieldmanager-plugin.php' ); //Alter this. to your new plugin class
require_once( dirname( __FILE__ ) . '/php/class-plugin-dependency.php' );

function fieldmanager_plugin_dependency() {
	$fieldmanager_dependency = new Plugin_Dependency( 'Fieldmanager Plugin', 'Fieldmanager', 'https://github.com/netaustin/wordpress-fieldmanager' ); //Change your plugin title here
	if( !$fieldmanager_dependency->verify() ) {
		// Cease activation
	 	die( $fieldmanager_dependency->message() );
	}
}
register_activation_hook( __FILE__, 'fieldmanager_plugin_dependency' );

/**
 * Get the base URL for this plugin.
 * @return string URL pointing to Fieldmanager Plugin top directory.
 */
function fieldmanager_plugin_get_baseurl() {
	return plugin_dir_url( __FILE__ );
}