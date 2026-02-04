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
	<section class="basic-page page404">
		<div class="container">
			<div class="page404-content">
				<h1 class="title-404">
					Ошибка 404
				</h1>
				<p class="text-404">
					Извините, такой страницы у нас нет. Мы поможем найти нужную информацию.
				</p>
				<p class="return-to-shop">
				</p>
				<div class="page404-content__buttons">
					<a href="<?php echo site_url() ?>" class="button">Вернуться на главную</a>
					<a href="<?php echo site_url() ?>/shop" class="button orange">Перейти в каталог</a>
				</div>
			</div>
			
			
		</div>
	</section>
			
<?php
get_footer();
