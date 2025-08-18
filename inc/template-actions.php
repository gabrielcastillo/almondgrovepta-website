<?php
/*
 * File: template-actions.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

add_action( 'theme_wrapper_open', 'agpta_content_page_wrapper_open' );
add_action( 'theme_archive_pagination', 'agpta_custom_archive_pagination' );
add_action( 'theme_wrapper_close', 'agpta_content_page_wrapper_close' );

/**
 * Content Open code.
 *
 * @return void
 */
function agpta_content_page_wrapper_open() {
	?>

	<div class="flex container mx-auto border-r border-l bg-white min-h-screen">
		<main class="flex-1 py-12 lg:py-16 pb-0">

	<?php
}

/**
 * Content Wrapper Closing HTML
 * This contains sidebar template part.
 * Sidebar login has the ability to detect if
 * sidebar widgets are active.
 *
 * @param $sidebar bool True | False, to show sidebar.
 *
 * @return void
 */
function agpta_content_page_wrapper_close( $sidebar = true ) {
	?>

	</main>
		<?php if ( $sidebar ) : ?>
			<?php get_template_part( 'partials/primary', 'sidebar' ); ?>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Custom Archive Page Pagination
 * @return void
 */
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