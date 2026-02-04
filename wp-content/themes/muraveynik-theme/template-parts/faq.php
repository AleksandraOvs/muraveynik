<?php
$faqs = carbon_get_post_meta(get_the_ID(), 'crb_faq');

if (!empty($faqs)): ?>
    <section class="faq-section">
        <div class="container">
            <h2 class="title2">Популярные вопросы</h2>
        </div>
        <div class="fluid-container">
            <div class="container">

                <div class="faq-list">
                    <?php foreach ($faqs as $i => $faq): ?>
                        <div class="faq-item">
                            <button class="faq-question" data-faq="<?php echo $i; ?>">
                                <span class="faq-icon">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.856 24.192C11.472 24.192 11.12 24.08 10.8 23.856C10.512 23.632 10.368 23.344 10.368 22.992V12.816H1.056C0.768 12.816 0.512 12.688 0.288 12.432C0.096 12.144 0 11.84 0 11.52C0 11.2 0.096 10.912 0.288 10.656C0.512 10.368 0.768 10.224 1.056 10.224H10.368V1.2C10.368 0.848 10.512 0.56 10.8 0.336C11.12 0.112 11.488 0 11.904 0C12.288 0 12.624 0.112 12.912 0.336C13.232 0.56 13.392 0.848 13.392 1.2V10.224H22.656C22.944 10.224 23.184 10.368 23.376 10.656C23.6 10.912 23.712 11.2 23.712 11.52C23.712 11.84 23.6 12.144 23.376 12.432C23.184 12.688 22.944 12.816 22.656 12.816H13.392V22.992C13.392 23.344 13.232 23.632 12.912 23.856C12.624 24.08 12.272 24.192 11.856 24.192Z" fill="#23C229" />
                                    </svg>

                                </span>
                                <p><?php echo esc_html($faq['question']); ?></p>
                            </button>
                            <div class="faq-answer">
                                <?php echo $faq['answer'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php
            $slides = carbon_get_post_meta(get_the_ID(), 'crb_faq_slider');

            if ($slides) : ?>
                <div class="faq-slider">

                    <?php foreach ($slides as $slide) :
                        echo '<div class="faq-slider__item">';
                        $img_id = $slide['faq_img'];
                        if (!$img_id) continue;

                        echo wp_get_attachment_image($img_id, 'full');
                        echo '</div>';
                    endforeach; ?>

                </div>
            <?php endif; ?>

        </div>

        <script>
            jQuery(function($) {
                const $slider = $('.faq-slider');

                if (!$slider.length) return;

                $slider.slick({
                    slidesToShow: 1.2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    speed: 600,

                    responsive: [{
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1,
                                centerMode: false
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                                centerMode: true,
                                centerPadding: '0px',
                                dots: true
                            }
                        }
                    ]
                });

                // если нужен кастомный класс для центрального слайда
                $slider.on('afterChange', function() {
                    $('.faq-slider .slick-slide').removeClass('is-center');
                    $('.faq-slider .slick-center').addClass('is-center');
                });
            });
        </script>
    </section>
<?php endif; ?>