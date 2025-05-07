<?php
/*
 * File: PTA_Nav_Menu_Builder.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

class AGPTA_Nav_Menu_Builder
{

	private string $menu_name;

	public function __construct(string $menu_name = 'primary')
	{
		$this->menu_name = $menu_name;
	}

	/**
	 * get_menu_list
	 * Retrieve menu object from database using "wp_get_nav_menu_object"
	 *
	 * @return array
	 */
	final public function get_menu_list(): array
	{
		$nav_menu = [];

		if (($locations = get_nav_menu_locations()) && isset($locations[$this->menu_name])) {
			$menu_object = wp_get_nav_menu_object($locations[$this->menu_name]);

			$menu_items = wp_get_nav_menu_items( $menu_object->term_id);

			foreach ($menu_items as $item) {
				if ($this->menu_item_has_children($menu_items, $item->ID) !== false) {
					$nav_menu[] = [
						'ID' => url_to_postid($item->url),
						'title' => $item->title,
						'url' => $item->url,
						'sub_menu' => [],
						'slug' => $this->get_url_slug( $item->url )
					];
					continue;
				}

				if ($item->menu_item_parent > 0) {
					$parent = array_key_last($nav_menu);
					$nav_menu[$parent]['sub_menu'][] = [
						'ID' => url_to_postid($item->url),
						'title' => $item->title,
						'url' => $item->url,
						'slug' => $this->get_url_slug( $item->url )
					];
					continue;
				}

				$nav_menu[] = [
					'ID' => url_to_postid($item->url),
					'title' => $item->title,
					'url' => $item->url,
					'slug' => $this->get_url_slug( $item->url )
				];
			}

		}

		return $nav_menu;
	}


	/**
	 * @param array $menu
	 * @param int $parent_id
	 *
	 * @return false|int|string
	 */
	private function menu_item_has_children(array $menu, int $parent_id): bool|int|string {
		$parent_IDs = array_column($menu, $parent_id);
		return array_search( $parent_id, $parent_IDs, true );
	}

	private function get_url_slug( $url ): string|null {
		$url = rtrim( $url, '/');

		$path = parse_url( $url, PHP_URL_PATH );

		if ( $path ) {
			$slug = basename( $path );
		} else {
			$slug = $path;
		}



		return $path;
	}
}

