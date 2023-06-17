<?php
/**
 * Register meta boxes
 *
 * @package LCode
 */

namespace LCode_THEME\Inc;

use LCode_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct() {
        // load classes
        $this->set_hooks();
    }

    protected function set_hooks() {
        /**
         * Actions.
         */

         add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
         add_action( 'save_post', [ $this, 'save_post_meta_data' ] );

    }

    public function add_custom_meta_box( $post ) {
        $screens = [ 'post' ];
        foreach( $screens as $screen) {
            add_meta_box(
                'hide-page-title',
                __( 'Hide page title', 'lcode' ),
                [ $this, 'custom_meta_box_html' ],
                $screen,
                'side'
            );
        }
    }

    public function custom_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, '_hide_page_title', true);

        /**
         * Uses nonce for verification
         */
        
        wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );
        ?>

        <label for="lcode-field"><?php esc_html_e( 'Hide the page title' ); ?></label>
        <select name="lcode_hide_title_field" id="lcode-field" class="postbox">
            <option value="">
                <?php esc_html_e( 'Select', 'lcode' ); ?>
            </option>
            <option value="yes" <?php selected($value, 'yes'); ?>">
                <?php esc_html_e( 'Yes', 'lcode' ); ?>
            </option>
            <option value="no" <?php selected($value, 'no'); ?>>
                <?php esc_html_e( 'No', 'lcode' ); ?>
            </option>
        </select>

        <?php


    }

    public function save_post_meta_data( $post_id ) {

        /**
         * When the post is saved or updated we get $_POST available
         * Check if the current user iss authorized
         */

        if( ! current_user_can( 'edit_post', $post_id ) ) {
            echo 'a';
        }

        if( array_key_exists( 'lcode_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST[ 'lcode_hide_title_field' ]
            );
        }
    }

}

?>