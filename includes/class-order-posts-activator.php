<?php

/**
 * Fired during plugin activation
 *
 * @link       https://tradesouthwest
 * @since      1.0.0
 *
 * @version    1.0.0
 * @package    order_posts
 * @subpackage order_posts/includes
 */

class Order_Posts_Activator {

	/**
	 * Activate plugin with WP.
	 * Attempts activation of plugin in a “sandbox” and redirects on success.
	 * @since    1.0.0
	 * @return false;
	 */
	public static function activate() {

		flush_rewrite_rules();
	}
	
} 