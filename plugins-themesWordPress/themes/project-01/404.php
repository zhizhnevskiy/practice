<?php
/**
 * The template for displaying 404 pages (not found).
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header(); ?>

<div class="main-heading">
    <h1><?php the_title(); ?></h1>
</div>

<section>
    <p><?php echo __('It looks like nothing was found at this location.', 'whitesquare'); ?></p>
</section>

<?php get_footer(); ?>