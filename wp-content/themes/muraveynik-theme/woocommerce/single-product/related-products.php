<?php
    global $product;
    global $post;

    $product = wc_get_product( $post->ID );

    $related_products = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), 4 , $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
    $related_products = wc_products_array_orderby( $related_products, 'rand', 'desc' );

    $related_product_ids = array_map(
        function( $product ) {
            return $product->get_id();
        },
        $related_products
    );

  //print_r ( $related_product_ids );

  //print_r( $related_products );

  if ( $related_products ) : ?>
    <?php foreach ( $related_products as $related_product ) : ?>
    <?php
        $post_object = get_post( $related_product->get_id() );
            setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

            wc_get_template_part( 'content', 'product' );
            
    ?>

    <?php endforeach; ?>

    <?php
        endif;
    ?>