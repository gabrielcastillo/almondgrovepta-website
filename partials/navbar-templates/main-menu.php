<?php
/*
 * File: navbar-template.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


$menu_builder = new AGPTA_Nav_Menu_Builder();

$menu_items = $menu_builder->get_menu_list();

?>
<div id="primary-nav" class="hidden sm:ml-6 sm:block">
    <div class="flex space-x-4">
		<?php foreach( $menu_items as $menu_list ): ?>
			<?php if( isset($menu_list['sub_menu']) && ! empty($menu_list['sub_menu']) ): ?>
                <div class="relative ml-3">
                    <div class="relative group">
                        <button data-menu-id="<?php echo strtolower($menu_list['title']);?>"  type="button" class="has-dropdown inline-flex items-center text-gray-800 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-expanded="false" aria-haspopup="true">
							<?php echo $menu_list['title']; ?>
                            <svg class="ml-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M5.25 7.5l4.5 4.5 4.5-4.5"/>
                            </svg>
                        </button>
                    </div>
                    <div style="display:none;" data-menu="<?php echo strtolower($menu_list['title']); ?>" class="dropdown-menu absolute z-10 mt-2 w-44 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="" tabindex="-1">
						<?php foreach($menu_list['sub_menu'] as $sub_menu_list): $sub_menu_list_toggle_button_id = strtolower(str_replace(" ",'-', $menu_list['title'])) ?>
                            <a href="<?php echo ($sub_menu_list['url']) ?: ''; ?>" class="block hover:bg-gray-100 hover:rounded-md px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="<?php echo $sub_menu_list_toggle_button_id; ?>"><?php echo $sub_menu_list['title']; ?></a>
						<?php endforeach; ?>
                    </div>
                </div>
			<?php else: ?>
                <a href="<?php echo $menu_list['url']; ?>" class="text-gray-800 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page"><?php echo $menu_list['title']; ?></a>
			<?php endif; ?>
		<?php endforeach; ?>
    </div>
</div>