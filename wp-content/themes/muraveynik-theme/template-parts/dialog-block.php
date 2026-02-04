<?php
if ($dialog_id = carbon_get_theme_option('crb_dialog_img')) {
    $slide_url = wp_get_attachment_image_url($dialog_id, 'full');
    //echo '<img src="' . $slide_url . '" alt="Муравейник город Клин Металлобаза">';
}
?>
<section class="dialog-section" style="background-image: url(<?php echo $slide_url ?>); background-repeat:no-repeat;">
    <div class="container flex align-end justify-between">

        <div class="dialog-section__text">
            <?php
            if ($dialog_text = carbon_get_theme_option('crb_dialog_text')) {
                echo $dialog_text;
            }
            ?>
            <?php if ($dialog_buttons = carbon_get_theme_option('crb_dialog_buttons')) {
            ?>
                <ul class="dialog-section_text_buttons flex justify-between align-stretch">
                    <?php foreach ($dialog_buttons as $dialog_button) {
                    ?>
                        <li class="dialog-buttons__item">
                            <a class="button green" href="<?php echo $dialog_button[('crb_dialog_button_link')] ?>">
                                <?php
                                $dialog_link_img = $dialog_button[('crb_dialog_button_img')];
                                $dialog_link_url = wp_get_attachment_image_url($dialog_link_img, 'full');
                                ?>
                                <div class="dialog-buttons__item__img">
                                    <img src="<?php echo $dialog_link_url; ?>" alt="">
                                </div>
                                <span><?php echo $dialog_button[('crb_dialog_button_link_text')] ?></span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="dialog-buttons__item">

                        <a href="#modalCallback" class="button green" data-fancybox>
                            <div class="dialog-buttons__item__img">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icon/phone.svg">
                            </div>
                            <span>Оставить заявку</span>
                        </a>

                    </li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</section>