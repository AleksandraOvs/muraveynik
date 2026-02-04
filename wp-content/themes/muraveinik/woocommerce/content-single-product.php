<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

	<div id="product-<?php the_ID(); ?>">
		<section class="product">
			<div class="container">
				<div class="breadcrumbs breadcrumbs--product">
				<?php $args = array(
					'delimiter' => '<span>&nbsp;&nbsp;&#8250;&nbsp;&nbsp;</span>'
					);
					woocommerce_breadcrumb( $args ); 
				?>
				</div>
				<div class="product__body">
					<div class="product__left">
					
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>

					</div>
					<div class="product__right">
						<header class="product__right-header">
							<div>
							<?php
							/**
							 * Hook: woocommerce_single_product_summary.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 * @hooked WC_Structured_Data::generate_product_data() - 60
							 */
							do_action( 'woocommerce_single_product_summary' );
							 ?>
							
							<p class="product__origin">Страна производитель: <?php the_field('product__origin'); ?></p>
							</div>
							<div class="product__logo">
							<?php if( get_field('product__logo') ): ?>
								<img src="<?php the_field('product__logo'); ?>" alt="" />
							<?php endif; ?>
							</div>
						</header>
						<div class="product__right-center">
						
						<?php do_action( 'muraveinik_single_product_price' ); ?>
			
							<div class="product__socials">
								<p>Поделиться в соц.сетях</p>
								<div class="product__icons">
									<div class="product__icon"><a rel="nofollow" href="javascript: void(0)" onClick="window.open('https://vkontakte.ru/share.php?url=<?php echo bloginfo( 'url' ); echo $_SERVER['REQUEST_URI']; ?>','sharer','status=0,toolbar=0,width=650,height=500');"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-vk.png" alt=""></a></div>
									<div class="product__icon"><a rel="nofollow" href="javascript: void(0)" onClick="window.open('https://instagram.com/');"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-instagaram.png" alt=""></a></div>
									<div class="product__icon"><a rel="nofollow" href="javascript: void(0)" onClick="window.open('whatsapp://send?text=<?php echo bloginfo( 'url' ); echo $_SERVER['REQUEST_URI']; ?>');" data-action="share/whatsapp/share"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-whatsapp.png" alt=""></a></div>
									<div class="product__icon"><a rel="nofollow" href="javascript: void(0)" onClick="window.open('https://telegram.me/share/url?url=<?php echo bloginfo( 'url' ); echo $_SERVER['REQUEST_URI']; ?>','sharer','status=0,toolbar=0,width=650,height=500');"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-viber.png" alt=""></a></div>
								</div>
							</div>
						</div>
						
						<?php do_action( 'muraveinik_single_product_cart' ); ?>
						
					</div>
				</div>
			</div>
		</section>
		<div class="tabs tabs--product">
			<div class="container">
				<div class="tabs__titles tabs__titles--product">
					<p class="active">Описание</p>
					<p>Характеристики</p>
					<p id="relatedProductsButton">Похожие товары</p>
				</div>
				<div class="tabs__items tabs__items--product tabs__items--product--normal active">
					<h2>Описание</h2>
					<div>
						<p><?php the_content(); ?></p>
					</div>
				</div>
				<div class="tabs__items tabs__items--product tabs__items--product--normal">
					<h2>Характеристики</h2>
					<table>
						<tr>
							<td><?php the_field('product__key-1'); ?></td>
							<td><?php the_field('product__value-1'); ?></td>
						</tr>
						<tr>
							<td><?php the_field('product__key-2'); ?></td>
							<td><?php the_field('product__value-2'); ?></td>
						</tr>
						<tr>
							<td><?php the_field('product__key-3'); ?></td>
							<td><?php the_field('product__value-3'); ?></td>
						</tr>
						<tr>
							<td><?php the_field('product__key-4'); ?></td>
							<td><?php the_field('product__value-4'); ?></td>
						</tr>
						<tr>
							<td><?php the_field('product__key-5'); ?></td>
							<td><?php the_field('product__value-5'); ?></td>
						</tr>
						<tr>
							<td><?php the_field('product__key-6'); ?></td>
							<td><?php the_field('product__value-6'); ?></td>
						</tr>
						<tr>
							<td><?php the_field('product__key-7'); ?></td>
							<td><?php the_field('product__value-7'); ?></td>
						</tr>
					</table>
				</div>
				<div class="tabs__items tabs__items--product">
				
				<?php 
				$args =  array(
					'posts_per_page' => 4,
					'columns'        => 4,
					'orderby'        => 'rand',
					'order'          => 'desc',
				);
				woocommerce_related_products( $args ); 
				?>
					
				</div>
			</div>
		</div>
	</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>