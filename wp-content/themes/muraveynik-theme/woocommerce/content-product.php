<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

 <li <?php wc_product_class( '', $product ); ?>> 
	
		<div class="button-stock">
					<?php
						if( $product->is_in_stock() ) {
					?>
					
						<a class="button-instock" href="<?php the_permalink() ?>">В наличии</a>
					<?php
						} else {
					?>
					<a class="button-notinstock" href="<?php the_permalink() ?>">Нет в наличии</a>
					<?php
					}
					?>
		</div>

		<form class="product-item__form" method="post" enctype='multipart/form-data'>	
			<div class="product-item__thumb">
				<a href="<?php the_permalink() ?>">
					<?php
					/**
	 					* Hook: woocommerce_before_shop_loop_item_title.
	 					*
	 					* @hooked woocommerce_show_product_loop_sale_flash - 10
	 					* @hooked woocommerce_template_loop_product_thumbnail - 10
	 				*/
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>	
				</a>
			</div><!-- ./product-item__thumb -->
			
			<div class="product-item__title">
				<a href="<?php the_permalink() ?>">
				<?php
					/**
				 	* Hook: woocommerce_shop_loop_item_title.
				 	*
				 	* @hooked woocommerce_template_loop_product_title - 10
				 	*/
					do_action( 'woocommerce_shop_loop_item_title' );
				?>
				</a>
				<?php $attributes = $product->get_attributes(); ?>
					<ul class="product-item__attr-list" >
						<?php
							foreach ( $attributes as $attribute ) :
								if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
									continue;
							} else {
								$has_row = true;
							}
							//  if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>
							<li class="product-item__attr-list__item">
								<span class="product-attrs__list__item__name">
									<?php echo wc_attribute_label( $attribute['name'] ) . ':'; ?>
								</span>
								<?php
									if ( $attribute['is_taxonomy'] ) {
										$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
										echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
									} else {
									// Convert pipes to commas and display values
										$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
										echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
									}
								?>
							</li>	
							<?php endforeach; ?>
							
					</ul>
			</div><!-- ./product-item__title -->



			<?php if ( $product->is_in_stock() ) { ?>
				<div class="product-item__actions">
				
					<div class="product-item__actions__inner">
					
						<div class="product-item__actions__cart-counter">
							<?php
							/**
	 							* Hook: woocommerce_after_shop_loop_item_title.
	 							*
	 							* @hooked woocommerce_template_loop_rating - 5
	 							* @hooked woocommerce_template_loop_price - 10
	 						*/
							do_action( 'woocommerce_after_shop_loop_item_title' );

							/**
	 							* Hook: woocommerce_after_shop_loop_item.
	 							*
	 							* @hooked woocommerce_template_loop_product_link_close - 5
	 							* @hooked woocommerce_template_loop_add_to_cart - 10
	 						*/
							//do_action( 'woocommerce_after_shop_loop_item' );
							?>

							<?php do_action( 'woocommerce_before_add_to_cart_quantity' ); ?>
							<?php woocommerce_quantity_input(); ?>
							<?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>
							<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>	
						</div><!-- ./product-item__actions__cart-counter -->
				
						
						<div class="product-item__actions__cart-buttons">
							<?php if( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( get_the_ID()))){
							?>
						
								<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button added">
									<svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2 6.94118L7.55556 14L17 2" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
									</svg>
									<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
								</button>

							<?php } else { ?>

								<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button">
									<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.5 16C15.6 16 16.5 16.9 16.5 18C16.5 19.1 15.6 20 14.5 20C13.4 20 12.5 19.1 12.5 18C12.5 16.9 13.4 16 14.5 16ZM20.5 0V2H18.5L14.9 9.6L16.3 12C16.4 12.3 16.5 12.7 16.5 13C16.5 14.1 15.6 15 14.5 15H2.5V13H14.1C14.2 13 14.3 12.9 14.3 12.8V12.7L13.4 11H6C5.2 11 4.6 10.6 4.3 9.99996L0.699999 3.5C0.5 3.3 0.5 3.2 0.5 3C0.5 2.4 0.9 2 1.5 2H16.3L17.2 0H20.5ZM4.5 16C5.6 16 6.5 16.9 6.5 18C6.5 19.1 5.6 20 4.5 20C3.4 20 2.5 19.1 2.5 18C2.5 16.9 3.4 16 4.5 16Z" fill="white"/>
									</svg>
									<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
								</button>
							<?php
							}?>				
							<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>	
						</div>		
			</div><!-- ./product-item__actions__inner -->
			</div>
			<?php }else {
					?>
				<div class="unstock-button__inner">
					<span class="button unstock-button">В корзину</span>
				</div>
	<?php
				}?>
					</form>
							
</li>

