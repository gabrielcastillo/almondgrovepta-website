<?php
/*
 * File: class-calendar.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


if ( ! class_exists( 'AGPTA_Calendar' ) ) {
	class AGPTA_Calendar {
		protected string $start_date;

		protected string $end_date;

		public function init() {
			$this->agpta_get_calendar_events();
		}

		public function agpta_get_calendar_events() {
			$this->start_date = ( isset( $_POST['start'] ) ) ? sanitize_text_field( wp_unslash( $_POST['start'] ) ) : '';
			$this->end_date   = ( isset( $_POST['end'] ) ) ? sanitize_text_field( wp_unslash( $_POST['end'] ) ) : '';

			$this->start_date = gmdate( 'Y-m-d H:i:s', strtotime( $this->start_date ) );
			$this->end_date   = gmdate( 'Y-m-d H:i:s', strtotime( $this->end_date ) );

			$events    = $this->agpta_get_event_data();
			$calendars = $this->agpta_get_calendar_data();

			$data = array_merge( $events, $calendars );

			wp_send_json( $data, 200 );
			exit;
		}

		protected function agpta_get_event_data() {
			$args = array(
				'post_type'      => 'pta_events',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'meta_query'     => array(
					array(
						'key'     => '_agpta_event_date',
						'value'   => array( $this->start_date, $this->end_date ),
						'compare' => 'BETWEEN',
						'type'    => 'DATETIME',
					),
				),
				'orderby'        => 'meta_value',
				'meta_key'       => '_agpta_event_date',
				'order'          => 'ASC',
			);
			
			$query      = new WP_Query($args);
			$event_data = array();
			
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					
					$event_date = get_post_meta(get_the_ID(), '_agpta_event_date', true);
					if ( ! $event_date) {
						continue;
					}
					
					$event_data[] = array(
						'title'       => get_the_title(),
						'start'       => $this->start_date,
						'end'         => $this->start_date,
						'url'         => get_permalink(),
						'description' => get_post_meta(get_the_ID(), '_agpta_event_price', true),
						'status'      => get_post_meta(get_the_ID(), '_agpta_event_status', true),
						'color' => 'red'
					);
				}
			}
			wp_reset_postdata();
			
			return $event_data;
		}

		protected function agpta_get_calendar_data() {

			$args = array(
				'post_type'      => 'agpta_calendar',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'meta_query'     => array(
					array(
						'key'     => '_agpta_calendar_date',
						'value'   => array( $this->start_date, $this->end_date ),
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
						'color'       => 'red',
					);
				}
			}
			wp_reset_postdata();

			return $event_data;
		}
	}

	$calendar = new AGPTA_Calendar();

	$calendar->init();
}
