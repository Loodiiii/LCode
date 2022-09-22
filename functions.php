<?php 
/**
 * Theme Functions.
 * 
 * @package LCode
*/

function lcode_enqueue_scripts() {
    // Registering Styles
    wp_register_style( 'main-css', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false , 'all' );

    // Registering Scripts
    wp_register_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', [], filemtime( get_template_directory() . '/assets/js/main.js' ), true );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );


    // Enqueuing Styles
    wp_enqueue_style( 'main-css' );
    wp_enqueue_style( 'bootstrap-css' );

    // Enqueuing Scripts
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
}

add_action('wp_enqueue_scripts', 'lcode_enqueue_scripts');


?>