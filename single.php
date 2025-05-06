<?php
/*
 * File: single.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

?>
<?php get_header(); ?>
	<div class="flex container px-6 py-24 mx-auto space-y-12 border-r border-l">
		<main class="flex-1 p-8 pb-0">
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
								<time datetime="<?php the_date(); ?>"><?php the_date(); ?></time>
							</p>
						</div>
						<div class="post-content">
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
		<aside id="sidebar" class="w-1/4 border-l p-6 hidden sm:block">
			<?php get_sidebar('primary'); ?>
		</aside>
	</div>
<?php get_footer(); ?>