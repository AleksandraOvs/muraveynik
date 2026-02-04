<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>

<div class="product__bestseller <?php the_field('product__bestseller'); ?>">Хит продаж</div>
