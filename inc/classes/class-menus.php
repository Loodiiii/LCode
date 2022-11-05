<?php
/**
 * Register Menus
 *
 * @package LCode
 */

namespace LCode_THEME\Inc;

use LCode_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        // load classes
        $this->set_hooks();
    }

    protected function set_hooks() {
        /**
         * Actions.
         */

        add_action('init', [ $this, "register_menus" ] );

    }

    public function register_menus() {
        register_nav_menus(
            array(
                'lcode-header-menu' => esc_html__('Header Menu', 'lcode'),
                'lcode-footer-menu' => esc_html__('Footer Menu', 'lcode')
            )
        );
    }

    public function get_menu_id( $location ) {
        // Get all the locations.
        $locations = get_nav_menu_locations();

        // Get object id by location
        $menu_id = $locations[$location];

        return ! empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_items( $menu_array, $parent_id ) {
        
        $child_menus = array();
        
        if( ! empty( $menu_array ) && is_array( $menu_array) ) {
            foreach( $menu_array as $menu) {
                if( intval( $menu->menu_item_parent ) === $parent_id ) {
                    array_push( $child_menus, $menu );
                }
            }
        }

        return $child_menus;
    }

}

?>