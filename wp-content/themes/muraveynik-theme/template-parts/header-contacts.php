<div class="header-front__top__contacts flex align-center justify-end">

    <div class="header-front__top__email">
        <?php
        if ($email_link = carbon_get_theme_option('mail_contact_link')) {
        ?>
            <a class="header__email-link flex align-center" href="<?php echo $email_link; ?>">
                <?php
                if ($email_link_icon = carbon_get_theme_option('mail_contact_link_icon')) {
                    echo '<img class="header__email-link__img" width="25" height="25" src="' . wp_get_attachment_image_url($email_link_icon) . '" alt="" >';
                }
                ?>
                <?php
                $email_link_text = carbon_get_theme_option('mail_contact') ?>
                <span class="link-span"><?php echo $email_link_text; ?></span></a>
        <?php
        }
        ?>
    </div><!-- ./end of header-front__top__phone -->

    <div class="header-front__top__phone">
        <?php
        if ($phone_link = carbon_get_theme_option('tel_contact_link')) {
        ?>
            <a class="header__phone-link flex align-center" href="tel:<?php echo $phone_link; ?>">
                <?php
                if ($phone_link_icon = carbon_get_theme_option('tel_contact_link_icon')) {
                    echo '<img class="header__phone-link__img" width="25" height="25" src="' . wp_get_attachment_image_url($phone_link_icon) . '" alt="" >';
                }
                ?>
                <span class="link-span"><?php echo $phone_link; ?></span></a>
        <?php
        }
        ?>
    </div><!-- ./end of header-front__top__phone -->

    <?php
    if ($contacts = carbon_get_theme_option('contacts')) {
    ?>
        <ul class="header-front__top__messengers">
            <?php
            foreach ($contacts as $contact) {
            ?>
                <li class="social__item">
                    <a href="<?php echo $contact['contact_link']; ?>" class="social__link">
                        <?php
                        $thumb_contact = wp_get_attachment_image_url($contact['contact_image'], 'full');
                        ?>
                        <img class="social__img" width="25" height="25" src="<?php echo $thumb_contact; ?>" alt="<?php echo $contact['contact_name']; ?>">
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
    }
    ?>


</div>