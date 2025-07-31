/*
 * File: theme.js
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */



(function( $, document ){

    const theme = {

        init: function() {
            this.domCache();
            this.eventBinder();
        },
        domCache: function() {
            this.$body = $('body');
            this.$navbar = $(this.$body).find('#navbar');
        },
        eventBinder: function() {

            // Delegated clicks for dropdown toggles
            this.$body.on('click', '.has-dropdown', this.hasDropdownAction.bind(this));

            // Clicking outside any dropdown menu
            this.$body.on('click', this.closeDropdownAction.bind(this));

            // Mobile menu toggle
            $('#mobile-menu-button').on('click', this.mobileMenuAction.bind(this));

            // Clicking links closes dropdowns
            this.$body.on('click', 'a', function() {
                $('.dropdown-menu').hide().attr('aria-hidden', 'true');
                $('.has-dropdown').attr('aria-expanded', 'false');
            });


            // Escape key closes dropdowns
            $(document).on('keydown', function(e) {
                if ( e.key === 'Escape' ) {
                    $('.dropdown-menu').hide().attr('aria-hidden', 'true' );
                    $('.has-dropdown').attr( 'aria-expanded', 'false' );
                }
            });
        },

        /**
         * Dropdown menu.
         * @param e
         */
        hasDropdownAction: function(e) {
            e.stopPropagation();

            const $trigger = $(e.currentTarget);
            const menuId = $trigger.data('menu-id');
            const $dropdown = $('.dropdown-menu[data-menu="' + menuId + '"]');

            $('.dropdown-menu').not($dropdown).hide().attr('aria-hidden', 'true');
            $dropdown.toggle('slide');

            const isOpen = $dropdown.is(':visible');
            $trigger.attr('aria-expanded', isOpen);
            $dropdown.attr('aria-hidden', !isOpen);
        },

        /**
         * Toggle mobile menu
         * @param e
         */
        mobileMenuAction: function (e) {
            let mobileMenu = $('#mobile-menu');
            mobileMenu.toggleClass( 'hidden' );
            mobileMenu.toggleClass( 'transition-all duration-300 ease-in-out' );
        },

        /**
         * Close dropdown if click
         * @param e
         */
        closeDropdownAction: function(e) {
            let menu = $('.dropdown-menu'); // Get all dropdown menus
            let target = $(e.target);

            if ( !target.closest('.has-dropdown').length ) {
                for( let i = 0; i < menu.length; i++ ) {
                    if ( window.getComputedStyle(menu[i]).display === 'block' ) {
                        $(menu[i]).hide();
                    }
                }
            }
        }
    };

    $(document).ready(function(){
        theme.init();
    });

})(jQuery, document);