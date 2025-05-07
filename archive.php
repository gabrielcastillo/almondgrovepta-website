<?php
/*
 * File: single.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

?>
<?php get_header(); ?>
    <div class="flex container mx-auto border-r border-l bg-white min-h-screen">
        <main class="flex-1 py-24 pb-0">
            <div class="md:hidden flex items-center mb-4">
                <button onclick="toggleSidebar()" class="text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
			<?php if ( have_posts() ) :?>
				<?php while( have_posts() ) : the_post(); ?>
                    <article>
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
                        <div class="post-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
							<?php edit_post_link(); ?>
                        </div>
                        <div class="max-w-md mx-auto mt-10">
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <div class="flex justify-between items-center mb-4">
                                    <button class="text-gray-500 hover:text-gray-800">&larr;</button>
                                    <h2 class="text-lg font-semibold">May 2025</h2>
                                    <button class="text-gray-500 hover:text-gray-800">&rarr;</button>
                                </div>

                                <div class="grid grid-cols-7 text-sm text-center font-medium text-gray-600 mb-2">
                                    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                                </div>

                                <div class="grid grid-cols-7 text-center text-sm gap-1">
                                    <!-- Empty cells for padding -->
                                    <div></div><div></div><div></div><div></div>
                                    <!-- Calendar dates -->
                                    <div class="p-2 rounded hover:bg-gray-200 cursor-pointer">1</div>
                                    <div class="p-2 rounded hover:bg-gray-200 cursor-pointer">2</div>
                                    <div class="p-2 rounded hover:bg-gray-200 cursor-pointer">3</div>
                                    <!-- More days... -->
                                </div>
                            </div>
                        </div>
                    </article>
				<?php endwhile; ?>
			<?php else: ?>
                <p>No Post Found!</p>
			<?php endif; ?>
        </main>
        <aside id="sidebar" class="w-1/4 border-l p-0 hidden sm:block">
            <div class="py-24 flex justify-center">
				<?php get_sidebar('primary'); ?>
            </div>
        </aside>
    </div>
<?php get_footer(); ?>