<?php

require_once __DIR__ . '/vendor/autoload.php';

\Stripe\Stripe::setApiKey('');

$endpoint_secret = 'whsec_...';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

try {
	$event = \Stripe\Webhook::constructEvent(
		$payload, $sig_header, $endpoint_secret
	);
} catch ( Exception $e) {
	http_response_code(400);
	echo json_encode( [ 'error' => $e->getMessage() ], JSON_THROW_ON_ERROR );
	exit;
}

if ( $event->type === 'checkout.session.completed') {
	$session = $event->data->object;

	$email = $session->customer_details->email;
	$event_name = $session->display_items[0]['custom']['name'] ?? 'Event';
	$amount = $session->amount_total / 100;

	send_ticket_email($email, $event_name, $amount);
}

http_response_code(200);