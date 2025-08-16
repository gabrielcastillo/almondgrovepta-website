<?php
/*
 * File: single.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

?>
<?php get_header(); ?>
    <?php do_action( 'theme_wrapper_open' ); ?>
        <?php if ( have_posts() ) :?>
            <?php while( have_posts() ) : the_post(); ?>
                <article class="px-4 lg:px-10">

                    <!-- Page Heading -->
                    <?php get_template_part( 'partials/single-page', 'heading' ); ?>

                    <!-- Featured Image -->
                    <?php if ( has_post_thumbnail() ) :?>
                        <div class="mb-10 max-w-4xl mx-auto">
                            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded-lg shadow', 'alt' => esc_attr( get_the_title() )]); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <?php get_template_part( 'partials/post-admin-links' ); ?>

                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php do_action( 'theme_wrapper_close' ); ?>
<?php get_footer(); ?>