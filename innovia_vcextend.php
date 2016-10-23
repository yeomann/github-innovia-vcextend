<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.innoviadigital.com
 * @since             1.0.0
 * @package           Innovia_vcextend
 *
 * @wordpress-plugin
 * Plugin Name:       Innovia Vcextend
 * Plugin URI:        www.innoviadigital.com
 * Description:       VC extend adon by innovia digital.
 * Version:           1.0.0
 * Author:            Innovia Web Team
 * Author URI:        www.innoviadigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       innovia_vcextend
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-innovia_vcextend-activator.php
 */
function activate_innovia_vcextend() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovia_vcextend-activator.php';
	Innovia_vcextend_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-innovia_vcextend-deactivator.php
 */
function deactivate_innovia_vcextend() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovia_vcextend-deactivator.php';
	Innovia_vcextend_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_innovia_vcextend' );
register_deactivation_hook( __FILE__, 'deactivate_innovia_vcextend' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-innovia_vcextend.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_innovia_vcextend() {

	$plugin = new Innovia_vcextend();
	$plugin->run();

}
run_innovia_vcextend();
