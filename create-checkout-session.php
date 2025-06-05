<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
require_once 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51RLZwFPi5c1UANUbX8Lurkayx8XbJA6VhVzcuFM4NC7S8lkcNRBxKEC8QeQg9QsFcLBHJL05UDQIryqRK29IHJaK00whSPN9gL');


$event_id = isset( $_GET['event_id'] ) ? (int) $_GET['event_id'] : 0;

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
		'quantity' => 1,
	]],
	'mode' => 'payment',
	'success_url' => get_bloginfo('url') . '/payment-success',
	'cancel_url' => get_bloginfo('url') . '/payment-cancel',
]);

header('Content-Type: application/json');
echo json_encode( [ 'id' => $session->id ], JSON_THROW_ON_ERROR );