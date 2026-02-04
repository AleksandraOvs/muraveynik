<section class="section-categories">
    <div class="container">
        <h2 class="title2">Каталог металлобазы</h2>

        <?php
        // Получаем выбранные категории для главной страницы
        $categories = carbon_get_post_meta(get_option('page_on_front'), 'crb_main_categories');

        if (!empty($categories)) :
            echo '<div class="categories-list">';
            foreach ($categories as $term) {
                // Получаем объект терма
                $term_id = $term['id'];
                $term_obj = get_term($term_id, 'product_cat');
                if (!$term_obj) continue;

                // Получаем миниатюру категории WooCommerce
                $thumb_id = get_term_meta($term_id, 'thumbnail_id', true);
                $image = $thumb_id ? wp_get_attachment_image($thumb_id, 'medium') : '';

                // Ссылка на страницу категории
                $link = get_term_link($term_obj);
        ?>
                <div class="categories__list__item">
                    <a class="main-category" href="<?php echo esc_url($link) ?>">
                        <?php echo $image; ?>
                        <h3 class="main-category-name"><?php echo esc_html($term_obj->name) ?></h3>
                    </a>

                </div>
        <?php
            }
            echo '</div>';
        endif;
        ?>


        <a class="button green catalog-button" href="<?php echo site_url('catalog') ?>">Посмотреть весь каталог</a>
    </div>
</section>