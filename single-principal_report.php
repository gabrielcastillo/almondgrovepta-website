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
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
                <article class="px-10">
                    <div class="w-full mx-auto space-y-4 text-center pb-20">
                        <p class="text-xs font-semibold tracking-wider uppercase">Almond Grove PTA</p>
                        <h1 class="text-4xl font-bold leading-tight md:text-4xl"><?php the_title(); ?></h1>
                        <p class="text-sm dark:text-gray-600">By
                            <a rel="noopener noreferrer" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>" target="_blank" class="underline capitalize">
                                <span itemprop="name"><?php the_author(); ?></span>
                            </a>on
                            <time datetime="<?php the_date(); ?>"><?php echo get_the_date(); ?></time>
                        </p>
                    </div>

                    <!-- Featured Image -->
					<?php if ( has_post_thumbnail() ) :?>
                        <div class="mb-10 max-w-4xl mx-auto">
							<?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded-lg shadow']); ?>
                        </div>
					<?php endif; ?>

                    <div class="post-content">
						<?php the_content(); ?>
                    </div>

                    <!-- Categories -->
					<?php $categories = get_the_category(); ?>
					<?php if ( $categories ) :?>
                        <p class="text-sm text-gray-600 space-x-2">
							<?php foreach ( $categories as $category ) :?>
                                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="inline-block px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs hover:bg-gray-200">
									<?php echo esc_html( $category->name ); ?>
                                </a>
							<?php endforeach; ?>
                        </p>
					<?php endif; ?>
					<?php get_template_part( 'partials/post-admin-links' ); ?>
                </article>
			<?php endwhile; ?>
		<?php else: ?>
            <p>No Post Found!</p>
		<?php endif; ?>
    </main>
	<?php get_template_part( 'partials/primary', 'sidebar' ); ?>
</div>
<?php get_footer(); ?>
