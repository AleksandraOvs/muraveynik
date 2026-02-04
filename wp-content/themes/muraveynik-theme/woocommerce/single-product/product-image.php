<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
?>

<div id="product-<?php the_ID(); ?>" class="single-product__slider _image-inner" <?php wc_product_class( '', $product ); ?>>
            <?php
                global $product;
                    //$post_thumbnail_id = $product->get_image_id();
            ?>
            
        <div class="product__swiper">
            
            <div class="product__swiper-slide _image-fullscreen">
                <?php $post_thumbnail_id = $product->get_image_id(); ?>
                <a data-fancybox="gallery" href="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>"> 
                    <img class="js-load-lazy" src="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>" alt="">
                </a>
            </div>

            <?php $attachment_ids = $product->get_gallery_image_ids(); ?>
			
            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                <div class="product__swiper-slide _image-fullscreen">
                    <a data-fancybox="gallery" href="<?php echo wp_get_attachment_url( $attachment_id ); ?>">     
                        <img class="js-load-lazy" src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="">
                    </a>
                </div>
            <?php } ?>
            
        </div>
        
        <div class="product-image__controls flex justify-between">
            <div class="product-image__slider-prev">
                <svg width="19" height="32" viewBox="0 0 19 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 30L3 16L17 2" stroke="#23C229" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="product-image__slider-next">
                <svg width="19" height="32" viewBox="0 0 19 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 30L16 16L2 2" stroke="#23C229" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="product__swiper__nav">
            <div class="product__swiper-nav-slide">
                <?php $post_thumbnail_id = $product->get_image_id(); ?>
                    <img class="js-load-lazy" src="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>" alt="">
            </div>

            <?php $attachment_ids = $product->get_gallery_image_ids(); ?>
			
            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                <div class="product__swiper-nav-slide">
                        <img class="js-load-lazy" src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="">
                </div>
            <?php } ?>
        </div>
</div>


