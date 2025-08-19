<?php
/*
 * File: event-calendar.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_event_calendar_assets' );
add_shortcode( 'agpta_event_calendar', 'render_event_calendar_shortcode' );
add_action( 'wp_ajax_agpta_get_calendar_events', 'agpta_get_calendar_events_ajax' );
add_action( 'wp_ajax_nopriv_agpta_get_calendar_events', 'agpta_get_calendar_events_ajax' );

/**
 * Load assets for event calendar
 *
 * @return void
 */
function enqueue_event_calendar_assets() {
	wp_enqueue_script( 'fullcalendar-js', 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js', array( 'jquery' ), '6.1.19', true );
}

/**
 * Display event calendar. Using Shortcode
 *
 * @return false|string
 */
function render_event_calendar_shortcode() {
	ob_start();
	?>
	<div id="agpta-event-calendar"></div>
	<?php
	return ob_get_clean();
}

/**
 * Get events via AJAX request.
 *
 * @return void
 */
function agpta_get_calendar_events_ajax() {
	$start = isset( $_POST['start'] ) ? $_POST['start'] : '';
	$end   = isset( $_POST['end'] ) ? $_POST['end'] : '';

	if ( ! $start || ! $end ) {
		wp_send_json_error( 'Invalid date range.' );
	}

	$args = array(
		'post_type'      => 'pta_events',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_query'     => array(
			array(
				'key'     => '_agpta_event_date',
				'value'   => array( $start, $end ),
				'compare' => 'BETWEEN',
				'type'    => 'DATETIME',
			),
		),
		'orderby'        => 'meta_value',
		'meta_key'       => '_agpta_event_date',
		'order'          => 'ASC',
	);

	$query      = new WP_Query( $args );
	$event_data = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			$event_date = get_post_meta( get_the_ID(), '_agpta_event_date', true );
			if ( ! $event_date ) {
				continue;
			}

			$event_data[] = array(
				'title'       => get_the_title(),
				'start'       => $event_date,
				'url'         => get_permalink(),
				'description' => get_post_meta( get_the_ID(), '_agpta_event_price', true ),
				'status'      => get_post_meta( get_the_ID(), '_agpta_event_status', true ),
			);
		}
	}
	wp_reset_postdata();

	wp_send_json( $event_data );
}



