<?php
/*
 * File: single.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

?>
<?php get_header(); ?>

<div class="flex flex-col md:flex-row min-h-screen">
    <main class="flex-1 p-0 md:p-6">
        <?php if ( have_posts() ) :?>
            <?php while( have_posts() ) : the_post(); ?>
                <article class="pb-20 container max-w-7xl mx-auto">
                    <div class="w-full mx-auto space-y-4 text-center">
                        <p class="text-xs font-semibold tracking-wider uppercase">Almond Grove PTA</p>
                        <h1 class="text-4xl font-bold leading-tight md:text-5xl"><?php the_title(); ?></h1>
                        <p class="text-sm dark:text-gray-600">by
                            <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-600">
                                <span itemprop="name"><?php the_author(); ?></span>
                            </a>on
                            <time datetime="<?php the_date(); ?>"><?php echo get_the_date(); ?></time>
                        </p>
                    </div>
                    <div class="post-content w-full p-0 lg:px-20">
                        <?php the_content(); ?>
                        <?php wp_link_pages(); ?>
                        <?php edit_post_link(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No Post Found!</p>
        <?php endif; ?>
    </main>
    <aside class="bg-white w-full md:w-1/4 border-r hidden lg:block">
        <div class="py-24 flex justify-center">
            <?php get_sidebar('primary'); ?>
        </div>
    </aside>
</div>
<?php get_footer(); ?>


