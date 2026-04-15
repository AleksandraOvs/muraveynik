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
 * Рендер фильтра для всех атрибутов без заголовка
 * --------------------------------------------------- */
/* ---------------------------------------------------
 * Рендер фильтра атрибутов (единый поток)
 * --------------------------------------------------- */
function cwc_render_attribute_filter($taxonomy, $title, $current_cat_id = 0)
{
    $args = [
        'taxonomy'   => $taxonomy,
        'hide_empty' => true
    ];

    // Фильтрация по категории
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

        if (!empty($product_ids)) {
            $args['object_ids'] = $product_ids;
        }
    }

    $terms = get_terms($args);
    if (!$terms || is_wp_error($terms)) return '';

    ob_start();

    foreach ($terms as $term): ?>

        <div
            class="filter-item"
            data-taxonomy="<?php echo esc_attr($taxonomy); ?>"
            data-slug="<?php echo esc_attr($term->slug); ?>">
            <!-- <div class="filter-name">
                <?php //echo esc_html(cwc_clean_title($title)); 
                ?>
            </div> -->

            <div class="filter-value">
                <?php echo esc_html($term->name); ?>
            </div>
        </div>

    <?php endforeach;

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

        <?php //echo cwc_render_price_filter(); 
        ?>

        <div class="cwc-filter-params">
            <?php echo implode('', $filters); ?>
        </div>


        <div class="cwc-filter-actions">
            <div class="single-sidebar-wrap instock-filter-wrap">
                <div class="sidebar-body">
                    <ul class="sidebar-list" data-taxonomy="instock_filter">
                        <li>
                            <a href="#" class="filter-item instock-filter" data-slug="instock">
                                <span class="filter-checkbox">
                                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.17202 10.162L1.70202 6.69202C1.51504 6.50504 1.26145 6.4 0.99702 6.4C0.732594 6.4 0.478998 6.50504 0.292021 6.69202C0.105043 6.879 0 7.13259 0 7.39702C0 7.52795 0.0257889 7.6576 0.0758939 7.77856C0.125999 7.89953 0.199439 8.00944 0.292021 8.10202L4.47202 12.282C4.86202 12.672 5.49202 12.672 5.88202 12.282L16.462 1.70202C16.649 1.51504 16.754 1.26145 16.754 0.997021C16.754 0.732594 16.649 0.478998 16.462 0.292021C16.275 0.105043 16.0214 0 15.757 0C15.4926 0 15.239 0.105043 15.052 0.292021L5.17202 10.162Z" fill="#fff" />
                                    </svg>

                                </span> Есть в наличии</a>
                        </li>
                    </ul>
                </div>
            </div>
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

    // Обработка фильтров
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'filter_') !== 0) continue;
        if ($key === 'filter_current_cat_id') continue;

        $taxonomy = str_replace('filter_', '', $key);
        if (!taxonomy_exists($taxonomy)) continue;

        $term = sanitize_text_field(is_array($value) ? end($value) : $value);
        $term = urldecode($term);

        $tax_query[] = [
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => [$term],
            'operator' => 'IN',
        ];

        $debug['filters'][$taxonomy] = $term;
    }

    // Цена
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

    // 🔥 текущая страница (на будущее для infinite scroll)
    $paged = isset($_POST['paged']) ? max(1, intval($_POST['paged'])) : 1;

    $query_args = [
        'post_type'      => 'product',
        'posts_per_page' => 12, // важно: НЕ -1
        'paged'          => $paged,
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

    $html = ob_get_clean();

    wp_reset_postdata();

    wp_send_json_success([
        'html'       => $html,
        'max_pages'  => $query->max_num_pages, // 🔥 КЛЮЧЕВОЕ ДЛЯ FIX SCROLL
        'paged'      => $paged,
        'debug'      => $debug
    ]);
}

add_action('wp_ajax_cwc_filter_products', 'cwc_filter_products_callback');
add_action('wp_ajax_nopriv_cwc_filter_products', 'cwc_filter_products_callback');
