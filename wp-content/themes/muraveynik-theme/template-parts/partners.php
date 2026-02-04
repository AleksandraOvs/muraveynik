<?php
$title       = carbon_get_post_meta(get_the_ID(), 'crb_partners_text');
$description = carbon_get_post_meta(get_the_ID(), 'crb_partners_description');
$partners    = carbon_get_post_meta(get_the_ID(), 'crb_partners_list');
?>

<section class="partners">
    <div class="container">



        <div class="partners__inner">
            <div class="partners__inner__content">
                <?php if ($title) : ?>
                    <h2 class="title2 partners__title">
                        <?php echo apply_filters('the_content', $title); ?>
                    </h2>

                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="partners__description">
                        <?php echo apply_filters('the_content', $description); ?>
                    </div>
                <?php endif; ?>
            </div>


            <?php if ($partners) : ?>
                <div class="partners__list js-partners-slider">

                    <?php foreach ($partners as $item) :
                        $img_id = $item['partners_list_item_img'] ?? '';
                        $sign   = $item['partners_list_item_sign'] ?? '';
                    ?>
                        <div class="partners__item">

                            <?php if ($img_id) : ?>
                                <div class="partners__logo">
                                    <?php echo wp_get_attachment_image($img_id, 'medium'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($sign) : ?>
                                <div class="partners__sign">
                                    <?php echo $sign; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    jQuery(function($) {
        const $slider = $('.js-partners-slider');
        const items = $slider.children('.partners__item');

        for (let i = 0; i < items.length; i += 10) {
            items.slice(i, i + 10).wrapAll('<div class="partners-slide"></div>');
        }

        $slider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: true
        });
    });
</script>

<style>
    .js-partners-slider .slick-slide {
        height: auto;
    }

    .js-partners-slider .partners__item {
        height: 100%;
        box-sizing: border-box;
    }
</style>