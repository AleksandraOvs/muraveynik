<?php

function muravey_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'muravey_add_woocommerce_support' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
add_filter( 'woocommerce_product_tabs', 'product_tab_characters', 25 );
add_filter( 'woocommerce_product_tabs', 'truemisha_rename_tabs', 25 );
 
function truemisha_rename_tabs( $tabs ) {

	$tabs[ 'additional_information' ][ 'title' ] = 'Похожие товары';
	return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'truemisha_remove_product_tabs', 25 );
 
function truemisha_remove_product_tabs( $tabs ) {
	//unset( $tabs[ 'description' ] ); // вкладка Описание
	//unset( $tabs[ 'reviews' ] ); // вкладка Отзывы
	unset( $tabs[ 'additional_information' ] ); // вкладка Детали
 
	return $tabs;
}


function product_tab_characters( $tabs ) {

    $tabs[ 'new_delivery_tab' ] = array(
		'title' 	=> 'Доставка',
		'priority' 	=> 25,
		'callback' 	=> 'new_tab_delivery_content'
	);

    $tabs[ 'new_pay_tab' ] = array(
		'title' 	=> 'Оплата',
		'priority' 	=> 25,
		'callback' 	=> 'new_tab_pay_content'
	);

	$tabs[ 'new_related_tab' ] = array(
		'title' 	=> 'Похожие товары',
		'priority' 	=> 25,
		'callback' 	=> 'new_tab_related_content'
	);
 
	return $tabs;
 
}

function new_tab_delivery_content() {
	if ($crb_checkout_info = carbon_get_theme_option('crb_checkout_info')){
	echo $crb_checkout_info;
	}
}

function new_tab_pay_content() {
	if ($crb_checkout_info = carbon_get_theme_option('crb_product_pay')){
	echo $crb_checkout_info;
	}
}

function new_tab_related_content() {
	require __DIR__ . '/woocommerce/single-product/related-products.php';
}


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/* Cart Quantity */

add_action( 'woocommerce_before_add_to_cart_quantity', 'theme_display_quantity_minus',10,2 );
function theme_display_quantity_minus(){
    echo
'<div class="cart__counter flex align-stretch justify-between">
<button type="button" class="cart__counter-prev counter-prev minus" >
</button>';
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'theme_display_quantity_plus',10,2 );
function theme_display_quantity_plus(){
    echo
	'<button type="button" class="cart__counter-next counter-next plus"></button>
	</div>';
}

// Скрыть категорию Uncategorized со страницы магазина
add_filter( 'get_terms', 'ts_get_subcategory_terms', 10, 3 );
function ts_get_subcategory_terms( $terms, $taxonomies, $args ) {
  $new_terms = array();
	if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() && is_front_page() ) {
		foreach( $terms as $key => $term ) {
			if ( !in_array( $term->slug, array( 'uncategorized' ) ) ) { //ваш слаг категории
				$new_terms[] = $term;
			}
		}
	$terms = $new_terms;
	}
	return $terms;
}

add_filter( 'get_terms', 'organicweb_exclude_category', 10, 3 );
function organicweb_exclude_category( $terms, $taxonomies, $args ) {
  $new_terms = array();
  // if a product category and on a page
  if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() && is_page() ) {
    foreach ( $terms as $key => $term ) {
// Enter the name of the category you want to exclude in place of 'uncategorised'
      if ( ! in_array( $term->slug, array( 'uncategorized' ) ) ) {
        $new_terms[] = $term;
      }
    }
    $terms = $new_terms;
  }
  return $terms;
}

//Вывод категорий
function get_categories_product($categories_list = '') {

	$get_categories_product = get_terms('product_cat', [
		'orderby' => 'name', // Поле для сортировки
		'order' => 'ASC', // Направление сортировки
		'hide_empty' => 1, // Скрывать пустые (1 - да, 0 - нет)
		'parent' => 0
	]);
		
	if(count($get_categories_product) > 0) {
		//echo '<div class="categories__slider">';
		foreach($get_categories_product as $categories_item) {
			$thumbnail_id = get_term_meta( $categories_item->term_id, 'thumbnail_id', true );
            $cat_image = wp_get_attachment_url( $thumbnail_id );
			$categories_list .= '

				<li class="categories__list__item catalog">
					<a class="categories__list__item__link" href="'
					. esc_url(get_term_link((int)$categories_item->term_id))
					. '">

					<img class="cat-list-img" src="'
					. $cat_image
					. '" alt=" '
					. $categories_item->name . ' ">
					</a>
					<a href="' .  esc_url(get_term_link((int)$categories_item->term_id)) . '"class="cat-list-name">'
					. $categories_item->name .
					'</a>
				</li>';
		}
		//echo '</div>';

	}

	return $categories_list;
		
}

//Удаляет количество в заголовках категорий
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
return;
}

// для страницы самого товара
add_filter( 'woocommerce_product_single_add_to_cart_text', 'truemisha_single_product_btn_text' );
 
function truemisha_single_product_btn_text( $text ) {
 
	if( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( get_the_ID() ) ) ) {
		$text = 'В корзине';
	}
 
	return $text;
 
}
 
// для страниц каталога товаров, категорий товаров и т д
add_filter( 'woocommerce_product_add_to_cart_text', 'truemisha_product_btn_text', 20, 2 );
 
function truemisha_product_btn_text( $text, $product ) {
 
	if( 
	   $product->is_type( 'simple' )
	   && $product->is_purchasable()
	   && $product->is_in_stock()
	   && WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) )
	) {
 
		$text = 'В корзине';
	}
	return $text;
}

/**
 * Woocommerce checkout settings
 */
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset ($fields['billing']['billing_address_1']);
	unset ($fields['billing']['billing_address_2']);
	unset ($fields['billing']['billing_company']);
	unset ($fields['billing']['billing_last_name']);
	
    //$fields['billing']['billing_first_name']['required'] = false;
    //$fields['billing']['billing_last_name']['required'] = false;
    //$fields['billing']['billing_company']['required'] = false;
    //$fields['billing']['billing_company']['label'] = 'Название';
    $fields['billing']['billing_email']['required'] = false;
    $fields['billing']['billing_email']['label'] = 'E-mail';
    //$fields['billing']['billing_phone']['required'] = false;
   // $fields['billing']['billing_address_1']['required'] = false;
   // $fields['billing']['billing_address_1']['label'] = 'ИНН';
   // $fields['billing']['billing_address_2']['label'] = 'Форма оплаты';
	
	// $fields['shipping']['shipping_first_name']['required'] = false;
	// $fields['shipping']['shipping_first_name']['label'] = 'Дата';
	// $fields['shipping']['shipping_last_name']['required'] = false;
	// $fields['shipping']['shipping_last_name']['label'] = 'Время';
	// $fields['shipping']['shipping_company']['required'] = false;
	// $fields['shipping']['shipping_company']['label'] = 'Город';
	// $fields['shipping']['shipping_company']['required'] = false;
	// $fields['shipping']['shipping_address_1']['label'] = 'Улица';
	// $fields['shipping']['shipping_address_1']['required'] = false;
	// $fields['shipping']['shipping_address_2']['label'] = 'Дом';
	// $fields['shipping']['shipping_address_2']['required'] = false;
	// $fields['shipping']['shipping_city']['label'] = 'Корпус';
	// $fields['shipping']['shipping_city']['required'] = false;
	// $fields['shipping']['shipping_postcode']['label'] = 'Квартира';
	// $fields['shipping']['shipping_postcode']['required'] = false;
	// $fields['shipping']['shipping_state']['label'] = 'Этаж';
	// $fields['shipping']['shipping_state']['required'] = false;
	
	unset($fields['order']['order_comments']);
	
    return $fields;
}

// Доп. поля в оформлении заказа


//адрес и время
add_action( 'woocommerce_checkout_after_customer_details', 'address_checkout_field' );

function address_checkout_field( $checkout ) {

    echo '<li class="customer_details-col"><h4>' . __('Адрес доставки') . '</h4>';

    woocommerce_form_field( 'del_address', array(
        'type'          => 'textarea',
        'class'         => array('my-field-class form-row-wide'),
        //'label'         => __('Fill in this field'),
        //'placeholder'   => __('Enter something'),
        ));

	echo '<h4>' . __('Желаемое время доставки') . '</h4>';

    woocommerce_form_field( 'del_time', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        //'label'         => __('Fill in this field'),
        //'placeholder'   => __('Enter something'),
        ));
	echo '</li>';
}

//варианты оплаты

add_action( 'woocommerce_checkout_before_customer_details', 'addit_fields', 25 );
 
function addit_fields() {
	echo '<h4>Оплата</h4>';
	woocommerce_form_field( 'payments_vars', array(
		'type'          => 'radio',
		'options'		=> array ("Водителю во время доставки" => 'Водителю во время доставки',
									"Расчет в магазине" => 'Расчет в магазине',
									"Со счета ЮЛ" =>'Со счета ЮЛ'),
		'class'         => array( 'form-row' ),
		'label_class'   => array( 'woocommerce-form__label-for-checkbox' ),
		'input_class'   => array( 'woocommerce-form__input-checkbox' ),
		'required'      => true,
		//'label'         => 'Принимаю <a href="' . get_privacy_policy_url() . '">Политику конфиденциальности</a>',
	));

	
}

//комментарий к заказу

add_action( 'woocommerce_checkout_before_order_review', 'order_comment_field' );
function order_comment_field( $checkout ) {
echo '<li class="customer_details-col"><h4>' . __('Комментарий к заказу') . '</h4>';
	woocommerce_form_field( 'order_comment', array(
        'type'          => 'textarea',
        'class'         => array('my-field-class form-row-wide'),
        //'label'         => __('Fill in this field'),
        //'placeholder'   => __('Enter something'),
        ));
	echo '</li>';
}

//отключаем параметры оплаты
add_filter( 'woocommerce_cart_needs_payment', 'woocommerce_disabled_payment' );
function woocommerce_disabled_payment() {
  return false;
}



add_action( 'woocommerce_checkout_update_order_meta', 'add_payment_option_to_order' , 10, 1);
function add_payment_option_to_order( $order_id ) {
    if ( isset( $_POST ['payments_vars'] ) &&  '' != $_POST ['payments_vars'] ) {
        update_post_meta( $order_id, '_payments_vars_option',  sanitize_text_field( $_POST ['payments_vars'] ) );
	}
}

add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );
function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['del_address'] ) ) {
        update_post_meta( $order_id, '_delivery_address', sanitize_text_field( $_POST['del_address'] ) );
    }
	if ( ! empty( $_POST['del_time'] ) ) {
        update_post_meta( $order_id, '_delivery_time', sanitize_text_field( $_POST['del_time'] ) );
    }
}

add_action( 'woocommerce_checkout_update_order_meta', 'comment_checkout_field_update_order_meta' );
function comment_checkout_field_update_order_meta( $order_id ) {
	if ( ! empty( $_POST['order_comment'] ) ) {
        update_post_meta( $order_id, '_order_comment', sanitize_text_field( $_POST['order_comment'] ) );
    }
}

//проверка введен ли адрес
add_action('woocommerce_checkout_process', 'address_checkout_field_process');

function address_checkout_field_process() {
    // Проверяем, заполнено ли поле, если же нет, добавляем ошибку.
    if ( ! $_POST['del_address'] )
        wc_add_notice( __( 'Пожалуйста, введите адрес доставки.' ), 'error' );
}

//отображение полей в админке
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta($order) {

	
	
    echo '<p><strong>'.__('Вариант оплаты').':</strong> <br/>' . $pay_opt = get_post_meta( $order->get_id(), '_payments_vars_option', true ) . '</p>';
	echo '<p><strong>'.__('Адрес доставки').':</strong> <br/>' . get_post_meta( $order->get_id(), '_delivery_address', true ) . '</p>';
	echo '<p><strong>'.__('Желаемое время доставки').':</strong> <br/>' . get_post_meta( $order->get_id(), '_delivery_time', true ) . '</p>';
	echo '<p><strong>'.__('Комментарий').':</strong> <br/>' . get_post_meta( $order->get_id(), '_order_comment', true ) . '</p>';
}

//отображение полей в письме админу

add_filter( 'woocommerce_get_order_item_totals', 'truemisha_field_in_email', 25, 2 );
 
function truemisha_field_in_email( $rows, $order ) {
 
 	// удалите это условие, если хотите добавить значение поля и на страницу "Заказ принят"
	if( is_order_received_page() ) {
		return $rows;
	}
 
	$rows[ '_payments_vars_option' ] = array(
		'label' => 'Выбранный вариант оплаты',
		'value' => get_post_meta( $order->get_id(), '_payments_vars_option', true )
	);
	
	return $rows;
 
}


add_action( 'woocommerce_email_order_meta', 'misha_add_email_order_meta', 10, 3 );

function misha_add_email_order_meta( $order, $sent_to_admin, $plain_text ){

	// ok, if it is the gift order, get all the other fields
	$del_address = esc_html( $order->get_meta( '_delivery_address' ) );
	$del_time = esc_html( $order->get_meta( '_delivery_time' ) );
	$order_comment = esc_html( $order->get_meta( '_order_comment' ) );
	$value =  htmlspecialchars ($_POST ['payments_vars']);


	// ok, we will add the separate version for plaintext emails
	if ( false === $plain_text ) {

		// you shouldn't have to worry about inline styles, WooCommerce adds them itself depending on the theme you use
		?>
			<h2>Сведения о заказе:</h2>
			<ul>
				<li><strong>Адрес доставки:</strong> <?php echo $del_address ?></li>
				<li><strong>Желаемое время доставки:</strong> <?php echo $del_time ?></li>
				<li><strong>Комментарий:</strong> <?php echo $order_comment ?></li>
				<li><strong>Комментарий:</strong> <?php echo $value ?></li>
			</ul>
		<?php
	
	} else {

		echo "\nСведения о заказе:\n"
		. "Адрес доставки: $del_address\n"
		. "Время доставки: $del_time\n"
		. "Комментарий: $order_comment\n";

	}

}

//прикрепить файл
add_action( 'woocommerce_checkout_before_customer_details', 'genius_checkout_file_upload' );
 
function genius_checkout_file_upload() {
   echo '<p class="form-row"><input type="file" id="appform" name="appform" accept=".pdf" required><input type="hidden" name="appform_field" /></p>';
   wc_enqueue_js( "
      $( '#appform' ).change( function() {
         if ( this.files.length ) {
            const file = this.files[0];
            const formData = new FormData();
            formData.append( 'appform', file );
            $.ajax({
               url: wc_checkout_params.ajax_url + '?action=appformupload',
               type: 'POST',
               data: formData,
               contentType: false,
               enctype: 'multipart/form-data',
               processData: false,
               success: function ( response ) {
                  $( 'input[name=\"appform_field\"]' ).val( response );
               }
            });
         }
      });
   " );
}
 
add_action( 'wp_ajax_appformupload', 'genius_appformupload' );
add_action( 'wp_ajax_nopriv_appformupload', 'genius_appformupload' );
 
function genius_appformupload() {
   global $wpdb;
   $uploads_dir = wp_upload_dir();
   if ( isset( $_FILES['appform'] ) ) {
      if ( $upload = wp_upload_bits( $_FILES['appform']['name'], null, file_get_contents( $_FILES['appform']['tmp_name'] ) ) ) {
         echo $upload['url'];
      }
   }
   die;
}
 
add_action( 'woocommerce_checkout_update_order_meta', 'genius_save_new_checkout_field' );
   
function genius_save_new_checkout_field( $order_id ) { 
   if ( ! empty( $_POST['appform_field'] ) ) {
      update_post_meta( $order_id, '_application', $_POST['appform_field'] );
   }
}
   
add_action( 'woocommerce_admin_order_data_after_billing_address', 'genius_show_new_checkout_field_order', 10, 1 );
    
function genius_show_new_checkout_field_order( $order ) {    
   $order_id = $order->get_id();
   if ( get_post_meta( $order_id, '_application', true ) ) echo '<p><strong>Application PDF:</strong> <a href="' . get_post_meta( $order_id, '_application', true ) . '" target="_blank">' . get_post_meta( $order_id, '_application', true ) . '</a></p>';
}
  
add_action( 'woocommerce_email_after_order_table', 'genius_show_new_checkout_field_emails', 20, 4 );
   
function genius_show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( $sent_to_admin && get_post_meta( $order->get_id(), '_application', true ) ) echo '<p><strong>Application Form:</strong> ' . get_post_meta( $order->get_id(), '_application', true ) . '</p>';
}

add_filter( 'woocommerce_order_button_text', 'truemisha_order_button_text' );
 
function truemisha_order_button_text( $button_text ) {
	return 'Отправить заказ';
}

add_filter( 'woocommerce_get_availability', 'my_woocommerce_get_availability' );

function my_woocommerce_get_availability( $availability ) {
	if ( $availability['class'] == 'available-on-backorder' ) {
		$availability['availability'] = 'Под заказ';
	}
	return $availability;
}