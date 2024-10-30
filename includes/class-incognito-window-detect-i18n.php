<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://samuelsilva.pt
 * @since      1.0.0
 *
 * @package    Incognito_Window_Detect
 * @subpackage Incognito_Window_Detect/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Incognito_Window_Detect
 * @subpackage Incognito_Window_Detect/includes
 * @author     Samuel Silva <hello@samuelsilva.pt>
 */
class Incognito_Window_Detect_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'incognito-window-detect',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
