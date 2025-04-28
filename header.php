<!DOCTYPE html>
<html class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>?v=<?php echo time(); ?>" type="text/css" />
	<?php wp_head(); ?>
</head>
<body class="h-full">
    <?php get_template_part('partials/banner', 'template'); ?>
    <?php get_template_part( 'partials/navbar' ); ?>
    <?php get_template_part( 'partials/hero', 'template' ); ?>

