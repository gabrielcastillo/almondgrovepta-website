<?php
/*
 * File: archive-principal-reports.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

?>

<?php get_header(); ?>

<div class="flex container mx-auto border-r border-l bg-white min-h-screen">
    <main class="flex-1 py-24 pb-0">
        <div class="w-full mx-auto space-y-4 text-center">
            <p class="text-xs font-semibold tracking-wider uppercase">Almond Grove PTA</p>
            <h1 class="text-4xl font-bold leading-tight md:text-4xl">
                <?php
                post_type_archive_title();
                ?>
            </h1>
        </div>

        <div class="px-10 mt-16 space-y-20 lg:mt-20 lg:space-y-20 archive-posts">
			<?php if ( have_posts() ) :?>
				<?php while( have_posts() ) : the_post(); ?>

                    <article class="relative isolate flex flex-col gap-8 lg:flex-row">
                        <div class="relative aspect-video sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
	                        <?php if ( has_post_thumbnail() ) :?>
                                <div class="mb-10 max-w-4xl mx-auto">
			                        <?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded-lg']); ?>
                                </div>
	                        <?php endif; ?>
                        </div>
                        <div>
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="<?php the_date(); ?>" class="text-gray-500"><?php echo get_the_date(); ?></time>
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
                                    <div class="text-sm/6">
                                        <p class="font-semibold text-gray-900 capitalize">
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
            <?php the_posts_navigation(); ?>
        </div>
    </main>
	<?php get_template_part('partials/primary', 'sidebar'); ?>
</div>
<?php get_footer(); ?>


