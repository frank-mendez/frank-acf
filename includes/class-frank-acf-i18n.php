<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://frank-mendez.github.io/
 * @since      1.0.0
 *
 * @package    Frank_Acf
 * @subpackage Frank_Acf/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Frank_Acf
 * @subpackage Frank_Acf/includes
 * @author     Frank Mendez <frankmendezwebdev@gmail.com>
 */
class Frank_Acf_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'frank-acf',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
