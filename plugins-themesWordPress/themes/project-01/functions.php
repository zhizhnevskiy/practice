<?php
/**
 * Functions and definitions
 */

// This function queues the Normalize.css file for use
// The first parameter is the name of the stylesheet, the second is the URL
// Here we are using the online version of the css file

function add_normalize_CSS()
{
    wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

// add styles
add_action('wp_enqueue_scripts', 'enqueue_styles');
function enqueue_styles()
{
    wp_enqueue_style('whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
    wp_enqueue_style('font-style');
}

// add scripts
add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_scripts()
{
    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
    wp_enqueue_script('html5-shim');
}

// add menus
add_theme_support('menus');

// Registering Menu Display Areas
add_action('init', 'add_Main_Nav');

function add_Main_Nav()
{
    register_nav_menus(
        array( // id area => area name
            'header_menu' => 'Header menu',
            'page_menu' => 'Page menu'
        )
    );
}

// add sidebar
add_action('widgets_init', 'add_widget_Support');

function add_widget_Support()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

//add template
add_filter('template_include', 'my_template');

function my_template($template)
{

    if (is_page('etusivu')) {
        if ($new_template = locate_template(array('/template-parts/page/page-etusivu.php')))
            return $new_template;
    }

    return $template;

}