<?php 
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 * Includes terms to load early for CPT init
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * load files to run plugin
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) 
                            . 'includes/class-order-posts.php';

/**
 * late load scripts for public views
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) 
                            . 'public/order-posts-public-functions.php'; 
/**
 * The files responsible for handling helper functionality which occurs in the 
 * public-facing side of the site.
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) 
                            . 'public/order-posts-public-helpers.php'; 

/**
 * Admin side scripts and setting options 
 */
//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/order-posts-admin-postmeta.php';
//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/order-posts-tsw-settings-template-class.php';
// run settings template class
/*
$settings = new Order_Posts_Tsw_Template_Settings( "Order Posts TSW", 
                                                    "order_posts_tsw", 
                                                    __FILE__ ); 
*/ 