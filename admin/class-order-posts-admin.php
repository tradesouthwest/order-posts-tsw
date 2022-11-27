<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://tradesouthwest.com
 * @since      1.0.0
 *
 * @package    Order_Posts
 * @subpackage Order_Posts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Order_Posts
 * @subpackage Order_Posts/admin
 * @author     Larry Judd <tradesouthwest@gmail.com>
 */
class Order_Posts_Admin {

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
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
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
		wp_enqueue_style( 'order-posts-admin-style', plugin_dir_url( __FILE__ ) 
						. 'css/order-posts-admin.css', 
						array(), 
						$this->version, 
						'all' );
		wp_enqueue_style( 'wp-color-picker' ); 
*/
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
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
		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( 'order-posts-admin-color', plugin_dir_url( __FILE__ ) 
							. 'js/order-posts-admin.js', 
							array( 'jquery', 'wp-color-picker' ), 
							false, true );
*/
	}

/** F2
 * Displays content for custom columns on the manage profile page in the admin.
 *
 * @param string $display WP just passes an empty string here.
 * @param string $column The name of the custom column.
 * @param int $term_id The ID of the term being displayed in the table.
 */
 
	public function add_custom_box() 
	{
		if ( !is_admin() ) return;
		$screens = [ 'post', 'product' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'order_posts_tsw',             // Unique ID
				'Order to Display',           // Box title
				[ self::class, 'box_html' ], // Content callback
				$screen,                    // Post type
				'side',                    // context
				'default'                 //priority
			);
		}
	}

	/**
	 * Display the meta box HTML to the user.
	 *
	 * @param WP_Post $post   Post object.
	 */
	public static function box_html( $post ) 
	{ ?>
		<?php wp_nonce_field( basename( __FILE__ ), 'order_post_tsw_nonce' ); ?> 
		<p>
    	<label for="order-post-tsw"><?php _e( "Enter display order for this post.", 
								'order-posts-tsw' ); ?></label>
    	<br>
    	<input class="widefat" type="number" name="order_post_tsw" id="order_post_tsw" 
		value="<?php echo esc_attr( get_post_meta( $post->ID, 'order_post_tsw', true ) ); ?>" 
		size="16" />
  		</p>
	<?php 
	}
	/* Meta box setup function. */
	public function init_postdata( $post_id ) 
	{
	global $post;
		/* Verify the nonce before proceeding. */
		if ( !isset( $_POST['order_post_tsw_nonce'] ) 
			|| !wp_verify_nonce( $_POST['order_post_tsw_nonce'], basename( __FILE__ ) ) )
    		return $post_id;

  		/* Get the post type object. */
  		$post_type = get_post_type_object( $post->post_type );

		/* Check if the current user has permission to edit the post. */
  		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    		return $post_id;

		/* Get the posted data and sanitize it for use as an HTML class. */
		$new_meta_value = ( isset( $_POST['order_post_tsw'] ) 
			? sanitize_html_class( $_POST['order_post_tsw'] ) : '' );
		/* Get the meta key. */
  		$meta_key = 'order_post_tsw';
		/* Get the meta value of the custom field key. */
    	$meta_value = get_post_meta( $post_id, $meta_key, true );
		
		/* If a new meta value was added and there was no previous value, add it. */
  		if ( $new_meta_value && '' == $meta_value )
    		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
		
		/* If the new meta value does not match the old value, update it. */
  		elseif ( $new_meta_value && $new_meta_value != $meta_value )
    		update_post_meta( $post_id, $meta_key, $new_meta_value );

		/* If there is no new meta value but an old value exists, delete it. */
  		elseif ( '' == $new_meta_value && $meta_value )
    		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
} 
