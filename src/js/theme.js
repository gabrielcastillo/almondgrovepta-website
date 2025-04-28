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
        },

        hasDropdownAction: function(e) {
            let menuId = $(e.target).data('menu-id');
            $('.dropdown-menu[data-menu="' + menuId + '"]').toggle();
            $('body').addClass('open-menu');
        },

        /**
         * Toggle mobile menu
         * @param e
         */
        mobileMenuAction: function (e) {
            $('#mobile-menu').toggle();
        },

        closeDropdownAction: function(e) {
            let menu = $('.dropdown-menu'); // Get all dropdown menus
            for (let i = 0; i < menu.length; i++) {
                // Check if click event target is a dropdown menu button
                if (!$(e.target).hasClass('has-dropdown')) {
                    // if menu is visiable, hide.
                    if (window.getComputedStyle(menu[i]).display === 'block') {
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