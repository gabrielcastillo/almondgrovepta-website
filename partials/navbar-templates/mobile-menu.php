<?php
/*
 * File: mobile-menu.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */


$menu_builder = new AGPTA_Nav_Menu_Builder();

$menu_items = $menu_builder->get_menu_list();
?>

<?php foreach( $menu_items as $menu_list ): ?>
	<?php if( isset($menu_list['sub_menu']) && ! empty($menu_list['sub_menu']) ): ?>
		<div class="relative">
			<?php foreach($menu_list['sub_menu'] as $sub_menu_list): $sub_menu_list_toggle_button_id = strtolower(str_replace(" ",'-', $menu_list['title'])) ?>
				<a href="<?php echo ($sub_menu_list['url']) ?: ''; ?>" class="text-gray-800 hover:bg-red-500 hover:text-white block rounded-md px-3 py-2 text-base font-medium" role="menuitem" tabindex="-1" id="<?php echo $sub_menu_list_toggle_button_id; ?>"><?php echo $sub_menu_list['title']; ?></a>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<a href="<?php echo $menu_list['url']; ?>" class="text-gray-800 hover:bg-red-500 hover:text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page"><?php echo $menu_list['title']; ?></a>
	<?php endif; ?>
<?php endforeach; ?>