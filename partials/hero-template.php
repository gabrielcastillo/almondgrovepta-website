<?php
/*
 * File: hero-template.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

$options      = get_option( 'agpta_settings', array() );
$banner_image = isset( $options['banner_image'] ) ? $options['banner_image'] : '';
?>
<div class="bg-white py-20 border-b-2 border-b-gray-100">
<div class="grid md:grid-cols-2 items-center gap-8 max-w-5xl max-md:max-w-md mx-auto">
	<div class="max-md:order-1 max-md:text-center">
		<h2 class="md:text-4xl text-3xl md:leading-10 font-bold text-slate-900 mb-4">Almond Grove School PTA</h2>
		<p class="mt-4 text-base text-slate-600 leading-relaxed">PTA your way... donate, volunteer, share your voice, advocate for students - however participation works for you! Your schedule, your fit. Do what you can do at whatever degree you can!</p>
		<div class="mt-12 flex flex-wrap max-md:justify-center gap-4">
			<a href="<?php echo esc_url( home_url( '/pta-events' ) ); ?>" class="px-6 py-3 text-base font-semibold text-white bg-red-700 rounded-md hover:bg-opacity-80 transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-red-500 focus:outline-none focus:ring-opacity-50">Explore Our Events</a>
			<a href="<?php echo esc_url( home_url( '/join' ) ); ?>" class="px-6 py-3 text-base font-semibold text-red-700 border border-red-700 rounded-md hover:text-white hover:bg-red-700 transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-red-500 focus:outline-none focus:ring-opacity-50">Join Now</a>
		</div>
	</div>
	<div class="md:h-[450px]">
		<img src="<?php echo esc_url( $banner_image ); ?>" class="w-full h-full object-cover rounded-lg shadow-xl" alt="hero-img" />
	</div>
</div>
</div>