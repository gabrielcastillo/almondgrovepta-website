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
			<?php if ( have_posts() ) :?>
				<?php while( have_posts() ) : the_post(); ?>
					<article>
						<div class="w-full mx-auto space-y-4 text-center">
							<p class="text-xs font-semibold tracking-wider uppercase">Almond Grove PTA</p>
							<h1 class="text-4xl font-bold leading-tight md:text-4xl"><?php the_title(); ?></h1>
							<p class="text-sm dark:text-gray-600">by
								<a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-600">
									<span itemprop="name"><?php the_author(); ?></span>
								</a>on
								<time datetime="<?php the_date(); ?>"><?php echo get_the_date(); ?></time>
							</p>
						</div>
						<div class="post-constent">
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
		<?php get_template_part('partials/primary', 'sidebar'); ?>
	</div>
<?php get_footer(); ?>