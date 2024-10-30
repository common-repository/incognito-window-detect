<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://samuelsilva.pt
 * @since             1.0.0
 * @package           Incognito_Window_Detect
 *
 * @wordpress-plugin
 * Plugin Name:       Incognito Window Detect
 * Description:       Display a message to users who are accessing the website via a private window.
 * Version:           1.3
 * Author:            Samuel Silva
 * Author URI:        https://samuelsilva.pt/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       incognito-window-detect
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'INCOGNITO_WINDOW_DETECT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-incognito-window-detect-activator.php
 */
function activate_incognito_window_detect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-incognito-window-detect-activator.php';
	Incognito_Window_Detect_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-incognito-window-detect-deactivator.php
 */
function deactivate_incognito_window_detect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-incognito-window-detect-deactivator.php';
	Incognito_Window_Detect_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_incognito_window_detect' );
register_deactivation_hook( __FILE__, 'deactivate_incognito_window_detect' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-incognito-window-detect.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_incognito_window_detect() {

	$plugin = new Incognito_Window_Detect();
	$plugin->run();

}


run_incognito_window_detect();
