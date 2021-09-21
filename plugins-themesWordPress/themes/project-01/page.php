<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>

    <div class="div_page">

        <section>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article>
                    <?php the_content(); ?>
                </article>

            <?php endwhile; else : ?>

                <article>
                    <p>Sorry, no entries were found!</p>
                </article>

            <?php endif; ?>

        </section>

    </div>

<?php get_footer();