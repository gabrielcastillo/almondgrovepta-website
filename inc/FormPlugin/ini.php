<?php
/*
 * File: ini.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

add_shortcode( 'sv_form', 'sv_form_shortcode' );

function sv_form_shortcode() {
	ob_start();
	?>
	<

	<form id="custom_form" method="POST">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br>

		<label for="message">Message:</label>
		<textarea name="message" id="message" required></textarea><br>

		<input type="submit" name="submit_form" value="Submit">
	</form>

	<?php
	return ob_get_clean();
}


add_action( 'init', 'sv_handle_form_submission' );
function sv_handle_form_submission() {
	if ( isset( $_POST['submit_form'] ) ) {
		global $wpdb;

		$name    = sanitize_text_field( $_POST['form_name'] );
		$email   = sanitize_email( $_POST['form_email'] );
		$message = sanitize_text_field( $_POST['form_message'] );

		$tablename = $wpdb->prefix . 'sv_form_entries';
		$wpdb->insert(
			$tablename,
			array(
				'name'       => $name,
				'email'      => $email,
				'message'    => $message,
				'created_at' => current_time( 'mysql' ),
			)
		);

		$admin_email = get_option( 'amdin_email' );
		$subject     = 'New Form Submission';
		$body        = "You have a new submission from $name ($email):\n\n$message";
		$headers     = array( 'Content-Type: text/plain; charset=UTF-8' );

		wp_mail( $admin_email, $subject, $body, $headers );

		wp_redirect( home_url( '/thank-you/' ) );
		exit;
	}
}