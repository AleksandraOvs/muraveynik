<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>


	<div class="order">
        <div class="container">
            <div class="breadcrumbs">
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
			
		<?php
		if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>
		
            <div class="cart__bar">
                <div class="cart__bar-item cart__bar-item--left cart__bar-item--left--order">
                    <p>Корзина</p>
                </div>
                <div class="cart__bar-item cart__bar-item--center--order2">
                    <p>Оформление заказа</p>
                </div>
                <div class="cart__bar-item cart__bar-item--right cart__bar-item--right--order2">
                    <p>Подтверждение заказа</p>
                </div>
            </div>
            <h3 class="h3--order">Информация о заказе</h3>
            <div class="order__container">
                <div class="order__container-left">
                    <table>
                        <tr class="order__first-tr">
                            <td>Имя:</td>
							<?php if ( $order->get_billing_first_name() ) : ?>
                            <td><?php echo esc_html( $order->get_billing_first_name() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Фамилия:</td>
							<?php if ( $order->get_billing_last_name() ) : ?>
                            <td><?php echo esc_html( $order->get_billing_last_name() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Телефон:</td>
							<?php if ( $order->get_billing_phone() ) : ?>
                            <td><?php echo esc_html( $order->get_billing_phone() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
							<?php if ( $order->get_billing_email() ) : ?>
                            <td><?php echo esc_html( $order->get_billing_email() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Город:</td>
							<?php if ( $order->get_shipping_company() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_company() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Улица:</td>
							<?php if ( $order->get_shipping_address_1() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_address_1() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Дом:</td>
							<?php if ( $order->get_shipping_address_2() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_address_2() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Квартира:</td>
							<?php if ( $order->get_shipping_postcode() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_postcode() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Этаж:</td>
							<?php if ( $order->get_shipping_state() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_state() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Способ оплаты:</td>
							<?php if ( $order->get_billing_address_2() ) : ?>
                            <td><?php echo esc_html( $order->get_billing_address_2() ); ?></td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Дата доставки:</td>
							<?php if ( $order->get_shipping_first_name() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_first_name() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
                        <tr>
                            <td>Время доставки:</td>
							<?php if ( $order->get_shipping_last_name() ) : ?>
                            <td><?php echo esc_html( $order->get_shipping_last_name() ); ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif; ?>
                        </tr>
						<tr>
                            <td>Номер заказа:</td>
							<?php if ( $order->get_order_number() ) : ?>
                            <td><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
							<?php endif; ?>
                        </tr>
                    </table>
                    <div class="order__map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae88d39ffafa267baec8f7d5017d4a63fee3db8b999f6284a67025ec577b59fef&amp;width=354&amp;height=356&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>
                    <div class="order__map-mobile">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae88d39ffafa267baec8f7d5017d4a63fee3db8b999f6284a67025ec577b59fef&amp;width=310&amp;height=356&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>
                </div>
                <div class="order__container-right">
                    <div id="orderItem7" class="order__item">
                        <h3>Ваш заказ</h3>
                        <div class="order__inputs">
                            <table>
                                <tr>
                                    <td>Итого:</td>
                                    <td><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
                                </tr>
                                <tr>
                                    <td>Товаров:</td>
                                    <td class="order__cart-count"></td>
                                </tr>
                            </table>
                            <div class="button order__button" data-fancybox data-src="#modalThanks">Продолжить</div>
                        </div>
                    </div>
                </div>
            </div>
			
			<?php endif; ?>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

		<?php endif; ?>
	
        </div>
    </div>
	<script>
		const cartBarItemLeftOrder = document.querySelector('.cart__bar-item--left--order');
		const cartBarItemCenterOrder2 = document.querySelector('.cart__bar-item--center--order2');

		cartBarItemLeftOrder.textContent = '1';
		if(cartBarItemCenterOrder2) cartBarItemCenterOrder2.textContent = '2';
	</script>
