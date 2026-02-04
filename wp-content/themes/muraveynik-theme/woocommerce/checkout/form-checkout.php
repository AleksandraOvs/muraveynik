<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

        <ul class="customer_details">
		
		    <?php do_action( 'woocommerce_checkout_billing' ); ?>

            <?php if ($crb_checkout_info = carbon_get_theme_option('crb_checkout_info')) {?>
				<li class="customer_details-col delivery">
					<?php echo $crb_checkout_info ?>
					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
				</li>
			<?php } ?>

            <li class="customer_details-col payments_vars">
                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
            </li>
            
			
		    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
		
		    <?php //do_action( 'woocommerce_checkout_after_customer_details' ); ?>
        
            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	        
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
	        

        </ul>
           

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	<?php endif; ?>
	
	

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
