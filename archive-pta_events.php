<?php
/*
 * File: archive-pta_events.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


?>
<?php get_header(); ?>
	<div class="flex container mx-auto border-r border-l bg-white min-h-screen">
		<main class="flex-1 py-24 pb-0">

            <!-- Page Title -->
			<div class="w-full mx-auto space-y-4 text-center">
				<p class="text-xs font-semibold tracking-wider uppercase">Almond Grove PTA</p>
				<h1 class="text-4xl font-bold leading-tight md:text-4xl">
					<?php
					if ( is_category() ) {
						single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif ( is_author() ) {
						the_author();
					} elseif ( is_date() ) {
						echo get_the_date();
					} elseif ( is_post_type_archive() ) {
						post_type_archive_title();
					} else {
						_e( "Archive", get_text_domain() );
					}
					?>
				</h1>

			</div>

			<div class="px-10 mt-16 space-y-20 lg:mt-20 archive-posts">
				<?php if ( have_posts() ) :?>
					<?php while( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" class="relative isolate flex flex-col gap-8 lg:flex-row <?php post_class(); ?>">
							<?php get_template_part( 'partials/archive-post','thumbnail' ); ?>
							<div>

								<div class="flex items-center gap-x-4 text-xs">
									<time datetime="<?php echo get_the_date( 'c' ); ?>" class="text-gray-500"><?php echo get_the_date('M d, Y'); ?></time>
								</div>

                                <div class="group relative max-w-xl">
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
				<?php else: ?>
					<p>No Reports Found!</p>
				<?php endif; ?>
			</div>
			<div class="pagination">
				<?php the_posts_navigation([
					'mid_size' => 2,
					'prev_text' => __('Prev', get_text_domain() ),
					'next_text' => __('Next', get_text_domain() ),
					'screen_reader_text' => __('Posts navigation', get_text_domain() )
				]); ?>
			</div>
		</main>
		<aside class="bg-white w-full md:w-1/4 hidden lg:block">
			<div class="py-24 flex justify-center border-l">
				<?php get_sidebar('primary'); ?>
			</div>
		</aside>
	</div>
<?php get_footer(); ?>