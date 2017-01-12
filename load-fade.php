<?php
/*
Plugin Name: Load Fade
Plugin URI: https://github.com/beb97/wp-plugin-load-fade
Description: Fade your page while loading the next one.
Version:     1.1
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
    $src = plugins_url( '/js/load-fade.js', __FILE__ );
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

function load_fade_action_links( $links ) {
    $link = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=load-fade') ) .'">'.__('Settings','load-fade').'</a>';
    // Ajoute le lien avant les autres liens
    array_unshift ($links,  $link);
    return $links;
}

function load_fade_load_textdomain() {
    load_plugin_textdomain( 'load-fade', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

// HOOK pour l'ajout du textdoamin (traduction)
add_action( 'plugins_loaded', 'load_fade_load_textdomain' );

// HOOK pour l'ajout du JS
add_action( 'wp_enqueue_scripts', 'load_fade_js' );

// Hook pour l'ajout du lien settings dans la page des plugins
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'load_fade_action_links' );


include( plugin_dir_path( __FILE__ ) . 'options.php');
?>
