<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://samuelsilva.pt
 * @since      1.0.0
 *
 * @package    Incognito_Window_Detect
 * @subpackage Incognito_Window_Detect/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Incognito_Window_Detect
 * @subpackage Incognito_Window_Detect/public
 * @author     Samuel Silva <hello@samuelsilva.pt>
 */
class Incognito_Window_Detect_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Incognito_Window_Detect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Incognito_Window_Detect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/incognito-window-detect-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

	
		$incognitowindow_settings = get_option('incognitowindow_settings');
		if( $incognitowindow_settings !== null ){
			if( ! empty( $incognitowindow_settings['incognitowindow_specificpages'] ) ){
				$actual_page = get_the_ID();
				if( ! in_array( $actual_page, $incognitowindow_settings['incognitowindow_specificpages'] ) ) {
					return;
				}
			}
			wp_enqueue_script( $this->plugin_name, '//cdn.jsdelivr.net/gh/Joe12387/detectIncognito@v1.3.0/dist/es5/detectIncognito.min.js' );
			wp_enqueue_script( $this->plugin_name . 'custom', plugin_dir_url( __FILE__ ) . 'js/incognito-window-detect-public.js', array( 'jquery' ), $this->version, false );

			wp_localize_script( $this->plugin_name, 'incognitowindow_settings', $incognitowindow_settings );

		}
	}

}
