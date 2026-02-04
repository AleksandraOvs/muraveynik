<section class="section-categories">
    <div class="container">
        <h2 class="title2">Каталог металлобазы</h2>

        <?php
        // 👉 Здесь указываешь нужные ID категорий в нужном порядке
        $category_ids = [53, 200, 187, 201, 213, 215];

        if (!empty($category_ids)) :
            echo '<div class="categories-list">';

            foreach ($category_ids as $term_id) {

                $term_obj = get_term($term_id, 'product_cat');
                if (!$term_obj || is_wp_error($term_obj)) continue;

                // Миниатюра категории WooCommerce
                $thumb_id = get_term_meta($term_id, 'thumbnail_id', true);
                $image = $thumb_id ? wp_get_attachment_image($thumb_id, 'medium') : '';

                // Ссылка на категорию
                $link = get_term_link($term_obj);
                if (is_wp_error($link)) continue;
        ?>

                <div class="categories__list__item">
                    <a class="main-category" href="<?php echo esc_url($link); ?>">
                        <?php echo $image; ?>
                        <h3 class="main-category-name"><?php echo esc_html($term_obj->name); ?></h3>
                    </a>
                </div>

        <?php
            }

            echo '</div>';
        endif;
        ?>

        <!-- <a class="button green catalog-button" href="<?php //echo site_url('catalog'); 
                                                            ?>">Посмотреть весь каталог</a> -->
    </div>
</section>