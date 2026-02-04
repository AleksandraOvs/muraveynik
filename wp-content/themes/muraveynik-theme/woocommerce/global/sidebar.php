<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//get_sidebar( 'shop' );
?>
<div class="sidebar__catalog">
    <h3><a href="<?php echo site_url('catalog') ?>">Каталог</a></h3>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-catalog',
					'container' => false,
					'menu_class' => 'sidebar__menu',
					'walker'          => new My_Walker_Nav_Menu(),
					'depth'           => 5,
				)
			);
		?>
</div>
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
