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
        $this->set_hooks();
    }

    protected function set_hooks() {
        // actions and filters
    }
}
