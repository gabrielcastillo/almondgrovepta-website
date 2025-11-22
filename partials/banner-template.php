<?php
	/**
	 * File: banner-template.php
	 *
	 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
	 * Copyright (c) 2025.
	 **/

	$options = get_option( 'agpta_settings', array() );

	$content = $options['top_banner_content'];

	$cart_count = ( isset( $_SESSION['cart'] ) ) ? count( $_SESSION['cart'] ) : 0;

	$has_banner = isset( $options['enable_banner'] );
?>
<?php if ( $has_banner ) : ?>
	<div class="bg-gray-900 px-6 py-2.5 sm:px-3.5">
		<div class="container mx-auto">
			<div id="topbar" class="grid grid-cols-4 gap-4 px-2">
				<div class="col-span-3 text-center text-white">
					<?php echo wp_kses_post( $content ); ?>
				</div>
				<div class="col-span-1 flex justify-end">
					<a href="<?php echo esc_url( home_url( 'cart' ) ); ?>" class="group -m-2 flex items-center p-2">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
							aria-hidden="true" class="size-6 shrink-0 text-gray-400 group-hover:text-gray-200">
							<path d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
									stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						<span class="ml-2 text-sm font-medium text-white group-hover:text-gray-200"><?php echo esc_html( $cart_count ); ?></span>
						<span class="sr-only">items in cart, view bag</span>
					</a>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>