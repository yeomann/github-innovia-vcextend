<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.innoviadigital.com
 * @since    1.6
 *
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Innovia_vcextend
 * @subpackage Innovia_vcextend/public
 * @author     Innovia Web Team <danish@innovia.biz>
 */
class Innovia_vcextend_Public {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/innovia_vcextend-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/innovia_vcextend-public.js', array( 'jquery' ), $this->version, false );

	}

	/*
	*	Channels Register Shortcode
	*/
	public function innovia_postloop_shortcode($atts) {
				
		$the_args = (shortcode_atts(
			array(
				'type' 					=> 'post',
				'postloop_count'		=> '3',
				'postloop_category'		=> '',
				'postloop_column'		=> 3, 
				'postloop_pagination'	=> 0, 
				'postloop_showmore'		=> 0, 
				'postloop_el_class'		=> '',
				'postloop_cat_orderby' 	=> '',
				'postloop_cat_order'	=> '',
			),
		$atts));

		$type = $the_args['type'];
		$postloop_count = $the_args['postloop_count'];
		$postloop_category = $the_args['postloop_category'];
		$postloop_column = $the_args['postloop_column'];
		$postloop_pagination = $the_args['postloop_pagination'];
		$postloop_showmore = $the_args['postloop_showmore'];
		$postloop_el_class = $the_args['postloop_el_class'];
		
		$postloop_cat_orderby = $the_args['postloop_cat_orderby'];
		$postloop_cat_order = $the_args['postloop_cat_order'];

		$args = array(
			'post_type' 		=> 	$type,
		    'posts_per_page' 	=> 	$postloop_count,
		    'orderby'			=>	$postloop_cat_orderby,
			'order'   			=> 	$postloop_cat_order,
		);

		if($postloop_category) {
			$args = $args + array(
				'category_name' => $postloop_category,
			);
		}
        if($postloop_pagination) {
            $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged')) : 1;
            $args = $args + array('paged' => $paged);
	    }

		switch ($postloop_column){
			case 1:
				$colclass='col-md-12 col-sm-12 col-xs-12';
				$colclass_num = 1;
				break;
			case 2:
				$colclass='col-md-6 col-sm-6 col-xs-12';
				$colclass_num = 2;
				break;
			case 3:
				$colclass='col-md-4 col-sm-4 col-xs-12';
				$colclass_num = 3;
				break;
			case 4:
				$colclass='col-md-3 col-sm-3 col-xs-12';
				$colclass_num = 4;
				break;
			default:
				$colclass='col-md-4 col-sm-4 col-xs-12';
		}

		// $pcounter = (int)$count;
		$i=1;

		$post_query = new WP_Query( $args );
		if ($post_query->have_posts()) :

		ob_start();
		?>
		<!-- could have HTML here -->
		<div class="row post-loop <?php echo $postloop_el_class?>">		
		<?php
			while ( $post_query->have_posts() ) : $post_query->the_post();
				$postid = get_the_id();
				if(has_post_thumbnail($postid)){
					$post_thumbnail = get_the_post_thumbnail( $postid, 'innovia__postloop', array('class' => 'img-thumbnail'));
				}
				else{
					$post_thumbnail = '';
					$post_thumbnail = '<img class="img-thumbnail" src="http://www.iskibris.com/wp-content/uploads/2016/10/placeholder.jpg" width="244" height="177" alt="iskibris | Placeholder image" />';
				}
				$total_size = $post_query->found_posts;
				// if ($i % $total_size == 0) {		
				$which_cat = get_the_category(get_the_ID())[0]->cat_name;
				?>

				<div class="post-loop-column m-b-2 <?php echo $colclass; ?>">
					<article class="content__tabs_content <?php if($colclass_num === 1) {echo "displayf flex-items-xs-top";} ?>">
						<div class="content__tabs_imageCon">
							<a href="<?php echo get_permalink($postid); ?>">
								<?php echo $post_thumbnail; ?>
							</a>
						</div>
						<div class="content__tabs--text displayinb">
							<a target="_blank" href="<?php echo get_permalink($postid); ?>">
								<h4 class="mt0 m-b-0 displayinb"><?php echo get_the_title(); ?></h4>
								<span class="datecontainer block"><?php echo  get_the_date("d F Y"); ?></span>
								<!-- <span class="pr-clr bold block">' <?php echo $which_cat; ?></span>	-->
								<strong class="content__tabs_morelink bold">Detaylar</strong>
							</a>
						</div>
					</article>
					<hr />
				</div>

				<?php
				// clearfix  place
				if($i==$postloop_column){
					echo '<div class="clearfix"></div>';
					$i=0;
				}
				$i+=1;			
			endwhile;
		?>			
		<!-- could have HTML here -->
		</div> <!-- row finishes here -->
		<?php
			// If show more button is required to limit the text output
			/*if($postloop_showmore) {
				if ($postloop_category) {
				    // Get the ID of a given category
				    $category_id = get_cat_ID( $postloop_category );
				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );
				    ?>
					<div class='content__tabs_content--viewall text-center' style='padding-bottom:10px; margin-top: 10px;'>
						<a href="<?php  echo esc_url( $category_link ); ?>" class="content__tabs_morelink bold caps">Tum " <?php echo $postloop_category; ?> "</a>;
					</div>
					<?php
				}
			}*/
			if($postloop_pagination){
		        $big = 999999999; // need an unlikely integer
		        //previous_posts_link( 'Older Posts' );
		        $a = paginate_links( array(
		                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		                'format' => '?paged=%#%',
		                'current' => max( 1, get_query_var('paged') ),
		                'total' => $post_query->max_num_pages
		        ) );
        		echo '<div class="innoviapagination">' . $a . '</div>';
	        } //end if pagination
		?>
		<?php endif; ?>			
		<?php
		$output_string = ob_get_contents();
		ob_get_clean();
		return $output_string;
		wp_reset_postdata();
	}


	/*
-	*	init for all shortcode
	*/
	public function innovia_vcextend_init_Shortcode() {		
		add_shortcode( 'innovia_postloop', array($this,'innovia_postloop_shortcode') );
	}
	// something else
	
}
