<?php
/*
 * File: header.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

$banner = ( is_front_page() ) ? true : false;

?>
<!DOCTYPE html>
<html class="h-full">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>?v=<?php echo time(); ?>" type="text/css" />
	<?php wp_head(); ?>
</head>
<body class="h-full bg-gray-100 font-sans">

<?php if( $banner ) :?>
	<?php get_template_part('partials/banner', 'template'); ?>
<?php endif; ?>
<?php get_template_part( 'partials/navbar' ); ?>

<div class="container mx-auto">

