<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.innoviadigital.com
 * @since    1.6
 *
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/admin
 * @author     Innovia Web Team <danish@innovia.biz>
 */
class Innovia_vcextend_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.6
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.6
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.6
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.6
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Innovia_vcextend_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Innovia_vcextend_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/innovia_vcextend-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.6
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Innovia_vcextend_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Innovia_vcextend_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/innovia_vcextend-admin.js', array( 'jquery' ), $this->version, false );

	}

	/*
	*	Register image size
	*/
	public function innovia__register_imagesize() {
		add_image_size( 'innovia__postloop', 244, 170, true ); // Blog type thumnail size
	}
	
	/*
	*	Post loop Visual Composer Element
	*/
	public function innovia_postloop() {	
		vc_map( array(
		   "name" => __("Innovia Post Loop", "my-text-domain"),
		   "base" => "innovia_postloop",
		   "class" => "",
		   "category" => __('_innovia'),
		   "icon" => "icon-wpb-application-icon-large",
		   "params" => array(
				array(
					"type" => "posttypes",
					"heading" => __("Post types"),
					"param_name" => "type",
					"description" => __("Select Post types.")
				),
				array(
				  "type" => "textfield",
				  "heading" => __("Total items"),
				  "param_name" => "postloop_count",
				  "description" => __("Write number to limit output of post items. Write (-1) for showing all post items.")
				),
				array(
					"type" => "textfield",
					"heading" => __("Categories"),
					"param_name" => "postloop_category",
					"description" => __("Select categories and separate with comma if you want to filter")
		   		),
				array(
				  "type" => "dropdown",
				  "heading" => __("Grid elements per row", "js_composer"),
				  "param_name" => "postloop_column",
				  "value" => array(4, 3, 2, 1),
				  "description" => __("Select columns count.")
				),
				array(
					"type" => "checkbox",
					"heading" => __("Do you want to Show Pagination?"),
					"param_name" => "postloop_pagination",
					"value" => array("Yes" => 1),
					"description" => __("Provide pagination")
				),
	            array(
	                'type' => 'textfield',
	                'heading' => __( 'Extra class name', 'js_composer' ),
	                'param_name' => 'postloop_el_class',
	                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
	            ),
				// array(
				// 	"type" => "checkbox",
				// 	"heading" => __("Show More"),
				// 	"param_name" => "postloop_showmore",
		  		//  "value" => array("Yes" => 1),
				// 	"description" => __("Provide show more facility")
				// ),
			    // $vc_add_css_animation,
	            // GROUP 2
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Sort Post loop items By"),
					"param_name" => "postloop_cat_orderby",
					"group" => "Post loop Settings",
					"value"       => array(					    
					    'None'	 				=> 'none',
					    'Date'	 				=> 'date',
					    'Name'	 				=> 'name',
					    'Order by post ID'	 	=> 'ID',
					    'Title'  				=> 'title',
					    'Last modified date'	=> 'modified',
					    'Post/page parent ID'	=> '',
 					    'Menu order/Page Order'	=> '',
					    'Random order'   		=> 'rand',
					),
					"std"         => '',
					"description" => __("Show results sortby.")
		       ),
		       array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Sort Post loop items In"),
					"param_name" => "postloop_cat_order",
					"group" => "Post loop Settings",
					"value" => array(
				        'Ascending'		=>'ASC',
				        'Descending'  	=> 'DESC',
			      	),
					"std"         => '',
					"description" => __("Show results Sort in.")
		        ),
		       // GROUP design
		        // array(
		        //     'type' => 'css_editor',
		        //     'heading' => __( 'Css', 'my-text-domain' ),
		        //     'param_name' => 'postloop_css',
		        //     'group' => __( 'Design options', 'my-text-domain' ),
		        // ),
		   )
		) );
	}



}

	// class WPBakeryShortCode_Bartag extends WPBakeryShortCode {
	// }
