<?php
/*
 * File: functions.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

define('THEME_VERSION', '1.0.0');
define('TEMPLATE_DIR', get_template_directory() );

require_once TEMPLATE_DIR . '/inc/AGPTA_Nav_Menu_Builder.php';

register_nav_menu('primary','Primary Menu');
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array('height' => 480, 'width' => 720) );

//add_image_size( 'event-gallery-thumbnail', 269, 196);
//add_image_size('banner-image', 176, 256);

add_action( 'wp_enqueue_scripts', 'agpta_load_scripts' );




/**
 * Functions
 */

/*
 * Load header and footer scripts
 */
function agpta_load_scripts() {
	if (strpos($_SERVER['HTTP_HOST'], '.test') > 0 ) {
		wp_enqueue_style('tdsp-tailwind', get_template_directory_uri() . '/css/theme.css', array(), THEME_VERSION);
		wp_enqueue_script( 'tdsp-tailwind', get_template_directory_uri() . '/src/js/theme.js', array('jquery'), THEME_VERSION, true );
	} else {
		wp_enqueue_style('tdsp-tailwind', get_template_directory_uri() . '/css/all.min.css', array(), THEME_VERSION);
		wp_enqueue_script( 'tdsp-tailwind', get_template_directory_uri() . '/js/all.min.js', array('jquery'), THEME_VERSION, true );
	}
}

/**
 * Debugger
 *
 * Print R of value.
 *
 * @param $value
 * @param  bool  $end
 *
 * @return void
 */
function dd( $value, bool $end = true )
{
	echo '<pre>';
	echo print_r($value, true);
	echo '</pre>';

	if ( $end ) {
		exit;
	}
}

