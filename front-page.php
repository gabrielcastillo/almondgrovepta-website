<?php
/*
 * File: front-page.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */
?>

<?php get_header(); ?>
<?php get_template_part( 'partials/hero', 'template' ); ?>
	<div class="bg-white container mx-auto border-l border-r">

		<main class="isolate">
			<!-- Hero section -->
			<?php get_template_part( 'partials/our-mission' ); ?>

		</main>

	</div>
<?php
get_footer();
