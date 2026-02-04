<?php
// Получаем ID текущей записи
$post_id = get_the_ID();

// Основные поля
$advs_head = carbon_get_post_meta($post_id, 'crb_advs_head');
$advs_img  = carbon_get_post_meta($post_id, 'crb_advs_img');

// Список преимуществ (complex)
$advs_items = carbon_get_post_meta($post_id, 'crb_advs_items');
?>

<section class="section-advantages" id="advantages">
    <div class="container">

        <?php if ($advs_head): ?>
            <h2 class="title"><?php echo $advs_head ?></h2>
        <?php endif; ?>



        <?php if ($advs_items): ?>

            <div class="section-advantages__list">
                <?php foreach ($advs_items as $item):
                    $item_head = $item['crb_adv_item_head'] ?? '';
                    $item_desc = $item['crb_adv_item_desc'] ?? '';
                    $item_icon = $item['crb_adv_item_icon'] ?? '';
                ?>
                    <div class="section-advantages__item">
                        <?php if ($item_icon): ?>
                            <div class="section-advantages__icon">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($item_icon, 'full')); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <div class="section-advantages__item__text">
                            <?php if ($item_head): ?>
                                <h3 class="section-advantages__item-title">
                                    <?php echo $item_head ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ($item_desc): ?>
                                <p class="section-advantages__item-desc">
                                    <?php echo $item_desc ?>
                                </p>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </div>
    </div>
</section>