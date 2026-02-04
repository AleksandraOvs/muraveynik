<?php
function get_categories_product($categories_list = "", $parent_id = 0, $i = 0) {

	$get_categories_product = get_terms("product_cat", [
		"orderby" => "meta_value_num", 
		'meta_query' => array(
				array('key' => 'sort_order'
            )
		),
		"order" => "ASC",
		"hide_empty" => 1,
		"hierarchical" => 1,
		"parent" => $parent_id
	]);

	if(count($get_categories_product) > 0) {

		if($parent_id == 0) {

			$categories_list .= '<ul class="catalog-menu__items">';

			$i = 0;

		} else {

			$i++;

			$categories_list .= '<ul class="catalog-menu__menu subcategories_list_'.$i.'">';

		}

		foreach($get_categories_product as $categories_item) {
			
			if($parent_id == 0) {
			
				$thumbnail_id = get_woocommerce_term_meta( $categories_item->term_id, 'thumbnail_id', true );

				$categories_list .= '<li class="catalog-menu__item">';
				$categories_list .= '<header class="catalog-menu__item-header">';
				$categories_list .= '<div class="catalog-menu__image"><img src="'.  wp_get_attachment_url( $thumbnail_id ) .'" alt=""></div>';
				$categories_list .= '<h3>'.esc_html($categories_item->name).'</h3>';
				$categories_list .= '</header>';
				$categories_list .= get_categories_product("", $categories_item->term_id, $i);
				$categories_list .= '</li>';
			} elseif($parent_id > 0 && $i < 2) {
				$categories_list .= '<li>';
				$categories_list .= '<a href="'.esc_url(get_term_link((int)$categories_item->term_id)).'">'.esc_html($categories_item->name).'</a>';
				$categories_list .= get_categories_product("", $categories_item->term_id, $i);
				$categories_list .= '</li>';
			}
		}

		$categories_list .= '</ul>';
	}

	return $categories_list;

}