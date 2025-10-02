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
	<div class="bg-white px-6 lg:px-8">
		<div class="mx-auto max-w-5xl text-base/7 text-gray-700">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article class="px-4 lg:px-10">

						<?php get_template_part( 'partials/single-page', 'heading' ); ?>

						<!-- Featured Image -->
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="mb-10 max-w-4xl mx-auto">
								<?php
								the_post_thumbnail(
									'full',
									array(
										'class' => 'w-full h-auto rounded-lg shadow',
										'alt'   => esc_attr( get_the_title() ),
									)
								);
								?>
							</div>
						<?php endif; ?>

						<div class="post-content">
							<?php the_content(); ?>
						</div>

						<?php get_template_part( 'partials/post-admin-links' ); ?>

					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php do_action( 'theme_wrapper_close', true ); ?>
<?php get_footer(); ?>