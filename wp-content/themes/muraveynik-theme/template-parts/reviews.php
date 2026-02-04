<?php if (function_exists('carbon_get_post_meta')): ?>
    <?php $reviews = carbon_get_post_meta(get_the_ID(), 'crb_rw_list'); ?>
    <?php if (!empty($reviews)): ?>
        <section class="rw-section">
            <div class="container">
                <h2>Отзывы о Муравейнике</h2>

                <div class="js-reviews-slider">
                    <?php foreach ($reviews as $review): ?>
                        <div class="review-slide">
                            <?php
                            $rw_img = wp_get_attachment_image_url($review['crb_rw_img'], 'full');
                            ?>
                            <img src="<?php echo $rw_img ?>" alt="Отзывы Муравейник">

                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="https://yandex.ru/maps/org/166946266983/reviews/?add-review=true" class="button orange">Оставить отзыв на Яндексе</a>

                <script>
                    jQuery(function($) {
                        $('.js-reviews-slider').slick({
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            //centerPadding: '0px',
                            arrows: true,
                            centerMode: true,
                            dots: true,
                            infinite: true,
                            // autoplay: true,
                            // autoplaySpeed: 5000,

                            // responsive: [{
                            //     breakpoint: 768,
                            //     settings: {
                            //         slidesToShow: 3,
                            //         dots: true,
                            //         centerPadding: '0px'
                            //     }
                            // }],
                            responsive: [{
                                breakpoint: 768,
                                //centerPadding: '0px',
                                centerMode: true,
                                settings: {
                                    slidesToShow: 1,
                                    dots: true,
                                }
                            }]
                        });
                    });
                </script>
            <?php endif; ?>
            </div>
        </section>

    <?php endif; ?>