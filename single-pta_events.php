<?php
/*
 * File: single-pta_event.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

$event_date = get_post_meta( get_the_ID(), '_agpta_event_date', true);
$event_price = get_post_meta( get_the_ID(), '_agpta_event_price', true);

$event_timestamp = strtotime($event_date);

get_header();
?>
	<?php do_action( 'theme_wrapper_open' ); ?>
        <?php if ( have_posts() ) :?>
            <?php while( have_posts() ) : the_post(); ?>
                <article class="px-4 lg:px-10">

                    <!-- Page Heading -->
                    <?php get_template_part( 'partials/single-page', 'heading' ); ?>

                    <!-- Featured Image -->
                    <?php if ( has_post_thumbnail() ) :?>
                        <div class="mb-10 max-w-4xl mx-auto">
                            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded-lg shadow', 'alt' => esc_attr( get_the_title() )]); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <?php the_content(); ?>
                        <?php if( $event_date || $event_price ): ?>
                            <div class="mt-4 space-y-1">

                                <?php if ( $event_date && $event_timestamp ): ?>
                                    <p class="text-sm text-gray-700">Event Date: <strong><?php echo esc_html( date('F j, Y', $event_timestamp) ); ?></strong></p>
                                <?php endif; ?>
                                <?php if ( is_numeric( $event_price ) ): ?>
                                    <p class="text-sm text-gray-700">Event Price:
                                        <strong>
                                            <?php echo $event_price == 0 ? 'Free' : '$' . esc_html( number_format( (float) $event_price, 2 ) ); ?>
                                        </strong>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                        <?php get_template_part( 'partials/post-admin-links' ); ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php do_action( 'theme_wrapper_close' ); ?>

<?php get_footer(); ?>