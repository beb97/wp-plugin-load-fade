<?php
/*
Plugin Name: WordPress.org load-fade
Plugin URI:
Description: Basic fade while loading plugin
Version:     20170110
Author:      beb97
Author URI:
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:
Domain Path: /languages
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function start_fade() {

    // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    $handle = "load-fade";
    $src = plugins_url( '/load-fade.js', __FILE__ );
    $deps = array();
    $ver = false;
    $in_footer = false;

    // Register
    wp_register_script( $handle, $src, $deps, $ver, $in_footer );
    // Then Enqueue
    wp_enqueue_script( $handle );
}

add_action( 'wp_enqueue_scripts', 'start_fade' );