<?php
get_header();
$price = get_post_meta( get_the_ID(), '_event_price', true);

?>

<button id="checkout-button">
	Buy Ticket ($<?php echo esc_html( $price ); ?>)
</button>

<script>
	document.getElementById('checkout-button').addEventListener('click', function() {
        fetch('<?php echo get_template_directory_uri(); ?>/create-checkout-session.php?event_id=<?php echo get_the_ID(); ?>')
		.then( res => res.json())
		.then( data => {
            return Stripe('pk_test_51RLZwFPi5c1UANUbB0IE2yHG8pqYyAkPW7dGRTUvDTZMAaiul9h6rzt2WwF3pXxpEzBzavTeodLw2YE0VNe5Gain00BfTBLEer').redirectToCheckout({ sessionId: data.id });
		});
	});
</script>
<?php get_footer(); ?>