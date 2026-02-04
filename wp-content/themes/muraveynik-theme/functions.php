<?php

/**
 * muraveinik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package muraveinik
 */

// use Carbon_Fields\Container;
// use Carbon_Fields\Field;

// add_action('carbon_fields_register_fields', 'crb_register_custom_fields');

// function crb_register_custom_fields()
// {
// 	require_once __DIR__ . '/../../plugins/carbon-fields/theme-options.php';
// 	require_once __DIR__ . '/../../plugins/carbon-fields/post-meta.php';
// }

require get_stylesheet_directory() . '/functions-wc.php';


if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (! function_exists('muraveinik_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function muraveinik_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on muraveinik, use a find and replace
		 * to change 'muraveinik' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('muraveinik', get_template_directory() . '/languages');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Header', 'muraveynik'),
				'menu-2' => esc_html__('Footer', 'muraveynik'),
				'menu-catalog' => esc_html__('Catalog', 'muraveynik'),
				'menu-mobile' => esc_html__('Mobile', 'muraveynik'),
				'woo-catalog' => esc_html__('Woo-sidebar', 'muraveynik'),
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
add_action('after_setup_theme', 'muraveinik_setup');

function site_scripts()
{
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
	wp_enqueue_style('fancy-style', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), time());
	wp_enqueue_style('slick-style', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), time());
	wp_enqueue_style('add-styles', get_stylesheet_directory_uri() . '/assets/css/add-styles.css', array(), time());

	wp_enqueue_script('jquery-ui-autocomplete');
	wp_register_script('trueajax', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array('jquery', 'jquery-ui-autocomplete'), time(), true);
	wp_localize_script(
		'trueajax',
		'searching',
		array(
			'ajax_url' => admin_url('admin-ajax.php')
		)
	);
	wp_enqueue_script('trueajax');

	wp_style_add_data('theme-style', 'rtl', 'replace');
	wp_enqueue_script('muraveinik-maskedinput-js', get_template_directory_uri() . '/assets/js/jquery.maskedinput.min.js', array(), _S_VERSION, true);

	wp_enqueue_script('nice-select-js', get_stylesheet_directory_uri() . '/assets/nice-select/jquery.nice-select.js', array('jquery'), null, true);

	wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
	wp_enqueue_script('header-scripts', get_stylesheet_directory_uri() . '/assets/js/header.js', array('jquery'), null, true);
	wp_enqueue_script('validate-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array(), _S_VERSION, true);
	wp_enqueue_script('muravey-theme-slider-js', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('muravey-slider-js', get_stylesheet_directory_uri() . '/assets/js/product-image.js', array('jquery'), null, true);

	if (is_page('oformlenie-zakaza')) {
		wp_enqueue_script('js-accordion-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), null, true);
		wp_enqueue_script('js-accordion', get_stylesheet_directory_uri() . '/assets/js/accordion.js', array('jquery'), null, true);
	};

	wp_enqueue_script('muravey-theme-inputmask-js', get_stylesheet_directory_uri() . '/assets/inputmask.min.js', array('jquery'), null, true);
	wp_enqueue_script('muravey-theme-inputmask-script', get_stylesheet_directory_uri() . '/assets/inputmask.js', array('jquery'), null, true);

	add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

	wp_enqueue_style('theme-styles', get_stylesheet_directory_uri(), array(), time());

	wp_enqueue_style('nice-select-style', get_stylesheet_directory_uri() . '/assets/nice-select/nice-select.css', array(), time());
	wp_enqueue_style('theme-header-style', get_stylesheet_directory_uri() . '/assets/css/header.css', array(), time());
	wp_enqueue_style('theme-wc-style', get_stylesheet_directory_uri() . '/assets/css/wc-styles.css', array(), time());
	wp_enqueue_style('theme-add-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), time());

	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'site_scripts');

add_action('admin_enqueue_scripts', function () {

	wp_enqueue_style('my_wp_admin', get_template_directory_uri() . '/assets/css/wp-admin.css');
}, 99);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function muraveinik_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('WooCommerce сайдбар', 'muraveinik'),
			'id'            => 'woo-sidebar',
			'description'   => esc_html__('Add widgets here.', 'muraveinik'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar2', 'muraveinik'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Add widgets here.', 'muraveinik'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Сайдбар для вывода фильтра на странице shop', 'muraveinik'),
			'id'            => 'filter-sidebar',
			'description'   => esc_html__('Add widgets here.', 'muraveinik'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
}
add_action('widgets_init', 'muraveinik_widgets_init');

/**
 * Enqueue scripts and styles.
 */


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Woocommerce product settings
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//add_action( 'muraveinik_single_product_price', 'woocommerce_template_single_price', 10 );

//add_action( 'muraveinik_single_product_cart', 'woocommerce_template_single_add_to_cart', 10 );

//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

//add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_bestseller_flash', 10);
//add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20 );
//add_action( 'woocommerce_after_shop_loop_item_title', 'muraveinik_product_keys_render', 5 );

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

function woocommerce_show_product_loop_bestseller_flash()
{
	wc_get_template('loop/bestseller-flash.php');
}

/**
 * Change wp-mail heder name*/
add_filter('wp_mail_from_name', 'change_wp_mail_from_name');

function change_wp_mail_from_name($email_from)
{
	return 'Муравейник';
}

/**
 * Enable XMLRPC
 */
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');


function get_current_template($echo = false)
{
	if (!isset($GLOBALS['current_theme_template']))
		return false;
	if ($echo)
		echo $GLOBALS['current_theme_template'];
	else
		return $GLOBALS['current_theme_template'];
}

/* Register widget area. */

function muraveynik_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar-search-header', 'muraveynik'),
			'id'            => 'sidebar-search-header',
			'description'   => esc_html__(' Виджет для поиска', 'muraveynik'),
			'before_widget' => '<div id="%1$s" class="search-form">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Сайдбар в футере слева', 'muraveynik'),
			'id'            => 'sidebar-footer-left',
			'description'   => esc_html__('Ссылки', 'muraveynik'),
			'before_widget' => '<div id="%1$s" class="footer__widget-right">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Сайдбар в футере центр', 'muraveynik'),
			'id'            => 'sidebar-footer-center',
			'description'   => esc_html__('Ссылки', 'muraveynik'),
			'before_widget' => '<div id="%1$s" class="footer__widget-center">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Сайдбар в футере справа', 'muraveynik'),
			'id'            => 'sidebar-footer-right',
			'description'   => esc_html__('Ссылки', 'muraveynik'),
			'before_widget' => '<div id="%1$s" class="footer__widget-right">',
			'after_widget'  => '</div>',
		)
	);
}
add_action('widgets_init', 'muraveynik_widgets_init');


function my_customize_register($wp_customize)
{
	$wp_customize->add_setting('header_logo', array(
		'default' => '',
		'height' => '48',
		'width' => '118',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(

		'section' => 'title_tagline',
		'label' => 'Логотип Header'

	)));
	$wp_customize->add_setting('footer_logo', array(
		'default' => '',
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
		'section' => 'title_tagline',
		'label' => 'Логотип Footer'
	)));
}
add_action('customize_register', 'my_customize_register');

add_filter('get_search_form', 'my_search_form');
function my_search_form($form)
{
	$form = '
    <form role="search" class="search__form" action="' . esc_url(home_url('/')) . '">
        <label class="search__label">
            <input
                name="s"
                type="text"
                class="search__input title_third text__mobile_medium"
                placeholder="Поиск"
                autocomplete="off"
            >
            <button class="search__show" type="submit">
                <span class="sr-only">Кнопка поиска</span>
            </button>
        </label>
		<span class="close"></span>
        <div class="results"></div>
    </form>';

	return $form;
}

//поиск по сайту
add_action('wp_ajax_ajax_search', 'ajax_search_handler');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search_handler');

function ajax_search_handler()
{
	$query = sanitize_text_field($_POST['query'] ?? '');

	if (mb_strlen($query) < 2) {
		wp_send_json_error();
	}

	$args = [
		'post_type'      => 'product', // если нужны именно товары
		'posts_per_page' => -1,
		's'              => $query,
	];

	$search = new WP_Query($args);

	$total = (int) $search->found_posts;
	$search_url = esc_url(home_url('/?s=' . urlencode($query)));

	if (!$search->have_posts()) {
		wp_send_json_success(
			'<div class="result-empty">
				Ничего не найдено
			</div>'
		);
	}

	ob_start();

	echo '<ul class="results-list">';

	while ($search->have_posts()) {
		$search->the_post();
?>
		<li class="results-item">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</li>
	<?php
	}

	echo '</ul>';

	?>
	<div class="results-footer">
		<div class="results-count">
			Найдено: <?php echo $total; ?>
		</div>
		<a class="results-all" href="<?php echo $search_url; ?>">
			Показать все результаты
		</a>
	</div>
<?php

	wp_reset_postdata();

	wp_send_json_success(ob_get_clean());
}

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_script(
		'ajax-search',
		get_template_directory_uri() . '/assets/js/ajax.js',
		[],
		null,
		true
	);

	wp_localize_script('ajax-search', 'ajaxSearch', [
		'url' => admin_url('admin-ajax.php'),
	]);
});


//ajax-загрузка товаров

add_action('wp_ajax_loadmore', 'true_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'true_loadmore');

function true_loadmore()
{

	$paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
	$paged++;

	query_posts(array(
		'paged' => $paged
	));

	while (have_posts()) : the_post();
		echo wc_get_template_part('content', 'product');
	endwhile;

	die;
}



// свой класс построения меню:
class My_Walker_Nav_Menu extends Walker_Nav_Menu
{

	// add classes to ul sub-menus
	function start_lvl(&$output, $depth = 0, $args = NULL)
	{
		// depth dependent classes
		$indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
		$display_depth = ($depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			($display_depth % 2  ? 'menu-odd' : 'menu-even'),
			($display_depth >= 2 ? 'sub-sub-menu' : ''),
			'menu-depth-' . $display_depth
		);
		$class_names = implode(' ', $classes);

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
	{
		global $wp_query;

		// Restores the more descriptive, specific name for use within this method.
		$item = $data_object;

		$indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

		// depth dependent classes
		$depth_classes = array(
			($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
			($depth >= 2 ? 'sub-sub-menu-item' : ''),
			($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr(implode(' ', $depth_classes));

		// passed classes
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

		// build html
		$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
		$attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';

		$item_output = sprintf(
			'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters('the_title', $item->title, $item->ID),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

require get_template_directory() . '/inc/carbon-fields.php';
require get_template_directory() . '/inc/custom-pagination.php';
