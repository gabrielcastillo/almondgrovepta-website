<?php
/*
 * File: archive.php
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
            <div class="portfolio-archive">
                <h1 class="portfolio-archive-title">Our Portfolio</h1>
                <div class="portfolio-items">
					<?php
					while (have_posts()) : the_post();
						?>
                        <div class="portfolio-item">
                            <h2 class="portfolio-item-title"><?php the_title(); ?></h2>
                            <div class="portfolio-item-excerpt">
								<?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="view-more">View Project</a>
                        </div>
					<?php
					endwhile;
					?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
					<?php
					the_posts_pagination(array(
						'mid_size' => 2,
						'prev_text' => 'Previous',
						'next_text' => 'Next',
					));
					?>
                </div>
            </div>
		<?php else: ?>
			<p>No Post Found!</p>
		<?php endif; ?>
	</main>
	<aside id="sidebar" class="w-1/4 border-l p-6 hidden sm:block">
		<?php get_sidebar('primary'); ?>
	</aside>
</div>
<?php get_footer(); ?>
