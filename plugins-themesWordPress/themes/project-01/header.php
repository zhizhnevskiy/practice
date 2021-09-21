<?php
/**
 * The header.
 * This is the template that displays all of the <head> section and everything up until main.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> >

<head>

    <title>
        <?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
    </title>

    <meta http-equiv="Content-type" content="text/html">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

</head>

<body class="my-body">

<header class="my-logo">

    <section class="translate">
        <?php echo do_shortcode('[weglot_switcher]'); ?>
    </section>

    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img class="header_img" src="/wp-content/themes/project-01/assets/images/CRS%20logo.png" alt="logo">
    </a>

    <nav id="nav1">

        <?php // add head menu
        wp_nav_menu(array(
            'theme_location' => 'header_menu',
            'container' => false,
            'depth' => '1',
            'echo' => '1'
        )); ?>
    </nav>

</header>