<?php

/**
 * Fired during plugin activation
 *
 * @link       www.innoviadigital.com
 * @since      1.0.0
 *
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/includes
 * @author     Innovia Web Team <danish@innovia.biz>
 */
class Innovia_vcextend_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
		    $config = array(
		        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
		        'proper_folder_name' => 'innovia_vcextend', // this is the name of the folder your plugin lives in
		        'api_url' => 'https://api.github.com/repos/yeomann/visual-composer-Addons', // the github API url of your github repo
		        'raw_url' => 'https://raw.github.com/yeomann/visual-composer-Addons/master', // the github raw url of your github repo
		        'github_url' => 'https://github.com/yeomann/visual-composer-Addons', // the github url of your github repo
		        'zip_url' => 'https://github.com/yeomann/visual-composer-Addons/zipball/master', // the zip url of the github repo
		        'sslverify' => true // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
		        'requires' => '3.0', // which version of WordPress does your plugin require?
		        'tested' => '3.3', // which version of WordPress is your plugin tested up to?
		        'readme' => 'README.MD' // which file to use as the readme for the version number
		    );
		    new WPGitHubUpdater($config);
		}



/*		if( ! class_exists( 'Smashing_Updater' ) ){
			include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
		}
		
		$updater = new Smashing_Updater( __FILE__ );
		$updater->set_username( 'rayman813' );
		$updater->set_repository( 'smashing-updater-plugin' );
		// $updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos		
		$updater->initialize();
*/
	}




}
