<?php
/**
 * Enqueue theme assets
 *
 * @package LCode
 */

namespace LCode_THEME\Inc;

use LCode_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        // load classes
        $this->set_hooks();
    }

    protected function set_hooks() {
        /**
         * Actions.
         */

        add_action('wp_enqueue_scripts', [ $this, "register_styles" ] );
        add_action('wp_enqueue_scripts', [ $this, "register_scripts" ] );
    }

    public function register_styles() {
        // Registering Styles
        wp_register_style( 'main-css', get_stylesheet_uri(), [], filemtime( LCODE_DIR_PATH . '/style.css' ), 'all' );
        wp_register_style( 'bootstrap-css', LCODE_DIR_URI . '/assets/src/library/bootstrap-4.0.0/css/bootstrap.min.css', [], false , 'all' );
        wp_register_style( 'bootstrap-utilities-css', LCODE_DIR_URI . '/assets/src/library/bootstrap-4.0.0/css/bootstrap-utilities.min.css', [], false , 'all' );

        // Enqueuing Styles
        wp_enqueue_style( 'main-css' );
        wp_enqueue_style( 'bootstrap-css' );
        wp_enqueue_style( 'bootstrap-utilities-css' );
    }

    public function register_scripts() {
        // Registering Scripts
        wp_register_script( 'main-js', LCODE_DIR_URI . '/assets/js/main.js', [], filemtime( LCODE_DIR_PATH . '/assets/js/main.js' ), true );
        wp_register_script( 'bootstrap-js', LCODE_DIR_URI . '/assets/src/library/bootstrap-4.0.0/js/bootstrap.min.js', [ 'jquery' ], false, true );


        // Enqueuing Scripts
        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'bootstrap-js' );
    }
}

?>