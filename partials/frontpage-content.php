<?php
/*
 * File: frontpage-content.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


?>
<div id="fontpage">
<div class="flex flex-col lg:flex-row gap-6">
	<!-- content -->
	<div class="w-full lg:w-2/3">
		<div class="bg-white p-8 border-b sm:border-0">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php the_content(); ?>
					<?php
			endwhile;
endif;
			?>
		</div>
	</div>

	<!-- content -->
 
	<!-- sidebar -->
	<div class="w-full lg:w-1/3 border-l">
		<div class="p-6">
		<?php dynamic_sidebar( 'homepage-sidebar' ); ?>
		</div>
	</div>
	<!-- sidebar -->

</div>
</div>