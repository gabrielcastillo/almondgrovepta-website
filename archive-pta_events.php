<?php
/*
 * File: archive-pta_events.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


?>
<?php get_header(); ?>
	<?php do_action('theme_wrapper_open'); ?>

           <?php get_template_part( 'partials/archive-page-title' ); ?>

			<div class="px-4 lg:px-10 mt-10 space-y-20 lg:mt-20 archive-posts">
				<?php if ( have_posts() ) :?>
					<?php while( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" class="relative isolate flex flex-col gap-8 lg:flex-row <?php post_class(); ?>">

                            <?php get_template_part( 'partials/archive-post','thumbnail' ); ?>

							<div class="w-full">

								<div class="flex items-center gap-x-2 text-xs">
									Posted on:<time datetime="<?php echo get_the_date( 'c' ); ?>" class="text-gray-500"><?php echo get_the_date('M d, Y'); ?></time>
								</div>

                                <div class="group relative max-w-7xl">
                                    <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="absolute inset-0"></span>
											<?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="mt-5 text-sm/6 text-gray-600">
										<?php custom_excerpt( get_the_excerpt() ); ?>
                                    </p>
                                </div>

                                <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                                    <div class="relative flex items-center gap-x-4">
                                        <div>
                                            <p class="font-semibold text-gray-600 capitalize text-sm">
                                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>">
                                                    <span class="absolute inset-0"></span>
                                                    By: <?php the_author(); ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

							</div>
						</article>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<?php do_action( 'theme_archive_pagination' ); ?>
		<?php do_action( 'theme_wrapper_close', true ); ?>
<?php get_footer(); ?>