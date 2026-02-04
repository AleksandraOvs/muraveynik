<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

	<div class="order order--main">
        <div class="container">
            <div class="breadcrumbs">
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
            </div>
            <div class="cart__bar">
                <div class="cart__bar-item cart__bar-item--left cart__bar-item--left--order">
                    <p>Корзина</p>
                </div>
                <div class="cart__bar-item cart__bar-item--center--order">
                    <p>Оформление заказа</p>
                </div>
                <div class="cart__bar-item cart__bar-item--right cart__bar-item--right--order">
                    <p>Подтверждение заказа</p>
                </div>
            </div>
            <form name="checkout" method="post"  class="order__form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                <div class="order__body">
                    <div class="order__radios">
                        <input type="radio" id="radio1" name="radio1" value="Физическое лицо" checked><label for="radio1">Физическое лицо</label>
                        <input type="radio" id="radio2" name="radio1" value="Юридическое лицо"><label for="radio2">Юридическое лицо</label>
                    </div>
                    <div class="order__items">
                        <div id="orderItem1" class="order__item">
                            <h3>Данные ЮЛ</h3>
                            <div class="order__inputs">
                                <label for="imput1"> <p>Название<span>*</span></p><input type="text" id="input1" name="company"></label>
                                <label for="input2"><p>ИНН<span>*</span></p><input type="text" id="input2" name="inn"></label>
                                <label for="input3"><p>E-mail<span>*</span></p><input type="email" id="input3" name="email1"></label>
                                <p class="requisites">Прикрепить реквизиты</p>
                            </div>
                        </div>
                        <div id="orderItem2" class="order__item">
                            <h3>Контактные данные</h3>
                            <div class="order__inputs">
                                <label for="input4"><p>Имя<span>*</span></p><input type="text" id="input4" name="name1" required></label>
                                <label for="input5"><p>Фамилия<span>*</span></p><input type="text" id="input5" name="name2" required></label>
                                <label for="input6"><p>Телефон<span>*</span></p><input type="tel" id="input6" name="phone" required></label>
                                <label for="input7"><p>E-mail<span>*</span></p><input type="email" id="input7" name="email2" required></label>
                            </div>
                        </div>
                        <div id="orderItem3" class="order__item">
                            <h3>Способ оплаты</h3>
                            <div class="order__payments">
                                <label for="radio5"><input type="radio" id="radio5" name="radio3" value="Наличный расчёт" checked>&nbsp;&nbsp;&nbsp;Наличный расчёт</label>
                                <label for="radio6"><input type="radio" id="radio6" name="radio3" value="Безналичный расчёт">&nbsp;&nbsp;&nbsp;Безналичный расчёт</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order__body">
                    <div class="order__radios">
                        <input type="radio" id="radio3" name="radio2" value="Самовывоз" checked><label for="radio3">Самовывоз</label>
                        <input type="radio" id="radio4" name="radio2" value="Доставка"><label for="radio4">Доставка</label>
                    </div>
                    <p class="order__warning">Стоимость доставки рассчитывается индивидуально на этапе обработки Вашего заказа.</p>
                    <div class="order__items">
                        <div id="orderItem4" class="order__item">
                            <h3>Желаемая дата и время доставки</h3>
                            <div class="order__inputs">
                                <label for="input8">Дата<input type="text" id="input8" name="date"><i class="fa fa-calendar" aria-hidden="true"></i></i></label>
                                <label for="input9">Время<input type="text" id="input9" name="time"><i class="fa fa-clock-o" aria-hidden="true"></i></label>
                            </div>
                        </div>
                        <div id="orderItem5" class="order__item">
                            <h3>Адрес доставки</h3>
                            <div class="order__inputs">
                                <label for="input10"><p>Город<span>*</span></p><input type="text" id="input10" name="city"></label>
                                <label for="input11"><p>Улица<span>*</span></p><input type="text" id="input11" name="street"></label>
                            
                                <div class="order__item-row">
                                    <label for="input12"><p>Дом<span>*</span></p>&nbsp;&nbsp;<input type="text" id="input12" name="house"></label>
                                    <label for="input13">Корп.&nbsp;&nbsp;<input type="text" id="input13" name="corp"></label>
                                    <label for="input14">Квартира&nbsp;&nbsp;<input type="text" id="input14" name="flat"></label>
                                </div>
                                <div class="order__item-row">
                                    <label for="input15">Этаж&nbsp;&nbsp;<input type="text" id="input15" name="floor"></label>
                                    <label for="input16">Домофон&nbsp;&nbsp;<input type="text" id="input16" name="speaker"></label>
                                </div>
                            </div>
                        </div>
						
						<?php if ( $checkout->get_checkout_fields() ) : ?>

							

							<div class="col2-set" id="customer_details">
								<div class="col-1">
								
									<?php do_action( 'woocommerce_checkout_billing' ); ?>
									
								</div>

								<div class="col-2">
									<?php do_action( 'woocommerce_checkout_shipping' ); ?>
								</div>
							</div>

							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

						<?php endif; ?>

                        <div id="orderItem6" class="order__item">
						
						<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                            
							<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
							
                            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
							
							<div id="order_review" class="order__inputs">
                                <table>
                                    <tr>
                                        <td>Итого:</td>
                                        <td><?php wc_cart_totals_order_total_html(); ?> р.</td>
                                    </tr>
                                    <tr>
                                        <td>Товаров:</td>
                                        <td><?php echo WC()->cart->get_cart_contents_count(); ?> шт.</td>
                                    </tr>
                                </table>
								
							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
								
                            </div>
							
							<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
							
                        </div>
                    </div>
                    <p class="order__remark">* поля обязательные для заполнения</p>
					<label for="input17" class="order__checkbox-label"><input type="checkbox" id="input17" value="" required>&nbsp;&nbsp;С условиями&nbsp;<a href="/develop/politika-konfidentsialnosti/">политики конфиденциальности</a>&nbsp;ознакомлен</label>
                </div>
            </form>
			
			<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
			
        </div>
    </div>

