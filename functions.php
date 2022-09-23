<?php 
/**
 * Theme Functions.
 * 
 * @package LCode
*/

if( ! defined( 'LCODE_DIR_PATH' ) ) {
    define( 'LCODE_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

require_once LCODE_DIR_PATH . '/inc/helpers/autoloader.php';


function lcode_enqueue_scripts() {
    // Registering Styles
    wp_register_style( 'main-css', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/bootstrap-4.0.0/css/bootstrap.min.css', [], false , 'all' );
    wp_register_style( 'bootstrap-utilities-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap-utilities.min.css', [], false , 'all' );

    // Registering Scripts
    wp_register_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', [], filemtime( get_template_directory() . '/assets/js/main.js' ), true );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/bootstrap-4.0.0/js/bootstrap.min.js', [ 'jquery' ], false, true );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/src/library/js/jquery.min.js', [ 'jquery' ], false, true );

    // Enqueuing Styles
    wp_enqueue_style( 'main-css' );
    wp_enqueue_style( 'bootstrap-css' );
    wp_enqueue_style( 'bootstrap-utilities-css' );
    
    // Enqueuing Scripts
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
}

add_action('wp_enqueue_scripts', 'lcode_enqueue_scripts');



