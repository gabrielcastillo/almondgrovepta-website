<?php
/*
 * File: single-pta_event.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


$event_date = get_post_meta( get_the_ID(), '_agpta_event_date', true);
$event_price = get_post_meta( get_the_ID(), '_agpta_event_price', true);

get_header();
?>
	<div class="flex container mx-auto border-r border-l bg-white min-h-screen">
		<main class="flex-1 py-12 pb-0">
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
							<h1 class="text-4xl font-bold leading-tight md:text-4xl"><?php the_title(); ?></h1>
							<p class="text-sm dark:text-gray-600">by
								<a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-600">
									<span itemprop="name"><?php the_author(); ?></span>
								</a>on
								<time datetime="<?php esc_attr( get_the_date() ); ?>"><?php echo get_the_date(); ?></time>
							</p>
						</div>
						<div class="post-content">

                            <?php if( has_post_thumbnail() ): ?>
                            <div class="my-6 max-w-3xl mx-auto">
                                <?php the_post_thumbnail( 'large', ['class' => 'w-full h-auto rounded shadow']); ?>
                            </div>
                            <?php endif; ?>

							<?php the_content(); ?>

                            <?php if( $event_date || $event_price ): ?>
                            <div class="mt-4 space-y-1">
                                <?php if ( $event_date ): ?>
                                <p class="text-sm= text-gray-700">Event Date: <strong><?php echo esc_html( date('F j, Y', strtotime( $event_date)) ); ?></strong></p>
                                <?php endif; ?>
	                            <?php if ( $event_date ): ?>
                                    <p class="text-sm= text-gray-700">Event Price: <strong>$<?php echo esc_html( number_format( (float) $event_price, 2 ) ); ?></strong></p>
	                            <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <a href="/register-for-event/?event_id=<?php echo get_the_ID(); ?>" class="inline-block mt-6 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Add to Cart
                            </a>


                            <div id="event-products" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>




                            <?php wp_link_pages(); ?>
                            <?php if ( is_user_logged_in() ): ?>
                            <div class="mt-10 border-t">
	                            <?php edit_post_link(); ?>
                            </div>
                            <?php endif; ?>
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