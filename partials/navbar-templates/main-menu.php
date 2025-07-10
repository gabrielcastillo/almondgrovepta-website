<?php
/*
 * File: navbar-template.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

global $wp;

$menu_builder   = new AGPTA_Nav_Menu_Builder();
$menu_items     = $menu_builder->get_menu_list();
$current_slug   = $wp->request;

function render_menu_item( $menu_item, $current_slug ) {
    $slug = $menu_item['slug'] ?? '';
    $active_class = ( $current_slug === $slug ) ? 'bg-red-700 text-white' : '';
    if ( isset( $menu_item['sub_menu'] ) && !empty( $menu_item['sub_menu'] ) ) {
        render_dropdown_menu( $menu_item, $active_class );
    } else {
        echo '<a href="' . esc_url( $menu_item['url'] ) . '" class="' . esc_attr( $active_class ) . ' text-gray-800 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">' . esc_html($menu_item['title']) . '</a>';
    }
}

function render_dropdown_menu( $menu_item, $active_class ) {
    global $current_slug;
    $slug = $menu_item['slug'] ?? '';
    $menu_id = strtolower($menu_item['title']);
    echo '<div class="relative ml-3">';
    echo '<div class="relative group">';
    echo '<button data-menu-id="' . esc_attr($menu_id) . '" type="button" class="has-dropdown inline-flex items-center text-gray-800 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-expanded="false" aria-haspopup="true">';
    echo esc_html($menu_item['title']);
    echo '<svg class="ml-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.25 7.5l4.5 4.5 4.5-4.5"/></svg>';
    echo '</button>';
    echo '</div>';
    echo '<div style="display:none;" data-menu="' . esc_attr($menu_id) . '" class="' . esc_attr($active_class) . ' dropdown-menu absolute z-10 mt-2 w-44 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="" tabindex="-1">';
    foreach ($menu_item['sub_menu'] as $sub_menu_item) {
	    $sub_menu_active_class = ($current_slug === trim($sub_menu_item['slug'], '/')) ? 'bg-red-700 text-white' : '';
	    $sub_menu_id = strtolower(str_replace(' ', '-', $menu_item['title']));
	    echo '<a href="' . esc_url($sub_menu_item['url']) . '" class="' . esc_attr($sub_menu_active_class) . ' block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="' . esc_attr($sub_menu_id) . '">' . esc_html($sub_menu_item['title']) . '</a>';
    }
    echo '</div>';
    echo '</div>';
}

?>
<div id="primary-nav" class="hidden sm:ml-6 sm:block">
    <div class="flex space-x-4">
		<?php foreach ($menu_items as $menu_item): ?>
			<?php render_menu_item($menu_item, $current_slug); ?>
		<?php endforeach; ?>
    </div>
</div>


