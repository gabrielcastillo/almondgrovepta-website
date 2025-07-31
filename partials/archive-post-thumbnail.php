<?php
/*
 * File: archive-post-thumbnail.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


?>

<div class="relative aspect-video sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
	<?php if ( has_post_thumbnail() ) :?>
		<div class="mb-10 max-w-4xl mx-auto">
			<?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded-lg']); ?>
		</div>
	<?php else :?>
		<div class="mb-10 max-w-4xl mx-auto">
			<?php the_post_thumbnail('full', ['class' => 'w-full h-auto rounded-lg']); ?>
			<img src="<?php echo esc_url( get_templatE_directory_uri() . '/images/ag-pta-logo.jpg' ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-auto rouned-lg" />
		</div>
	<?php endif; ?>
</div>
