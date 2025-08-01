<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
require_once 'vendor/autoload.php';

$options = get_option( 'agpta_settings', array() );

$stripe_key = ( $options['enable_stripe_test'] ) ? $options['test_secret_key'] : $options['live_secret_key'];

\Stripe\Stripe::setApiKey( $stripe_key );


$event_id = isset( $_GET['event_id'] ) ? (int) $_GET['event_id'] : 0;
$qty = isset( $_GET['qty'] ) ? (int) $_GET['qty'] : 1;

$price = get_post_meta( $event_id, '_event_price', true);

if ( !$price ) {
	http_response_code(400);
	echo json_encode( ['errors' => 'Error with price'], JSON_THROW_ON_ERROR );
	exit;
}

$session = \Stripe\Checkout\Session::create([
	'payment_method_types' => ['card', 'cashapp'],
	'line_items' => [[
		'price_data' => [
			'currency' => 'usd',
			'product_data' => ['name' => get_the_title($event_id)],
			'unit_amount' => (int) ( $price * 100 ),
		],
		'quantity' => $qty,
	]],
	'mode' => 'payment',
	'success_url' => get_bloginfo('url') . '/payment-success',
	'cancel_url' => get_bloginfo('url') . '/payment-cancel',
]);

header('Content-Type: application/json');
echo json_encode( [ 'id' => $session->id ], JSON_THROW_ON_ERROR );