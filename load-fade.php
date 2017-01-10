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

add_action('template_redirect', 'start_fade');

function start_fade() {

    // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    /*
    var previous_opacity = document.body.style.opacity;
    document.body.style.transition: "opacity 0.5s";
    document.body.style.opacity = 0.2;
    */

}

function stop_fade() {

}