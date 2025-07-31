<?php
/*
 * File: single-page-heading.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


?>

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
