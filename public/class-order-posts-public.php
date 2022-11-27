<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://tradesouthwest.com
 * @since      1.0.0
 *
 * @package    Order_Posts
 * @subpackage Order_Posts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Order_Posts
 * @subpackage Order_Posts/public
 * @author     Larry Judd <tradesouthwest@gmail.com>
 */
class Order_Posts_Public {

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
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Order_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Order_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
/*
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) 
            . 'css/order-posts-public.css', array(), time(), 'all' );
*/
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Order_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Order_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	/* wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) 
            . 'js/order-posts-public.js', array( 'jquery' ), time(), false );
		wp_localize_script( 
        'order-posts-public', 
        'pdtswFrmObject', 
        array( 
            'ajaxurl'     => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce('pdtsw_frm_action_nonce', 'pdtsw_frm_nonce'),
			'orderby_var' => 'pdtsw_sortform_dropdown' 
        )
    ); */
	
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function register_shortcodes() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Order_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Order_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//add_shortcode( 'order_posts_table', 'order_posts_tsw_shortcode_table');
		//add_shortcode( 'order_posts_grid', 'order_posts_tsw_shortcode_grid');
		//add_shortcode( 'order_posts_category', 'order_posts_tsw_shortcode_category');
		//add_shortcode( 'order_posts_profile', 'order_posts_tsw_render_author_page');

	}
} 