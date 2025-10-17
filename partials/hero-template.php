<?php
	/*
	 * File: hero-template.php
	 *
	 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
	 * Copyright (c) 2025.
	 */
	
	$options      = get_option('agpta_settings', array());
	$banner_image = isset($options['banner_image']) ? $options['banner_image'] : '';
?>
<div class="bg-white py-20 border-b-2 relative border-b-red-700 bg-[url('http://ptasite.test/wp-content/uploads/2025/08/almondgroveelementry-facilitron.jpg')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black bg-opacity-80 z-0"></div>

    <div class="relative z-10 grid md:grid-cols-2 items-center gap-8 max-w-5xl max-md:max-w-md mx-auto">
        <div class="max-md:order-1 max-md:text-center">
            <div class="mx-auto max-w-4xl text-white">
                <h2 class="md:text-4xl text-3xl md:leading-10 font-bold mb-4">Almond Grove School PTA</h2>
                <p class="mt-4 leading-relaxed text-lg font-medium sm:text-xl/8">PTA your way... donate, volunteer,
                    share your voice, advocate for students - however participation works for you! Your schedule, your
                    fit. Do what you can do at whatever degree you can!</p>
            </div>
            <div class="mt-12 flex flex-wrap max-md:justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/pta-events')); ?>"
                   class="px-6 py-3 text-base font-semibold text-white bg-red-700 rounded-md hover:bg-opacity-80 transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-red-500 focus:outline-none focus:ring-opacity-50">Explore
                    Our Events</a>
                <a href="<?php echo esc_url(home_url('/join')); ?>"
                   class="px-6 py-3 text-base font-semibold text-red-700 bg-white border border-red-700 rounded-md hover:text-white hover:bg-red-700 transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-red-500 focus:outline-none focus:ring-opacity-50">Join
                    Now</a>
            </div>
        </div>
        <div class="md:h-[450px] hidden md:block">
            <img loading="lazy" src="<?php echo esc_url($banner_image); ?>"
                 class="w-full h-full object-cover rounded-lg shadow-xl" alt="hero-img"/>
        </div>
    </div>
</div>