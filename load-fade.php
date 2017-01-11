<?php
/*
Plugin Name: Load Fade
Plugin URI:
Description: Fade your page while loading the next one.
Version:     1.0
Author:      beb97
Author URI: https://github.com/beb97
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: fade-load
Domain Path: /languages
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// https://developer.wordpress.org/reference/functions/wp_enqueue_style/
// https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function load_fade_js() {

    // 1) Register
    $handle = 'load-fade';
    $src = plugins_url( '/load-fade.js', __FILE__ );
    $deps = array('jquery');
    wp_register_script( $handle, $src, $deps );

    // 2) Translate
    $config_array = array(
        'delay' =>  get_option( 'lf_int_delay' ),
        'opacity' =>  get_option( 'lf_int_opacity' )
    );
    wp_localize_script( $handle, 'lf_conf', $config_array );

    // 3) Enqueue
    wp_enqueue_script( $handle );
}

// HOOK
add_action( 'wp_enqueue_scripts', 'load_fade_js' );

include( plugin_dir_path( __FILE__ ) . 'options.php');
?>
