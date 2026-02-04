<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package muraveinik
 */

get_header();
?>
	<section class="page-404">
		<div class="container">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'muraveinik' ); ?></h1>
			<p class="return-to-shop">
				<a class="button return-to-shop__button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'home' ) ) ); ?>">
					<?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
				</a>
			</p>
		</div>
	</section>
			
<?php
get_footer();
