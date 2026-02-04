<section class="our-products__section">
    <div class="container">
        <h2 class="title2">Изделия из нашего металла</h2>
        <div class="our_products__inner flex justify-between align-stretch">
            <div class="our_products__inner__slider">
                <?php
                if ($prods_slides = carbon_get_theme_option('crb_our_prods')) {
                ?>
                    <div class="our-products__section__slider">
                        <?php
                        foreach ($prods_slides as $prod_slide) {
                            $slide_img = wp_get_attachment_image_url($prod_slide['crb_our_prods_img'], 'full');
                        ?>
                            <div class="our-products__section__slider__item">
                                <img class="our_products__img" src="<?php echo $slide_img; ?>" alt="Продукция из металла Муравейник">

                            </div>

                        <?php
                        }

                        ?>
                    </div>

                <?php
                }
                ?>
                <div class="our-products__controls flex justify-between">
                    <div class="our-prods-slider-prev">
                        <svg width="19" height="32" viewBox="0 0 19 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 30L3 16L17 2" stroke="#23C229" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="our-prods-slider-next">
                        <svg width="19" height="32" viewBox="0 0 19 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 30L16 16L2 2" stroke="#23C229" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="our_products__inner__content">
                <?php
                if ($our_prods_text = carbon_get_theme_option('crb_our_prods_text')) {
                    echo $our_prods_text;
                }
                ?>
            </div>
        </div>
    </div>
</section>