<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>

    <div class="div_page">

        <section >

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article >
                    <header>
                        <h2><?php the_title(); ?></h2>
                        Author: <?php the_author(); ?>
                    </header>
                    <?php the_content(); ?>
                    <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </article>

            <?php endwhile; else : ?>

                <article>
                    <p>Sorry, no entries were found!</p>
                </article>

            <?php endif; ?>

        </section>

    </div>

<?php get_footer();