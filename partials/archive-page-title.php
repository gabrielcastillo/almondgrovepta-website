<?php
/*
 * File: archive-page-title.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */
?>

<!-- Archive Page Title -->
<div class="w-full mx-auto space-y-4 text-center">
	<p class="text-xs font-semibold tracking-wider uppercase">Almond Grove PTA</p>
	<h1 class="text-4xl font-bold leading-tight md:text-4xl">
		<?php
		if ( is_category() ) {
			single_cat_title();
		} elseif ( is_tag() ) {
			single_tag_title();
		} elseif ( is_author() ) {
			the_author();
		} elseif ( is_date() ) {
			echo get_the_date();
		} elseif ( is_post_type_archive() ) {
			post_type_archive_title();
		} else {
			_e( "Archive", get_text_domain() );
		}
		?>
	</h1>
</div>


