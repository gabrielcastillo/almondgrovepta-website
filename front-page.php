<?php
/*
 * File: front-page.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */
?>

<?php get_header(); ?>
<div class="border-r border-l">
	<?php get_template_part( 'partials/hero', 'template' ); ?>
	<div class="bg-white container mx-auto">

		<main class="isolate">
			<!-- Hero section -->
			<?php get_template_part( 'partials/our-mission' ); ?>
			<?php get_template_part( 'partials/frontpage-content' ); ?>
		</main>

	</div>
</div>
<?php get_footer(); ?>
