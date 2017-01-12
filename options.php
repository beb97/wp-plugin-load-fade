<?php
// GENERATED THANKS TO http://wpsettingsapi.jeroensormani.com/


add_action( 'admin_menu', 'lf_add_admin_menu' );
add_action( 'admin_init', 'lf_settings_init' );

function lf_add_admin_menu(  ) {
    add_options_page( 'Load fade', 'Load fade', 'manage_options', 'load-fade', 'lf_options_page' );

    /*** SAVING OPTIONS ***/
    if( isset( $_REQUEST[ 'lf_int_delay' ] ) ) {
        update_option( lf_int_delay, $_REQUEST[ 'lf_int_delay' ] );
    }

    if( isset( $_REQUEST[ 'lf_int_opacity' ] ) ) {
        update_option( lf_int_opacity, $_REQUEST[ 'lf_int_opacity' ] );
    }
}

function lf_settings_init(  ) {

    register_setting( 'pluginPage', 'lf_settings' );

    add_settings_section(
        'lf_pluginPage_section',
        __( 'Manage load fade settings', 'load-fade' ),
//        'Manage load fade settings',
        'lf_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'lf_int_delay',
        __( 'Fade transition duration (ms) :', 'load-fade' ),
//        'Fade delay (ms) :',
        'lf_int_delay_render',
        'pluginPage',
        'lf_pluginPage_section'
    );

    add_settings_field(
        'lf_int_opacity',
        __( 'Fade opacity final (0-1) :', 'load-fade' ),
//        'Fade opacity (0-1) :',
        'lf_int_opacity_render',
        'pluginPage',
        'lf_pluginPage_section'
    );
}

function lf_int_delay_render(  ) {
    $defaultDelay = 1000; //ms
    $lf_int_delay = get_option( 'lf_int_delay', $defaultDelay );
    ?>
    <input type='text' name='lf_int_delay' value='<?php echo $lf_int_delay; ?>'>
    <?php
}

function lf_int_opacity_render(  ) {
    $defaultOpacity = 0.8;
    $lf_int_opacity = get_option( 'lf_int_opacity', $defaultOpacity );
    ?>
    <input type='text' name='lf_int_opacity' value='<?php echo $lf_int_opacity; ?>'>
    <?php
}

function lf_settings_section_callback(  ) {
    echo __( 'Fading options :', 'load-fade' );
//    echo 'Fading options :';
}


function lf_options_page(  ) {
    ?>
    <form action='' method='post'>
        <h2>Load fade</h2>
        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>
    </form>
    <?php
}
?>