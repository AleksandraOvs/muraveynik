<?php
function get_categories_product_new($categories_list = "", $parent_id = 0) {

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

			$categories_list .= '<ul class="sub-menu sub-menu--1">';

		} else {

			$categories_list .= ' <ul class="sub-menu sub-menu--2">';

		}

		foreach($get_categories_product as $categories_item) {
			
			if($parent_id == 0) {
			
				$categories_list .= '<li>';
				$categories_list .= '<a href="'.esc_url(get_term_link((int)$categories_item->term_id)).'">'.esc_html($categories_item->name).'</a>';
				$categories_list .= '<i class="fa fa-angle-right" aria-hidden="true"></i>';
				$categories_list .= get_categories_product_new("", $categories_item->term_id);
				$categories_list .= '</li>';
			} else {
				$categories_list .= '<li>';
				$categories_list .= '<a href="'.esc_url(get_term_link((int)$categories_item->term_id)).'">'.esc_html($categories_item->name).'</a>';
				$categories_list .= get_categories_product_new("", $categories_item->term_id);
				$categories_list .= '</li>';
			}
		}

		$categories_list .= '</ul>';
	}

	return $categories_list;

}
