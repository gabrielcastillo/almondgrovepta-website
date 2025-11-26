<?php
	/*
	 * File: event-calendar.php
	 *
	 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
	 * Copyright (c) 2025.
	 */

	add_action( 'wp_enqueue_scripts', 'enqueue_event_calendar_assets' );
	add_shortcode( 'agpta_event_calendar', 'render_event_calendar_shortcode' );
	add_action( 'wp_ajax_agpta_get_calendar_events', 'agpta_get_calendar_data_ajax' );
	add_action( 'wp_ajax_nopriv_agpta_get_calendar_events', 'agpta_get_calendar_data_ajax' );

	/**
	 * Load assets for event calendar
	 *
	 * @return void
	 */
function enqueue_event_calendar_assets() {
	wp_enqueue_script(
		'fullcalendar-js',
		'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js',
		array( 'jquery' ),
		'6.1.19',
		true
	);
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
	 * @return array|string
	 */
function agpta_get_calendar_events( $start_date, $end_date ): array|string {
	$start = wp_unslash( $start_date );
	$end   = wp_unslash( $end_date );

	if ( ! $start || ! $end ) {
		return 'Invalid date range.';
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

			$start_iso = gmdate( 'Y-m-d H:i:s', strtotime( $event_date ) );

			$event_data[] = array(
				'title'       => get_the_title(),
				'start'       => $start_iso,
				'end'         => $start_iso,
				'url'         => get_permalink(),
				'description' => get_post_meta( get_the_ID(), '_agpta_event_price', true ),
				'status'      => get_post_meta( get_the_ID(), '_agpta_event_status', true ),
				'color'       => 'red',
                'category'    => 'event',
			);
		}
	}
	wp_reset_postdata();

	return $event_data;
}

	/**
	 * Calendar Data Query
	 *
	 * @param $start_date
	 * @param $end_date
	 *
	 * @return array|string
	 */
function agpta_get_calendar_data( $start_date, $end_date ): array|string {
	$start = wp_unslash( $start_date );
	$end   = wp_unslash( $end_date );

	if ( ! $start || ! $end ) {
		return 'Invalid date range.';
	}

	$args = array(
		'post_type'      => 'agpta_calendar',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_query'     => array(
			array(
				'key'     => '_agpta_calendar_date',
				'value'   => array( $start, $end ),
				'compare' => 'BETWEEN',
				'type'    => 'DATETIME',
			),
		),
		'orderby'        => 'meta_value',
		'meta_key'       => '_agpta_calendar_date',
		'order'          => 'ASC',
	);

	$query      = new WP_Query( $args );
	$event_data = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			$start_date = get_post_meta( get_the_ID(), '_agpta_calendar_date', true );
			if ( ! $start_date ) {
				continue;
			}

			$end_date = get_post_meta( get_the_ID(), '_agpta_calendar_end_date', true );

			if ( empty( $end_date ) ) {
				$end_date = $start_date;
			}

			$start_iso = gmdate( 'Y-m-d H:i:s', strtotime( $start_date ) );
			$end_iso   = gmdate( 'Y-m-d H:i:s', strtotime( $end_date ) );

			$event_data[] = array(
				'title'       => get_the_title(),
				'start'       => $start_iso,
				'end'         => $end_iso,
				'url'         => get_permalink(),
				'description' => '',
				'status'      => get_post_meta( get_the_ID(), '_agpta_calendar_status', true ),
				'color'       => 'blue',
                'category'    => 'calendar',
			);
		}
	}
	wp_reset_postdata();

	return $event_data;
}


	/**
	 * Calendar Data Ajax Call
	 *
	 * @return void
	 */
function agpta_get_calendar_data_ajax() {
	$start = isset( $_POST['start'] ) ? $_POST['start'] : '';
	$end   = isset( $_POST['end'] ) ? $_POST['end'] : '';

	$events   = agpta_get_calendar_events( $start, $end );
	$calendar = agpta_get_calendar_data( $start, $end );

	$data = array_merge( $events, $calendar );

	wp_send_json( $data, 200 );
}


