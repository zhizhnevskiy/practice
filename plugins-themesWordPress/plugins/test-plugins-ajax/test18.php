<?php
/**
 * Plugin Name: Test 18
 * Description: Safety Test AJAX!
 * Author: Zhizhnevskiy
 **/

add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {

	// add js and css
	wp_enqueue_script( 'sweetalert', plugins_url( 'assets/sweetalert.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_style( 'sweetalert', plugins_url( 'assets/sweetalert.css', __FILE__ ) );

	wp_enqueue_script( 'custom', plugins_url( 'assets/custom.js', __FILE__ ), array( 'jquery', 'sweetalert' ) );

	wp_localize_script( 'custom', 'myPlugin', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'nonce-for-lesson' )
	) );
}