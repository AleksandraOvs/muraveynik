<section class="section-bestselling white-bg">
    <div class="container">
        <h2 class="title2">
            Популярные товары
        </h2>

        <?php
        global $product;
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 14,
            'meta_key' => 'total_sales',
            'orderby'        => 'rand',
        );
        $wc_query = new WP_Query($args);

        if ($wc_query->have_posts()): ?>
            <div class="section-bestselling__products__container">
                <!-- <div class="section-bestselling__products__arrows"> -->
                <div class="bs-slider-prev">
                    <svg width="209" height="387" viewBox="0 0 209 387" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.40952 182.88L183.402 4.37633C189.267 -1.46871 198.762 -1.45888 204.616 4.40656C210.466 10.2713 210.451 19.7716 204.586 25.6212L36.2474 193.501L204.592 361.379C210.457 367.23 210.472 376.724 204.622 382.59C201.688 385.53 197.843 387 193.998 387C190.163 387 186.333 385.54 183.403 382.62L4.40952 204.12C1.58498 201.31 -1.52588e-05 197.486 -1.52588e-05 193.501C-1.52588e-05 189.516 1.58952 185.696 4.40952 182.88Z" fill="#F99A30" />
                        <path d="M4.40952 182.88L183.402 4.37633C189.267 -1.46871 198.762 -1.45888 204.616 4.40656C210.466 10.2713 210.451 19.7716 204.586 25.6212L36.2474 193.501L204.592 361.379C210.457 367.23 210.472 376.724 204.622 382.59C201.688 385.53 197.843 387 193.998 387C190.163 387 186.333 385.54 183.403 382.62L4.40952 204.12C1.58498 201.31 -1.52588e-05 197.486 -1.52588e-05 193.501C-1.52588e-05 189.516 1.58952 185.696 4.40952 182.88Z" stroke="white" />
                    </svg>
                </div>
                <!-- </div>  -->
                <div class="section-bestselling__products">


                    <?php
                    while ($wc_query->have_posts()):
                        $wc_query->the_post();

                        $product = wc_get_product(get_the_ID());
                        if (!$product) continue;
                    ?>

                        <div class="section-bestselling__products__item">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo $product->get_image('woocommerce_thumbnail'); ?>
                            </a>

                            <p class="price">
                                <?php echo $product->get_price_html(); ?>
                            </p>

                            <p class="title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo esc_html($product->get_name()); ?>
                                </a>
                            </p>
                        </div>

                    <?php endwhile; ?>


                </div>
                <div class="bs-slider-next">
                    <svg width="209" height="387" viewBox="0 0 209 387" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M204.59 204.12L25.5975 382.624C19.733 388.469 10.2383 388.459 4.38362 382.593C-1.46651 376.729 -1.45139 367.228 4.41386 361.379L172.753 193.499L4.40787 25.6205C-1.45662 19.7702 -1.47174 10.2759 4.37764 4.41043C7.31253 1.47016 11.1574 1.95082e-06 15.0024 2.62309e-06C18.8374 3.29364e-06 22.6672 1.46033 25.5968 4.38019L204.59 182.88C207.415 185.69 209 189.514 209 193.499C209 197.484 207.41 201.304 204.59 204.12Z" fill="#F99A30" />
                        <path d="M204.59 204.12L25.5975 382.624C19.733 388.469 10.2383 388.459 4.38362 382.593C-1.46651 376.729 -1.45139 367.228 4.41386 361.379L172.753 193.499L4.40787 25.6205C-1.45662 19.7702 -1.47174 10.2759 4.37764 4.41043C7.31253 1.47016 11.1574 1.95082e-06 15.0024 2.62309e-06C18.8374 3.29364e-06 22.6672 1.46033 25.5968 4.38019L204.59 182.88C207.415 185.69 209 189.514 209 193.499C209 197.484 207.41 201.304 204.59 204.12Z" stroke="white" />
                    </svg>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>