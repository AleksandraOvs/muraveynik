<?php
/**
 * muraveinik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package muraveinik
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'muraveinik_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function muraveinik_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on muraveinik, use a find and replace
		 * to change 'muraveinik' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'muraveinik', get_template_directory() . '/languages' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Header', 'muraveinik' ),
				'menu-2' => esc_html__( 'Footer', 'muraveinik' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'muraveinik_setup' );

/**
 * Woocommerce support
 */
function muraveinik_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'muraveinik_add_woocommerce_support' );

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function muraveinik_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'muraveinik' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'muraveinik' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'muraveinik_widgets_init' );

function muraveinik_widgets2_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar2', 'muraveinik' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'muraveinik' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'muraveinik_widgets2_init' );

/**
 * Enqueue scripts and styles.
 */
function muraveinik_scripts() {
	wp_enqueue_style( 'muraveinik-fancybox-styles', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'muraveinik-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	if( is_front_page() || is_product() || is_page(256) ) {
		wp_enqueue_style( 'muraveinik-owl-styles', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
	}
	if( is_checkout() ) {
		wp_enqueue_style( 'muraveinik-ui-styles', get_template_directory_uri() . '/assets/ui-lightness/jquery-ui-1.10.0.custom.min.css' );
		wp_enqueue_style( 'muraveinik-timepicker-styles', get_template_directory_uri() . '/assets/css/jquery.ui.timepicker.css' );
	}
	
	wp_enqueue_style( 'muraveinik-main', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( get_template_directory() . '/assets/css/style.css' ) );
	
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '', true );
    wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'muraveinik-fontawesome', 'https://use.fontawesome.com/c192ada680.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'muraveinik-fancybox-js', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'muraveinik-maskedinput-js', get_template_directory_uri() . '/assets/js/jquery.maskedinput.min.js', array(), _S_VERSION, true );
	
	if( is_front_page() || is_product() || is_page(256) ) {
		wp_enqueue_script( 'muraveinik-owl-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	}
	if( is_checkout() ) {
		wp_enqueue_script( 'muraveinik-ui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'muraveinik-timepicker-js', get_template_directory_uri() . '/assets/js/jquery.ui.timepicker.js', array(), _S_VERSION, true );
	}
	
	wp_enqueue_script( 'muraveinik-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), filemtime( get_template_directory() . '/assets/js/main.js' ), true );
	
	if(is_front_page()) {
		wp_enqueue_script( 'muraveinik-frontpage-js', get_template_directory_uri() . '/assets/js/front-page.js', array(), _S_VERSION, true );
	}
	if(is_product_category()) {
		wp_enqueue_script( 'muraveinik-catalog-js', get_template_directory_uri() . '/assets/js/catalog.js', array(), _S_VERSION, true );
	}
	if(is_cart()) {
		wp_enqueue_script( 'muraveinik-cart-js', get_template_directory_uri() . '/assets/js/cart.js', array(), _S_VERSION, true );
	}
	if( is_checkout() ) {
		wp_enqueue_script( 'muraveinik-checkout-js', get_template_directory_uri() . '/assets/js/checkout.js', array(), _S_VERSION, true );
	}
	if( is_product() ) {
		wp_enqueue_script( 'muraveinik-product-js', get_template_directory_uri() . '/assets/js/product.js', array(), _S_VERSION, true );
	}
	if( is_page(256) ) {
		wp_enqueue_script( 'muraveinik-contacts-js', get_template_directory_uri() . '/assets/js/contacts.js', array(), _S_VERSION, true );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'muraveinik_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Display product categorues
 */
require get_template_directory() . '/inc/product-categories.php';
require get_template_directory() . '/inc/product-categories-new.php';

/**
 * Woocommerce product settings
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'muraveinik_single_product_price', 'woocommerce_template_single_price', 10 );

add_action( 'muraveinik_single_product_cart', 'woocommerce_template_single_add_to_cart', 10 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_bestseller_flash', 10);
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20 );
add_action( 'woocommerce_after_shop_loop_item_title', 'muraveinik_product_keys_render', 5 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

function woocommerce_show_product_loop_bestseller_flash() {
	wc_get_template( 'loop/bestseller-flash.php' );
}

function muraveinik_product_keys_render() {
	wc_get_template( 'loop/product-keys.php' );
}

/**
 * Woocommerce cart settings
 */
add_filter( 'woocommerce_cart_item_name', 'show_sku_in_cart', 10, 3);
function show_sku_in_cart( $title, $values, $cart_item_key ) {

	// Получить артикул
	$product_sku = $values['data']->get_sku();

	// Вывести артикул на странице корзины магазина
	return $product_sku ? $title . '<p>' . sprintf('Артикул: %s', $product_sku . '</p>') : $title;

}

add_filter('woocommerce_show_page_title', create_function('$result', 'return false;'), 20);

add_filter('woocommerce_currency_symbol', 'woocommerce_set_rouble_symbol', 9999, 2);
 
function woocommerce_set_rouble_symbol( $currency_symbol, $currency_code ) {
	if( $currency_code === 'RUB' ) {
		return 'руб'; 
		
	}
	return $currency_symbol;
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 48;' ), 20 );
add_filter( 'woocommerce_cart_needs_payment', '__return_false' );

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
	
    $fields['billing']['billing_first_name']['required'] = false;
    $fields['billing']['billing_last_name']['required'] = false;
    $fields['billing']['billing_company']['required'] = false;
    $fields['billing']['billing_company']['label'] = 'Название';
    $fields['billing']['billing_email']['required'] = false;
    $fields['billing']['billing_email']['label'] = 'E-mail';
    $fields['billing']['billing_phone']['required'] = false;
    $fields['billing']['billing_address_1']['required'] = false;
    $fields['billing']['billing_address_1']['label'] = 'ИНН';
    $fields['billing']['billing_address_2']['label'] = 'Форма оплаты';
	
	$fields['shipping']['shipping_first_name']['required'] = false;
	$fields['shipping']['shipping_first_name']['label'] = 'Дата';
	$fields['shipping']['shipping_last_name']['required'] = false;
	$fields['shipping']['shipping_last_name']['label'] = 'Время';
	$fields['shipping']['shipping_company']['required'] = false;
	$fields['shipping']['shipping_company']['label'] = 'Город';
	$fields['shipping']['shipping_company']['required'] = false;
	$fields['shipping']['shipping_address_1']['label'] = 'Улица';
	$fields['shipping']['shipping_address_1']['required'] = false;
	$fields['shipping']['shipping_address_2']['label'] = 'Дом';
	$fields['shipping']['shipping_address_2']['required'] = false;
	$fields['shipping']['shipping_city']['label'] = 'Корпус';
	$fields['shipping']['shipping_city']['required'] = false;
	$fields['shipping']['shipping_postcode']['label'] = 'Квартира';
	$fields['shipping']['shipping_postcode']['required'] = false;
	$fields['shipping']['shipping_state']['label'] = 'Этаж';
	$fields['shipping']['shipping_state']['required'] = false;
	
	unset($fields['order']['order_comments']);
	
    return $fields;
}

/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {
		
		woocommerce_form_field( 'doorphone', array(
        'type'          => 'text',
        'class'         => '',
        'label'         => __('Doorphone'),
        'placeholder'   => __(''),
        ), $checkout->get_value( 'doorphone' ));
		
}

/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    if ( ! $_POST['doorphone'] )
       wc_add_notice( __( 'Please enter something into this new shiny field.' ), 'success' );
	
}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
	
	if ( ! empty( $_POST['doorphone'] ) ) {
        update_post_meta( $order_id, 'Doorphone', sanitize_text_field( $_POST['doorphone'] ) );
    }
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
	echo ''.__('Doorphone').': ' . get_post_meta( $order->id, 'Doorphone', true ) . '';
}

/* To use: 
1. Add this snippet to your theme's functions.php file
2. Change the meta key names in the snippet
3. Create a custom field in the order post - e.g. key = "Tracking Code" value = abcdefg
4. When next updating the status, or during any other event which emails the user, they will see this field in their email
*/
add_filter('woocommerce_email_order_meta_keys', 'my_custom_order_meta_keys');

function my_custom_order_meta_keys( $keys ) {
     $keys[] = 'Tracking Code'; // This will look for a custom field called 'Tracking Code' and add it to emails
	 
     return $keys;
}

add_filter( 'woocommerce_catalog_orderby', 'remove_default_sort_by_date' );

function remove_default_sort_by_date( $array ){
	unset( $array['menu_order'] );
	unset( $array['popularity'] );
	unset( $array['date'] );

	return $array;
}

add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove current page links
 */
function no_link_current_page( $p ) {
return preg_replace( '%((current_page_item|current-menu-item)[^<]+)[^>]+>([^<]+)</a>%', '$1<a>$3</a>', $p, 1 );
}

add_filter ('wp_nav_menu', 'no_link_current_page');

/**
 * ACF Options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/**
 * Edit add-to-cart link
 */
add_filter('woocommerce_loop_add_to_cart_link', 'edit_woocommerce_loop_add_to_cart_link', 10, 3);
function edit_woocommerce_loop_add_to_cart_link($link, $product, $args) {
	if(!$product->is_in_stock()) {
		$link = sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] . ' button--not-in-stock' : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( 'Нет в наличии' )
		);
	}
	return $link;
}

/**
 * Change wp-mail heder name*/
add_filter( 'wp_mail_from_name', 'change_wp_mail_from_name' );

function change_wp_mail_from_name( $email_from ){
	return 'Муравейник';
}

/**
 * Enable XMLRPC
 */
add_filter('xmlrpc_enabled', '__return_false');
remove_action( 'wp_head', 'rsd_link' );
