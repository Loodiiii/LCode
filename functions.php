<?php 
/**
 * Theme Functions.
 * 
 * @package LCode
 * 
 */

if( ! defined( 'LCODE_DIR_PATH' ) ) {
    define( 'LCODE_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if( ! defined( 'LCODE_DIR_URI' ) ) {
    define( 'LCODE_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once LCODE_DIR_PATH . '/inc/helpers/autoloader.php';
require_once LCODE_DIR_PATH . '/inc/helpers/template-tags.php';

function lcode_get_theme_instance() {
    \LCode_THEME\Inc\LCode_THEME::get_instance();
}

lcode_get_theme_instance();


