<?php
/**
 * Cart Page
 */

defined( 'ABSPATH' ) || exit;
?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<ul class="shop_table shop_table_responsive cart woocommerce-cart-form__contents basket__list">
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart__item', $cart_item, $cart_item_key ) ); ?>">

						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?>
							<div class="cart__item__inner">
								<div class="cart__image">
									<?php
										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
									?>
								</div><!-- ./cart__image -->

								<div class="cart__product-info">
									<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
									?>
								</div><!-- ./cart__product-info -->
							</div><!-- ./cart__item__inner -->
							
							<div class="cart__item__inner__content">
								<div class="cart__product-price">
								<?php
								    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							    ?>
							</div><!-- ./cart__product-price -->

							<div class="cart__counter">
							
								<button type="button" class="cart__counter-prev counter-prev minus" ></button>
									<?php
										if ( $_product->is_sold_individually() ) {
											$min_quantity = 1;
											$max_quantity = 1;
										} else {
											$min_quantity = 0;
											$max_quantity = $_product->get_max_purchase_quantity();
										}

										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $max_quantity,
												'min_value'    => $min_quantity,
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);
											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
								<button type="button" class="cart__counter-next counter-next plus" ></button>


							</div><!-- ./cart__product-counter -->

							<div class="cart__product-subtotal">
							
								<p class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
										
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
							
							<?php do_action( 'art_woo_add_custom_fields' ); ?>
							</div><!-- ./cart__product-price -->

                            <div class="cart__delete product-remove">
                                    <?php
								                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									                'woocommerce_cart_item_remove_link',
									                sprintf(
										                '<a href="%s" class="basket__delete" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                                        <svg width="30" height="35" viewBox="0 0 30 35" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M28.8781 9.91211C29.6673 9.91211 30.2144 9.1806 29.9185 8.50978C28.8678 6.12808 26.3195 4.44336 23.3498 4.44336H21.977C21.4651 1.96376 19.0941 0 16.1928 0H13.8072C10.9078 0 8.53523 1.96246 8.02298 4.44336H6.65019C3.68048 4.44336 1.13215 6.12808 0.0814909 8.50978C-0.214406 9.1806 0.332731 9.91211 1.12186 9.91211H28.8781ZM13.8072 2.05078H16.1928C17.8255 2.05078 19.2114 3.05799 19.678 4.44336H10.322C10.7886 3.05799 12.1745 2.05078 13.8072 2.05078Z" fill="#C4C4C4"/>
															<path d="M4.19418 32.1423C4.31861 33.7448 5.78855 35 7.54052 35H22.4599C24.2119 35 25.6818 33.7448 25.8063 32.1423L27.3736 11.9629H2.62695L4.19418 32.1423ZM18.0583 17.4488C18.0892 16.8832 18.6151 16.447 19.231 16.4759C19.8478 16.5042 20.3229 16.9857 20.292 17.5512L19.6956 28.4887C19.6657 29.0369 19.1716 29.4629 18.5796 29.4629C17.9357 29.4629 17.4301 28.9691 17.4618 28.3863L18.0583 17.4488ZM10.7695 16.4759C11.3855 16.4475 11.9114 16.8833 11.9422 17.4488L12.5386 28.3863C12.5704 28.9694 12.0643 29.4629 11.4208 29.4629C10.8289 29.4629 10.3347 29.0369 10.3048 28.4887L9.70842 17.5512C9.67763 16.9857 10.1527 16.5042 10.7695 16.4759Z" fill="#C4C4C4"/>
														</svg>
                                                        </a>',
										                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										                esc_html__( 'Remove this item', 'woocommerce' ),
										                esc_attr( $product_id ),
										                esc_attr( $_product->get_sku() )
									                ),
									                $cart_item_key
								                );
							                ?>
                            </div>
							</div>


							
					</li>
					<?php
				}
			}
			?>
					<li class="cart__item cart-subtotal">
						<?php do_action( 'woocommerce_before_cart_totals' ); ?>
							<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
								
								<div class="cart-subtotal__value" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
									<?php esc_html_e( 'Total', 'woocommerce' ); ?>
									<?php
									//echo wp_kses_post( WC()->cart->get_cart_subtotal() );
									if( WC()->cart->get_cart_contents_count() ) {
										?>
										<div class="cart-subtotal__value__name">
											Товаров:
											<span class="count">
											<?php echo wp_kses_data( sprintf( WC()->cart->get_cart_contents_count() ) ); ?>
											</span>
										</div>
										<?php 
									}
									?>
								</div>

								<div class="cart-subtotal__total">
									<?php wc_cart_totals_order_total_html(); ?>
										<div class="basket__update">
											<button type="submit" class="btn button-update <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
												<svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M14.82 2.22331e-05C18.4425 -0.00624298 21.9423 1.31182 24.6608 3.70611C27.3792 6.10039 29.1287 9.40575 29.58 13H25.84C25.3931 10.4037 24.0452 8.04802 22.0334 6.3471C20.0216 4.64618 17.4745 3.7089 14.84 3.70003C12.9289 3.69184 11.0478 4.17498 9.37725 5.10308C7.70666 6.03119 6.30266 7.37309 5.3 9.00002L9.3 13H0V3.70003L2.67 6.37002C4.02952 4.40526 5.84509 2.79938 7.96117 1.68996C10.0772 0.580548 12.4307 0.000672799 14.82 2.22331e-05ZM25.84 16.71H29.71V26L26.94 23.49C25.5648 25.423 23.7471 26.999 21.6387 28.0862C19.5302 29.1735 17.1923 29.7406 14.82 29.74C11.2017 29.7313 7.70988 28.408 4.9946 26.0165C2.27931 23.625 0.525616 20.3282 0.0600014 16.74H3.82C4.25756 19.3407 5.60277 21.7021 7.61667 23.4047C9.63057 25.1074 12.1828 26.0411 14.82 26.04C16.6784 26.0443 18.5083 25.5835 20.1432 24.6998C21.778 23.816 23.1657 22.5373 24.18 20.98L19.59 16.74L25.84 16.71Z" fill="#162217"/>
												</svg>
												<span><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></span>
											</button>
										</div>
								</div>		
					</li>
	</ul><!-- ./end of .shop_table shop_table_responsive cart -->
	<?php do_action( 'woocommerce_cart_actions' ); ?>

<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
	<div class="woocommerce-cart-form__coupon">
		<?php
			global $checkout;
			do_action( 'woocommerce_before_checkout_form', $checkout );
		?>
	</div>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<?php do_action( 'woocommerce_after_cart' ); ?>
