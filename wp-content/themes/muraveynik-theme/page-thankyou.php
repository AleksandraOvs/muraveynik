<?php
/*
	Template name:  Страница спасибо
*/
?>

<?php
get_header('frontpage');
?>

<section class="order-received-page">
	<div class="container">
    <div class="woocommerce-order-thankyou">
        <h3 style="font-size: 4.8rem; font-weight: 500;">Спасибо за заказ! </h3>
		<p class="thankyou-desc">Ваша заявка принята в обработку. Наш менеджер свяжется с  Вами  ближайшее время!</p>
		<a class="thankyou-button button" href="<?php echo site_url() ?>" class="button">Вернуться на главную</a>
    </div>
	</div>
</section>

<?php get_footer();
