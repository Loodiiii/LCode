<?php 
/**
 * Singleton Trait.
 * 
 * @package LCode
 *  
 */

namespace LCode_THEME\Inc\Traits; 

trait Singleton {
    public function __construct() {

    }

    public function __clone() {

    }

    final public static function get_instance() {
        static $instance = [];

        /**
		 * If this trait is implemented in a class which has multiple
		 * sub-classes then static::$_instance will be overwritten with the most recent
		 * sub-class instance. Thanks to late static binding
		 * we use get_called_class() to grab the called class name, and store
		 * a key=>value pair for each `classname => instance` in self::$_instance
		 * for each sub-class.
		 */
        $called_class = get_called_class();

        if( !isset( $instance[ $called_class ] )) {
            $instance[ $called_class ] = new $called_class();
        
            do_action( sprintf( 'lcode_theme_singleton_init%s', $called_class ));
        }

        return $instance[ $called_class ];
    }
};

