<?php
/**
 * Plugin Name: CRS Plugin №01
 * Author: Innowise Group
 * Version: 1.0
 */

function loadMyBlock() {
    wp_enqueue_script(
        'my-new-block',
        plugins_url( 'crs-plugin-01.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' ),
        true
    );
}

add_action('enqueue_block_editor_assets', 'loadMyBlock');