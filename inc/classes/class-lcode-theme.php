<?php
/**
 * Bootstraps the Theme.
 * 
 * @package LCode
 * 
 */

namespace LCode_THEME\Inc;

use LCode_THEME\Inc\Traits\Singleton;

class LCode_THEME {
    use Singleton;

    protected function __construct() {
        // load classes

        Assets::get_instance();

        $this->set_hooks();

    }

    protected function set_hooks() {

        /**
         * Actions.
         */

        add_action('after_setup_theme', [ $this, 'setup_theme' ] );

    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', [
            'header-text'          => [ 'site-title', 'site-description' ],
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => false,
        ] );
    }

}


