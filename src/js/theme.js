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
            $('.has-dropdown').on('click', this.hasDropdownAction.bind(this));

            $('body').on('click', this.closeDropdownAction.bind(this));
            $('#mobile-menu-button').on('click', this.mobileMenuAction.bind(this));
            $('a').on('click', function() {
                $('.dropdown-menu').hide();
            });
        },

        hasDropdownAction: function(e) {
            let menuId = $(e.target).data('menu-id');
            $('.dropdown-menu').hide();
            $('.dropdown-menu[data-menu="' + menuId + '"]').toggle('slide');
            $('body').addClass('open-menu');
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