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
 * @since             2.0
 * @package           Innovia_vcextend
 *
 * @wordpress-plugin
 * Plugin Name:       Innovia Vcextend
 * Plugin URI:        www.innoviadigital.com
 * Description:       VC extend adon by innovia digital.
 * Version:           2.0
 * Author:            Innovia Web Team
 * Author URI:        www.innoviadigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       innovia_vcextend
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/yeomann/visual-composer-Addons
 * GitHub Branch:     master
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
	include_once plugin_dir_path( __FILE__ ) . 'includes/updator.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovia_vcextend-activator.php';
	Innovia_vcextend_Activator::activate();
	// print_r(get_declared_classes());

	// if ( class_exists('WPGitHubUpdater')) {
	// 	if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
	// 	    $config = array(
	// 	        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
	// 	        'proper_folder_name' => 'innovia_vcextend', // this is the name of the folder your plugin lives in
	// 	        'api_url' => 'https://api.github.com/repos/yeomann/visual-composer-Addons', // the github API url of your github repo
	// 	        'raw_url' => 'https://raw.github.com/yeomann/visual-composer-Addons/master', // the github raw url of your github repo
	// 	        'github_url' => 'https://github.com/yeomann/visual-composer-Addons', // the github url of your github repo
	// 	        'zip_url' => 'https://github.com/yeomann/visual-composer-Addons/zipball/master', // the zip url of the github repo
	// 	        'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
	// 	        'requires' => '3.0', // which version of WordPress does your plugin require?
	// 	        'tested' => '3.3', // which version of WordPress is your plugin tested up to?
	// 	        'readme' => 'README.MD' // which file to use as the readme for the version number
	// 	    );
	// 	    new WPGitHubUpdater($config);
	// 	}
	// } else {
	// 	throw new Exception("Error fucking class not found", 1);
	// } 

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
 * @since    1.6
 */
function run_innovia_vcextend() {

	$plugin = new Innovia_vcextend();
	$plugin->run();

}
run_innovia_vcextend();
