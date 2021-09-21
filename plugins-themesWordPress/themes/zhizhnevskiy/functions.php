<?php
/**
 * The functions for Zhizhnevskiy Theme
 */

// add menu
add_theme_support( 'menus' );

// add sidebar
add_action( 'init', 'devise_widgets_init' );

function devise_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar Zhizhnevskiy', 'devise' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}

// add My Custom Menu
function wpb_custom_new_menu() {
	register_nav_menus(
		array(
			'my-custom-menu' => __( 'My Custom Menu' ),
			'extra-menu' => __( 'Extra Menu' )
		)
	);
}
add_action( 'init', 'wpb_custom_new_menu' );