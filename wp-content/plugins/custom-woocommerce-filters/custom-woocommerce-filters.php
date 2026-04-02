<?php
/*
Plugin Name: Custom WooCommerce Filters (Simplified)
Description: AJAX фильтр WooCommerce с авто-определением атрибутов (без числовых атрибутов)
Version: 2.4
Author: PurpleWeb
*/

if (!defined('ABSPATH')) exit;

/* ---------------------------------------------------
 * Подключение JS и CSS
 * --------------------------------------------------- */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'cwc-style',
        plugin_dir_url(__FILE__) . 'css/style.css'
    );

    wp_enqueue_script(
        'cwc-ajax-filters',
        plugin_dir_url(__FILE__) . 'js/admin-ajax.js',
        [],
        '2.4',
        true
    );

    wp_localize_script('cwc-ajax-filters', 'cwc_ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
});

/* ---------------------------------------------------
 * Диапазон цен
 * --------------------------------------------------- */
function cwc_get_category_price_range($category_id = 0)
{
    $args = ['status' => 'publish', 'limit' => -1];

    if ($category_id) {
        $args['tax_query'] = [[
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $category_id,
        ]];
    }

    $products = wc_get_products($args);
    $prices = [];

    foreach ($products as $product) {
        if ($product->is_type('variable')) {
            $prices[] = (float)$product->get_variation_price('min', true);
            $prices[] = (float)$product->get_variation_price('max', true);
        } else {
            $prices[] = (float)$product->get_price();
        }
    }

    if (!$prices) return [0, 100000];

    return [floor(min($prices)), ceil(max($prices))];
}

/* ---------------------------------------------------
 * Все атрибуты
 * --------------------------------------------------- */
function cwc_get_all_product_attributes()
{
    $taxes = wc_get_attribute_taxonomies();
    $out = [];
    foreach ($taxes as $tax) $out[] = 'pa_' . $tax->attribute_name;
    return $out;
}

/* ---------------------------------------------------
 * Очистка заголовка
 * --------------------------------------------------- */
function cwc_clean_title($title)
{
    return preg_replace('/^Товар\s*[:\-–—]?\s*/ui', '', $title);
}

/* ---------------------------------------------------
 * Рендер фильтра для всех атрибутов
 * --------------------------------------------------- */
function cwc_render_attribute_filter($taxonomy, $title, $current_cat_id = 0)
{
    $args = ['taxonomy' => $taxonomy, 'hide_empty' => true];

    // Если категория задана, получаем ID товаров в ней
    if ($current_cat_id) {
        $products = wc_get_products([
            'status' => 'publish',
            'limit'  => -1,
            'tax_query' => [[
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $current_cat_id,
            ]]
        ]);

        $product_ids = wp_list_pluck($products, 'id');
        if ($product_ids) $args['object_ids'] = $product_ids;
    }

    $terms = get_terms($args);
    if (!$terms || is_wp_error($terms)) return '';

    ob_start(); ?>
    <div class="single-sidebar-wrap">
        <h4 class="sidebar-title"><?php echo esc_html(cwc_clean_title($title)); ?></h4>
        <div class="sidebar-body">
            <ul class="sidebar-list" data-taxonomy="<?php echo esc_attr($taxonomy); ?>">
                <?php foreach ($terms as $term): ?>
                    <li>
                        <a href="#" class="filter-item" data-slug="<?php echo esc_attr($term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php
    return ob_get_clean();
}

/* ---------------------------------------------------
 * Фильтр цены
 * --------------------------------------------------- */
function cwc_render_price_filter()
{
    $current_cat_id = is_product_category() ? get_queried_object_id() : 0;
    list($min, $max) = cwc_get_category_price_range($current_cat_id);

    ob_start(); ?>
    <div class="single-sidebar-wrap price-filter-wrap">
        <h4 class="sidebar-title">Цена</h4>
        <div class="sidebar-body">
            <div class="price-range-wrap">
                <div class="range-inputs">
                    <div class="price-input"><span class="price-prefix">От</span><input type="number" id="min_price" value="<?php echo $min; ?>"></div>
                    <div class="price-input"><span class="price-prefix">До</span><input type="number" id="max_price" value="<?php echo $max; ?>"></div>
                </div>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

/* ---------------------------------------------------
 * Шорткод
 * --------------------------------------------------- */
function cwc_shop_filters_shortcode()
{
    $current_cat_id = is_product_category() ? get_queried_object_id() : 0;

    $filters = [];

    foreach (cwc_get_all_product_attributes() as $taxonomy) {
        if (!taxonomy_exists($taxonomy)) continue;
        $tax = get_taxonomy($taxonomy);
        $title = $tax->label ?? $taxonomy;
        $filters[] = cwc_render_attribute_filter($taxonomy, $title, $current_cat_id);
    }

    ob_start(); ?>
    <div class="sidebar-area-wrapper _filters" data-current-cat="<?php echo esc_attr($current_cat_id); ?>">
        <h3 class="filters-heading">Фильтры</h3>

        <?php echo cwc_render_price_filter(); ?>

        <div class="single-sidebar-wrap instock-filter-wrap">
            <div class="sidebar-body">
                <ul class="sidebar-list" data-taxonomy="instock_filter">
                    <li>
                        <a href="#" class="filter-item instock-filter" data-slug="instock"><span class="filter-checkbox"></span> Есть в наличии</a>
                    </li>
                </ul>
            </div>
        </div>

        <?php echo implode('', $filters); ?>

        <div class="cwc-filter-actions">
            <button id="cwc-apply-filters" class="cwc-apply-button">Применить</button>
            <button id="cwc-reset-filters" class="cwc-reset-button">Сбросить</button>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('shop_filters', 'cwc_shop_filters_shortcode');

/* ---------------------------------------------------
 * AJAX фильтрация товаров (одно значение на атрибут)
 * --------------------------------------------------- */
function cwc_filter_products_callback()
{
    $tax_query  = [];
    $meta_query = ['relation' => 'AND'];

    $debug = [
        'category' => $_POST['current_cat_id'] ?? 0,
        'filters'  => [],
        'price'    => [],
    ];

    // В наличии
    if (!empty($_POST['instock'])) {
        $meta_query[] = [
            'key'     => '_stock_status',
            'value'   => 'instock',
            'compare' => '='
        ];
    }

    // Обработка всех фильтров
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'filter_') !== 0) continue;
        if ($key === 'filter_current_cat_id') continue;

        $taxonomy = str_replace('filter_', '', $key);
        if (!taxonomy_exists($taxonomy)) continue;

        // берём только последнее выбранное значение
        $term = sanitize_text_field(is_array($value) ? end($value) : $value);

        $tax_query[] = [
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => [$term],
            'operator' => 'IN',
        ];

        $debug['filters'][$taxonomy] = $term;
    }

    // Фильтр по цене
    if (isset($_POST['min_price'], $_POST['max_price'])) {
        $min_price = floatval($_POST['min_price']);
        $max_price = floatval($_POST['max_price']);

        $meta_query[] = [
            'relation' => 'OR',
            [
                'key'     => '_price',
                'value'   => [$min_price, $max_price],
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC',
            ],
            [
                'key'     => '_min_variation_price',
                'value'   => $max_price,
                'compare' => '<=',
                'type'    => 'NUMERIC',
            ],
            [
                'key'     => '_max_variation_price',
                'value'   => $min_price,
                'compare' => '>=',
                'type'    => 'NUMERIC',
            ],
        ];

        $debug['price'] = [$min_price, $max_price];
    }

    // Категория
    if (!empty($_POST['current_cat_id'])) {
        $tax_query[] = [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => intval($_POST['current_cat_id']),
        ];
    }

    $query_args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => $tax_query ?: [],
        'meta_query'     => count($meta_query) > 1 ? $meta_query : [],
    ];

    $debug['query_args'] = $query_args;

    $query = new WP_Query($query_args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
    } else {
        echo '<p class="no-products">Товары не найдены</p>';
    }
    wp_reset_postdata();

    wp_send_json_success([
        'html'  => ob_get_clean(),
        'debug' => $debug
    ]);
}

add_action('wp_ajax_cwc_filter_products', 'cwc_filter_products_callback');
add_action('wp_ajax_nopriv_cwc_filter_products', 'cwc_filter_products_callback');
