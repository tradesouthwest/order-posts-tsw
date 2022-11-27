<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://tradesouthwest.com
 * @since      1.0.0
 *
 * @package    Order_Posts
 * @subpackage Order_Posts/admin/partials
 */
if( ! defined( 'ABSPATH' ) ) exit;

/* F1 - Create custom columns for the manage profiles page. */
//add_filter( 'manage_posts_columns', 'order_posts_tsw_manage_order_posts_displayed_column' );
/* F2 - Customize the output of the custom column on the post admin page. */
// For rendering the column
//add_action( 'manage_posts_custom_column', 'order_posts_tsw_manage_order_posts_column',10,2);
// AD4 
//add_action('init', 'order_posts_tsw_update_custom_user_role' );
//add_action( 'add_meta_boxes', 'order_posts_tsw_add_custom_box' );
add_action( 'save_post', 'order_posts_tsw_save_postdata' );
/** F1
 * Unsets the 'posts' column and adds a 'users' column on the manage profiles admin page.
 *
 * @param array $columns An array of columns to be shown in the manage terms table.
 * TODO ability to remove column 
 */
function order_posts_tsw_manage_order_posts_displayed_column( $columns ) 
{
	$post_type = get_post_type();
    if ( $post_type == 'post' ) {
        $new_columns = array(
            'order_posts_tsw' => esc_html__( 'Display', 'text_domain' ),
        );
        return array_merge($columns, $new_columns);
    }
}

/** F2
 * Displays content for custom columns on the manage profile page in the admin.
 *
 * @param string $display WP just passes an empty string here.
 * @param string $column The name of the custom column.
 * @param int $term_id The ID of the term being displayed in the table.
 */
function order_posts_tsw_manage_order_posts_column( $column, $post_id ) 
{
	if( $column_name == 'order_posts_tsw' ) {
	$displayed_order = get_post_meta( $post_id, 'order_posts_display', true );
        if($displayed_order == 1) {
            echo "Yes";
        } else {
			echo "unordered";
		}
	}
} 


function order_posts_tsw_save_postdata( $post_id ) {
	if ( array_key_exists( 'order_posts_tsw', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_order_posts_tsw',
			$_POST['order_posts_tsw']
		);
	}
}


function order_posts_tsw_custom_box_html(){
?>
<fieldset>
<label for="order_posts_tsw">Description for this field</label>
	<input name="order_posts_tsw" id="order_posts_tsw" type="number" class="postbox">

	</fieldset>
	<?php 
} 
