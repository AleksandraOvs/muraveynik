<div class="header-front__top__working__address">
    <div class="header-front__top__working flex align-between">
        <?php
        if ($working_icon = carbon_get_theme_option('crb_working_icon')) {
            echo '<img class="header__work-icon" width="21" height="20" src="' . wp_get_attachment_image_url($working_icon) . '" alt="" >';
        }
        ?>
        <?php
        if ($working_info = carbon_get_theme_option('crb_working')) {
            echo '<p class="header__work-info">' . $working_info . '</p>';
        }
        ?>
    </div><!-- ./end of header__inner__working -->

    <div class="header-front__top__address flex align-between">
        <?php
        if ($address_icon = carbon_get_theme_option('crb_address_icon')) {
            echo '<img class="header__address-icon" width="21" height="20" src="' . wp_get_attachment_image_url($address_icon) . '" alt="" >';
        }
        ?>
        <?php
        if ($address = carbon_get_theme_option('crb_address')) {
            echo '<p class="header__address">' . $address . '</p>';
        }
        ?>
    </div> <!-- ./end of header__inner__address -->
</div> <!-- ./end of header__inner__working__address -->