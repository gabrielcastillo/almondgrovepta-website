<?php
/*
 * File: navbar.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */
?>

<nav id="agpta-navbar" class="bg-white border-t-2 border-red-500">
    <div class="mx-auto max-w-full px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button id="mobile-menu-button" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <a href="<?php echo get_bloginfo('url'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                        <img class="block h-8 w-auto lg:hidden" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo') ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        <img class="hidden h-8 w-auto lg:block" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </a>
                </div>
                <?php get_template_part('partials/navbar-templates/main', 'menu'); ?>
            </div>
	        <?php //get_template_part('template-parts/navbar-templates/navbar', 'cart'); ?>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <?php get_template_part('partials/navbar-templates/mobile', 'menu'); ?>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <?php //get_template_part('template-parts/navbar-templates/navbar-mobile', 'profile'); ?>
        </div>
    </div>
</nav>