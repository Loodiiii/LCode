<?php 
/**
 * Theme Functions.
 * 
 * @package LCode
*/

function lcode_enqueue_scripts() {
    // Registering styles and scripts
    wp_register_style( 'main-style', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_register_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', [], filemtime( get_template_directory() . '/assets/js/main.js' ), true );


    // Enqueuing styles and scripts
    wp_enqueue_style( 'main-style' );
    wp_enqueue_script( 'main-js' );
}

add_action('wp_enqueue_scripts', 'lcode_enqueue_scripts');


?>