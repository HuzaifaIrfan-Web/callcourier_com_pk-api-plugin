<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://huzaifairfan.com/
 * @since             1.0.0
 * @package           callcourier_pk_api_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Callcourier PK API Plugin
 * Plugin URI:        http://huzaifairfan.com/
 * Description:       Display callcourier_pk Tracking Details on your Wordpress Website
 * Version:           1.0.0
 * Author:            Huzaifa Irfan
 * Author URI:        http://huzaifairfan.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       callcourier_pk_api_plugin
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die("Hey, what are you doing here? You silly human!");
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'callcourier_pk_API_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-callcourier_pk_api_plugin-activator.php
 */
function activate_callcourier_pk_api_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-callcourier_pk_api_plugin-activator.php';
	callcourier_pk_api_plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-callcourier_pk_api_plugin-deactivator.php
 */
function deactivate_callcourier_pk_api_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-callcourier_pk_api_plugin-deactivator.php';
	callcourier_pk_api_plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_callcourier_pk_api_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_callcourier_pk_api_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-callcourier_pk_api_plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_callcourier_pk_api_plugin() {

	$plugin = new callcourier_pk_api_plugin();
	$plugin->run();

}

run_callcourier_pk_api_plugin();

// Plugin Code Start


?>
