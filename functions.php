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
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

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



function agpta_get_posts() {

	$html = '';

	$args = array(
		'numberposts' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$posts = get_posts( $args );

	if ( $posts ) {
		foreach( $posts as $post ) {
			$html .= '<article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">';
			if ( has_post_thumbnail( $post->ID ) ) {
				$html .= '<img src="'. get_the_post_thumbnail_url( $post->ID ) .'" alt="" class="absolute inset-0 -z-10 size-full object-cover">';
			} else {
				$html .= '<img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="" class="absolute inset-0 -z-10 size-full object-cover">';
			}

			$html .= '<div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>';
			$html .= '<div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>';
			$html .= '<div class="flex flex-wrap justify-between items-center gap-y-1 overflow-hidden text-sm/6 text-gray-300">';
				$html .= '<time datetime="2020-03-16" class="mr-8">'. gmdate( 'M d, Y', strtotime($post->post_date_gmt) ).'</time>';
				$html .= '<div class="-ml-4 flex items-center gap-x-4">';;
					$html .= '<img src="'. get_avatar_url( $post->post_author ) .'" alt="" class="size-6 flex-none rounded-full bg-white/10">';
					$html .= get_the_author_meta( 'nicename', $post->post_author);
				$html .= '</div>';
			$html .= '</div>';
			$html .= '<h3 class="mt-3 text-lg/6 font-semibold text-white">';
			$html .= '<a href="'. get_permalink( $post->ID ) .'">';
			$html .= '<span class="absolute inset-0"></span>';
			$html .= $post->post_title;
			$html .= '</a>';
			$html .= '</h3>';
			$html .= '</article>';
		}
	}
	echo $html;
}

/**
 * @return void
 */
function agpta_get_team_member() {
	global $wpdb;
	$html = '';
	$tablename = $wpdb->prefix . 'agpta_team';

	$results = $wpdb->get_results( "SELECT * FROM $tablename" );

	foreach ( $results as $member ) {
		$html .= '<li>';
		$html .= '<img class="mx-auto size-24 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">';
		$html .= '<h3 class="mt-6 text-base/7 font-semibold tracking-tight text-gray-900">'. $member->member_name .'</h3>';
		$html .= '<p class="text-sm/6 text-gray-600">'. $member->member_role .'</p>';
		$html .= '</li>';
	}
	echo $html;
}