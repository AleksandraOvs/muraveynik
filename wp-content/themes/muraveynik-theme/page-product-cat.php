<?php
/*
    Template name: Страница категорий (каталог)
*/
?>

<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//
?>
<?php get_header() ?>

<section class="woocommerce-template">
	<div class="container">
		<div class="breadcrumbs">	
            <?php $args = array(
				'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
				);
				woocommerce_breadcrumb( $args ); 
			?>
        </div>
		
		<h2>
			<?php echo single_cat_title();?>
		</h2>
		<div class="woocommerce-template__content flex align-start justify-between query-categories">
            <?php do_action( 'woocommerce_sidebar' ); ?>
			
		</div>
		

	</div>
</section>

<?php get_footer() ?>
