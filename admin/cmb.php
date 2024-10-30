<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'incognito_window_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Suggested Search
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

if ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}



add_action( 'cmb2_admin_init', 'incognito_window_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function incognito_window_register_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box(
		array(
			'id'           => 'incognito_window_options_page',
			'title'        => esc_html__( 'Incognito Detect Settings', 'incognito-window-detect' ),
			'object_types' => array( 'options-page' ),
			'option_key'   => 'incognitowindow_settings',
			'icon_url'     => 'dashicons-hidden',
		)
	);

	$cmb_options->add_field(
		array(
			'name' => esc_html__( 'Activate Incognito Window Detect', 'incognito-window-detect' ),
			'desc' => esc_html__( 'Leave unchecked if you want to desactivate it.', 'incognito-window-detect' ),
			'id'   => 'incognitowindow_on',
			'type' => 'checkbox',		
		)
	);

	$cmb_options->add_field(
		array(
			'name' => esc_html__( 'Block entire page with fullscreen overlay', 'incognito-window-detect' ),
			'desc' => esc_html__( 'Check this if you want an entire overlay instead the footer message.', 'incognito-window-detect' ),
			'id'   => 'incognitowindow_overlay',
			'type' => 'checkbox',		
		)
	);

	$cmb_options->add_field(
		array(
			'name'    => esc_html__( 'Background Color', 'incognito-window-detect' ),
			'desc'    => esc_html__( 'For advise card.', 'incognito-window-detect' ),
			'id'      => 'incognitowindow_backgroundcolor',
			'type'    => 'colorpicker',
			'default' => '#3a3a3a',
			'options' => array( 'alpha' => true ),
		)
	);

	$cmb_options->add_field(
		array(
			'name'    => esc_html__( 'Text Color', 'incognito-window-detect' ),
			'desc'    => esc_html__( 'For advise card', 'incognito-window-detect' ),
			'id'      => 'incognitowindow_color',
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
			'options' => array( 'alpha' => true ),
		)
	);

	$cmb_options->add_field(
		array(
			'name'    => esc_html__( 'Text Advise', 'incognito-window-detect' ),
			'desc'    => esc_html__( 'The message to your incognito user', 'incognito-window-detect' ),
			'id'      => 'incognitowindow_message',
			'type'    => 'text',
			'default' => esc_html__( '<strong>You are in incognito mode.</strong> If you want a full experience with suggested content, please use a normal browser window.', 'incognito-window-detect' ),
		)
	);

	$cmb_options->add_field(
		array(
			'name'    => esc_html__( 'Text Size for the advise', 'incognito-window-detect' ),
			'desc'    => esc_html__( 'Do not miss the Unit (px, rem, pt, ...)', 'incognito-window-detect' ),
			'id'      => 'incognitowindow_fontsize',
			'type'    => 'text',
			'default' => '14px',
		)
	);


	$cmb_options->add_field(
		array(
			'name'       => esc_html__( 'Display at specific pages', 'incognito-window-detect' ),
			'desc'    => esc_html__( 'Leave it blank if you want to display on entire website.', 'incognito-window-detect' ),
			'id'         => 'incognitowindow_specificpages',
			'type'       => 'multicheck',
			'options'    => incognito_window_get_pages(),
			)
	);

	$cmb_options->add_field(
		array(
			'name'       => esc_html__( 'Time delay to show the advice', 'incognito-window-detect' ),
			'desc'    => esc_html__( 'Time in milliseconds (1 second = 1000 milliseconds). If you want to show immediately, leave this at 0.', 'incognito-window-detect' ),
			'id'         => 'incognitowindow_timedelay',
			'type'       => 'text',
			'default'    => '0',
			)
	);

	$cmb_options->add_field(
		array(
			'name' => esc_html__( 'Remove Data after uninstall', 'incognito-window-detect' ),
			'desc' => esc_html__( 'If you do not select this option, your data is not deleted.', 'incognito-window-detect' ),
			'id'   => 'incognitowindow_removedata_on',
			'type' => 'checkbox',
		)
	);

}


function incognito_window_get_pages() {
	
	$allpages = array();
	$page_ids = get_all_page_ids();

	foreach( $page_ids as $page ) {
		$allpages[ $page ] = get_the_title( $page );
	}

	return $allpages;

}