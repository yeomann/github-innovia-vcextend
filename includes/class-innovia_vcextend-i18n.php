<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.innoviadigital.com
 * @since    1.6
 *
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since    1.6
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/includes
 * @author     Innovia Web Team <danish@innovia.biz>
 */
class Innovia_vcextend_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.6
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'innovia_vcextend',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
