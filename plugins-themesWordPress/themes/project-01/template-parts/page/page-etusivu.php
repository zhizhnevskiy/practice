<?php
/*
Template Post Type: post, page,
Template Post Type: page
*/

get_header();

?>

    <div class="div_page">

        <nav id="nav2">
            <?php // add head menu
            wp_nav_menu(array(
                'theme_location' => 'page_menu',
                'container' => false,
                'depth' => '1',
                'echo' => '1'
            )); ?>
        </nav>

        <h1 class="h1_page">Laboratoriopalvelut<br>
            eri toimialoilla
        </h1>

        <span class="h4_page">Tutustu laboratoriopalveluihimme</span>

    </div>

<?php get_footer();