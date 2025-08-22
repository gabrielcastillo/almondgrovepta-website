<?php
/*
 * File: ini.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

add_shortcode( 'sv_form', 'sv_form_shortcode' );
add_action( 'init', 'sv_handle_form_submission' );
add_action( 'wp_loaded', 'create_custom_form_table' );

/**
 * Display form using shortcode
 *
 * @return false|string
 */
function sv_form_shortcode() {
	ob_start();
	?>

	<div id="messages">
		<?php
		if ( isset( $_GET['success'] ) ) {
			if ( $_GET['success'] == 1 ) {
				echo '<p style="color: green;">Message sent successfully!</p>';
			} else {
				echo '<p style="color: red;">There was a problem sending your message. Please try again.</p>';
			}
		}
		?>
	</div>


	<form id="sv_contact_form" method="POST" class="my-10">
		<input type="hidden" name="sv_nonce" value="<?php echo esc_attr( wp_create_nonce( 'sv_form_nonce' ) ); ?>" />
		<div class="mb-8">
			<label for="name" class="w-full block">Name:</label>
			<input  class="w-full sm:w-1/2" type="text" name="form_name" id="name" required><br>
		</div>

		<div class="mb-8">
			<label for="email" class="w-full block">Email:</label>
			<input  class="w-full sm:w-1/2" type="email" name="form_email" id="email" required><br>
		</div>

		<div class="mb-8">
			<label for="message">Message:</label>
			<textarea  class="w-full" rows="10" name="form_message" id="message" required></textarea><br>
		</div>
		<div class="mb-0">
			<input type="submit" name="submit_form" value="Submit" class="rounded-md bg-red-700 px-3.5 py-2.5 text-xs font-semibold text-white shadow-sm ring-1 ring-inset ring-red-500 hover:bg-red-500">
		</div>
	</form>

	<?php
	return ob_get_clean();
}

/**
 * Form Processor. Handle form submission.
 *
 * @return void
 */
function sv_handle_form_submission() {
	if ( isset( $_POST['submit_form'] ) ) {
		global $wpdb;
		$referer = wp_get_referer();
		if (
			! isset( $_POST['sv_nonce'] ) ||
			! wp_verify_nonce( $_POST['sv_nonce'], 'sv_form_nonce' )
		) {
			wp_redirect( home_url( '/contact/?success=0#messages' ) );
			exit;
		}

		$name    = sanitize_text_field( $_POST['form_name'] );
		$email   = sanitize_email( $_POST['form_email'] );
		$message = sanitize_textarea_field( $_POST['form_message'] );

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

		$admin_email = get_option( 'admin_email' );
		$subject     = 'New Form Submission';
		$body        = "You have a new submission from $name ($email):\n\n$message";
		$headers     = array( 'Content-Type: text/plain; charset=UTF-8' );

		$mail_sent = wp_mail( $admin_email, $subject, $body, $headers );

		$redirect_url = add_query_arg( 'success', $mail_sent ? 1 : 0, $referer ) . '#messages';
		wp_redirect( $redirect_url );
		exit;
	}
}

/**
 * Create database table if not exists.
 *
 * @return void
 */
function create_custom_form_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'sv_form_entries';

	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql             = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            email varchar(100) NOT NULL,
            message text NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}
}

