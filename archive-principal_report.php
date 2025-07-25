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

        <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20 archive-posts">
			<?php if ( have_posts() ) :?>
				<?php while( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="w-full mx-auto space-y-4 <?php  post_class(); ?> px-8">
                        <div class="relative aspect-video lg:aspect-square lg:w-64 lg:shrink-0">
	                        <?php if ( has_post_thumbnail() ): ?>
                                <div class="entry-thumbnail">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr( the_title() ); ?>">
				                        <?php the_post_thumbnail('medium', ['class' => 'absolute inset-0 size-full rounded-2xl bg-gray-50 object-cover', 'alt' => esc_attr( get_the_title() ) ]); ?>
                                    </a>
                                </div>
	                        <?php else: ?>
                                <div class="entry-thumbnail">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr( the_title() ); ?>">
				                        <?php $url = 'https://www.dummyimage.com/256x400/d1d1d1/fff.jpg&text=' . get_the_date(); ?>
                                        <img src="<?php echo $url; ?>" class="absolute inset-0 size-full rounded-2xl object-cover" alt="esc_attr( the_title() ); ?>" />
                                    </a>
                                </div>
	                        <?php endif; ?>
                        </div>
                        <div class="py-10">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16" class="text-gray-500"><?php echo get_the_date(); ?></time>
                                <a href="<?php the_permalink(); ?>" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"><?php the_title(); ?></a>
                            </div>
                            <div class="group relative max-w-xl">
                                <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="absolute inset-0"></span>
					                    <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="mt-5 text-sm/6 text-gray-600"><?php the_excerpt(); ?></p>
                            </div>
                            <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                                <div class="relative flex items-center gap-x-4">
                                    <div class="text-sm/6">
                                        <p class="font-semibold text-gray-900">
                                            <a href="#" class="capitalize">
                                                <span class="text-sm font-normal">By:</span> <?php the_author(); ?>
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


