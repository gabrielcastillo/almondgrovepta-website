<?php
/*
 * File: template-actions.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

add_action( 'theme_wrapper_open', 'agpta_content_page_wrapper_open' );
function agpta_content_page_wrapper_open() {
	?>

	<div class="flex container mx-auto border-r border-l bg-white min-h-screen">
		<main class="flex-1 py-12 lg:py-16 pb-0">

	<?php
}

add_action( 'theme_wrapper_close', 'agpta_content_page_wrapper_close' );
function agpta_content_page_wrapper_close( $sidebar = true ) {
	?>

	</main>
		<?php if ( $sidebar ) : ?>
			<?php get_template_part( 'partials/primary', 'sidebar' ); ?>
		<?php endif; ?>
	</div>
	<?php
}

add_action( 'theme_archive_pagination', 'agpta_custom_archive_pagination' );
function agpta_custom_archive_pagination() {
	?>
	<div class="pagination">
		<?php
		the_posts_navigation(
			array(
				'mid_size'           => 2,
				'prev_text'          => __( 'Prev', get_text_domain() ),
				'next_text'          => __( 'Next', get_text_domain() ),
				'screen_reader_text' => __( 'Posts navigation', get_text_domain() ),
			)
		);
		?>
	</div>
	<?php
}