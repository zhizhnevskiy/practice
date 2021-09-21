<?php
/**
 * Plugin Name: Test 02 Gutenberg
 * Author: Zhizhnevskiy
 * Version: 1.0.0
 */

function riad_enqueue_blocks() {
    wp_enqueue_script(
        'riad-block',
        plugins_url( 'test-block-02.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );
}

add_action( 'enqueue_block_editor_assets', 'riad_enqueue_blocks' );

function riad_enqueue_styles() {
    wp_enqueue_style(
        'riad-block-style',
        plugins_url( 'test-block-02.scss', __FILE__ ),
        array( ),
        filemtime( plugin_dir_path( __FILE__ ) . 'test-block-02.scss' )
    );
}
add_action( 'enqueue_block_assets', 'riad_enqueue_styles' );