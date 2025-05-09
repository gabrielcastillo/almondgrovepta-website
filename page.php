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
    <main class="flex-1 p-6">
        <div class="md:hidden flex items-center mb-4">
            <button onclick="toggleSidebar()" class="text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
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
                    <div class="post-content w-full md:px-20">
                        <?php the_content(); ?>
                        <?php wp_link_pages(); ?>
                        <?php edit_post_link(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No Post Found!</p>
        <?php endif; ?>
<!--        <article class="bg-white p-6 rounded shadow mb-6">-->
<!--            <h2 class="text-2xl font-bold mb-2">Post Title</h2>-->
<!--            <p class="text-gray-600 mb-4">By Author: Gabriel | Date: </p>-->
<!--            <p class="text-gray-800">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus cumque eos explicabo id in? Adipisci architecto commodi, dolore hic inventore iure modi molestias rerum unde voluptas! Beatae, explicabo, nisi.</p>-->
<!--        </article>-->
    </main>
    <aside class="bg-white w-full md:w-1/4 border-r hidden lg:block">
        <div class="py-24 flex justify-center">
            <?php get_sidebar('primary'); ?>
        </div>
    </aside>
</div>
<?php get_footer(); ?>


