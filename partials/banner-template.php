<?php
/**
 * File: banner-template.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 **/

$options = get_option( 'agpta_settings', array() );

$content    = $options['top_banner_content'];
$has_banner = isset( $options['enable_banner'] );
?>
<?php if ( $has_banner ) : ?>
<div id="topbar" class="items-center gap-x-6 bg-gray-900 px-6 py-2.5 sm:px-3.5 text-white text-center text-sm/6">
	<?php echo $content; ?>
</div>
<?php endif; ?>