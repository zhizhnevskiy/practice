<?php
/**
 * The main template file
 * This is the most generic template file in this theme.
 * It is used to display a page when nothing more specific matches a query.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

    <main>

        <section class="content-area content-thin">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="article-loop">
                    <header>
                        <h3><a href="<?php the_permalink(); ?>"
                               title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                        Author: <?php the_author(); ?>
                    </header>
                    <?php the_excerpt(); ?>
                </article>

            <?php endwhile; else : ?>

                <article>
                    <p>Sorry, no entries were found!</p>
                </article>

            <?php endif; ?>

        </section>

        <?php get_sidebar(); ?>

    </main>

<?php get_footer();