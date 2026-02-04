<section class="contact-us">
    <div class="container">
        <div class="contact-us__inner">
            <div class="contact-us__content">
                <h2 class="title2">Мы на связи</h2>
                <ul class="contact-us__list">
                    <li class="contact-us__list__item">
                        <span>подскажем по ассортименту и наличию металла</span>

                    </li>
                    <li class="contact-us__list__item">
                        <span>поможем рассчитать заказ</span>

                    </li>
                    <li class="contact-us__list__item">
                        <span>сориентируем по срокам доставки</span>
                    </li>

                </ul>
            </div>
            <div class="contact-us__links">

                <?php
                if ($phone_link = carbon_get_theme_option('tel_contact_link')) {
                ?>
                    <div class="contact-us__links__item">
                        <a href="tel:<?php echo $phone_link; ?>">
                            <?php
                            if ($phone_link_icon = carbon_get_theme_option('tel_contact_link_icon')) {
                                echo '<img class="contact-link__img" width="25" height="25" src="' . wp_get_attachment_image_url($phone_link_icon) . '" alt="" >';
                            }
                            ?>
                            <span class="link-span"><?php echo carbon_get_theme_option('tel_contact_link'); ?></span></a>
                    </div>

                <?php
                }
                ?>

                <?php
                if ($email_link = carbon_get_theme_option('mail_contact_link')) {
                ?>
                    <div class="contact-us__links__item">
                        <a href="<?php echo $email_link; ?>">
                            <?php
                            if ($email_link_icon = carbon_get_theme_option('mail_contact_link_icon')) {
                                echo '<img class="contact-link__img" width="25" height="25" src="' . wp_get_attachment_image_url($email_link_icon) . '" alt="" >';
                            }
                            ?>
                            <span class="link-span">Написать на почту</span></a>
                    </div>

                <?php
                }
                ?>

                <?php
                if ($contacts = carbon_get_theme_option('contacts')) {
                ?>

                    <?php
                    foreach ($contacts as $contact) {
                    ?>
                        <div class="contact-us__links__item">
                            <a href="<?php echo $contact['contact_link']; ?>" class="social__link">
                                <?php
                                $thumb_contact = wp_get_attachment_image_url($contact['contact_image'], 'full');
                                ?>
                                <img class="contact-link__img" width="25" height="25" src="<?php echo $thumb_contact; ?>" alt="<?php echo $contact['contact_name']; ?>">
                                <span class="link-span"><?php echo $contact['contact_name']; ?></span></a>
                            </a>
                        </div>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>