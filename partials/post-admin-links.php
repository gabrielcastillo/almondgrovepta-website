<?php
/*
 * File: post-admin-links.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


if ( !current_user_can( 'edit_posts', $post->id ) ) {
    return;
}
?>

<div class="py-4 uppercase underline">
	<?php edit_post_link(); ?>
</div>



