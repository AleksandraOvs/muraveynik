<?php
/*
 * The template for displaying the footer
 */

?>
</main>
<footer id="footer" class="footer">


	<div class="container">
		<a href="<?php site_url(); ?>" class="footer__logo logo">
			<?php
			$footer_logo = get_theme_mod('footer_logo');
			$img = wp_get_attachment_image_src($footer_logo, 'full');
			if ($img) :
			?>
				<img src="<?php echo $img[0]; ?>" alt="">
			<?php endif; ?>
		</a>
		<div class="footer__inner footer-container flex align-start justify-between">
			<div class="footer__left">
				<?php if (is_active_sidebar('sidebar-footer-left')) { ?>
					<?php dynamic_sidebar('sidebar-footer-left'); ?>
				<?php } ?>
			</div>

			<div class="footer__center">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'container' => 'nav',
						'menu_class' => 'footer__menu',
					)
				);
				?>
			</div>
			<div class="footer__right">
				<?php if (is_active_sidebar('sidebar-footer-right')) { ?>
					<?php dynamic_sidebar('sidebar-footer-right'); ?>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="footer__text">
		<div class="container">
			<p class="footer__text__p">
				Информация о товаре, представленном на сайте, не является публичной офертой. Характеристики, комплект поставки, внешний вид, страна и место производства товара могут отличаться от указанных или могут быть изменены производителем без отображения в каталоге магазина Муравейник. Условия приобретения товара требуют согласования с менеджером магазина. Предложение действительно с момента согласования его с менеджером Интернет-магазина.
			</p>

		</div>
	</div>

	<div class="arrow-up">
		<svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12.4166 1.15529C12.3647 1.10387 12.308 1.0575 12.2473 1.0168L12.155 0.966794C12.0857 0.922317 12.0087 0.891019 11.928 0.874471L11.8319 0.847544C11.6845 0.818513 11.533 0.818513 11.3856 0.847544L11.2856 0.878319L11.1702 0.912939C11.1306 0.931257 11.0921 0.951807 11.0548 0.974489L10.974 1.02065C10.9103 1.06337 10.8511 1.11234 10.7971 1.16683L0.445356 11.507C0.316232 11.6075 0.209948 11.7343 0.133556 11.8789C0.0571638 12.0236 0.0124093 12.1829 0.00226167 12.3462C-0.00788593 12.5095 0.0168053 12.6731 0.0746971 12.8261C0.132589 12.9791 0.222357 13.1181 0.338049 13.2338C0.45374 13.3495 0.592709 13.4393 0.745737 13.4972C0.898765 13.555 1.06236 13.5797 1.22565 13.5696C1.38895 13.5594 1.54822 13.5147 1.69291 13.4383C1.83759 13.3619 1.96438 13.2556 2.06485 13.1265L10.447 4.75588L10.447 35.8226C10.447 36.1286 10.5686 36.4222 10.785 36.6386C11.0014 36.855 11.295 36.9766 11.601 36.9766C11.9071 36.9766 12.2006 36.855 12.4171 36.6386C12.6335 36.4222 12.7551 36.1286 12.7551 35.8226L12.7551 4.75588L21.1372 13.1265C21.3593 13.2993 21.6368 13.385 21.9175 13.3675C22.1983 13.3501 22.4631 13.2307 22.662 13.0317C22.8609 12.8328 22.9803 12.5681 22.9978 12.2873C23.0152 12.0065 22.9295 11.729 22.7567 11.507L12.4166 1.15529Z" fill="white" />
		</svg>
	</div>


</footer>

<!-- <form id="modalCallback" class="callback-form">
		<h2 class="modal-h2">Заполните форму ниже</h2>
		<div class="modal-inner">
			<p>Менеджер перезвонит вам в течении 10 мин:</p>
			<ul>
				<li>Сориентирует по стоимости заказа</li>
				<li>Согласует время доставки</li>
				<li>Ответит на все интересующие вопросы</li>
			</ul>
		</div>
        
        <input type="tel" name="phone" placeholder="Введите ваш номер телефона*" autocomplete="off" required>
        <p class="remark">*Обязательное поле ввода</p>
        <input type="submit" value="Отправить" class="button orange">

        <div class="agreement flex justify-around align-center">
        <input type="checkbox" name="checkbox" id="checkbox2" checked required>
		<label for="checkbox2"></label>

        <p>Нажимая кнопку вы принимаете условия
        <a href="<?php //echo site_url('politika-konfidentsialnosti')
					?>">Политики&nbsp;конфиденциальности</a>
		</p>
        </div>
    </form> -->

<div id="modalCallback" class="callback-form">
	<?php echo do_shortcode('[contact-form-7 id="5475fb6" title="Оставить заявку"]'); ?>
	<!-- <h2>Заполните форму ниже</h2>
		<div class="modal-description">Менеджер перезвонит вам в течении 10 мин:</div>
		<ul>
			<li>Сориентирует по стоимости заказа</li>
			<li>Согласует время доставки</li>
			<li>Ответит на все интересующие вопросы</li>
		</ul>
        <input type="tel" name="phone" placeholder="+7 (999) 999 99 99 *" autocomplete="off" required>
        <p class="remark">*Обязательное поле ввода</p>
        <input type="submit" value="Оставить заявку" class="button button--orange">
        <div class="checkbox flex">
            <input type="checkbox" name="checkbox" id="checkbox2" checked required><label for="checkbox2"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/check.svg" alt=""></label>
            <div class="flex">
                <p>Нажимая кнопку вы принимаете условия</p>
                <a href="https://muraveynik.su/politika-konfidentsialnosti/">Политики конфиденциальности</a>
            </div>
        </div> -->
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function(m, e, t, r, i, k, a) {
		m[i] = m[i] || function() {
			(m[i].a = m[i].a || []).push(arguments)
		};
		m[i].l = 1 * new Date();
		k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
	})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	ym(68919115, "init", {
		clickmap: true,
		trackLinks: true,
		accurateTrackBounce: true,
		webvisor: true,
		ecommerce: "dataLayer"
	});
</script>
<noscript>
	<div><img src="https://mc.yandex.ru/watch/68919115" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->

<!-- Begin Verbox {literal} -->
<script type='text/javascript'>
	(function(d, w, m) {
		window.supportAPIMethod = m;
		var s = d.createElement('script');
		s.type = 'text/javascript';
		s.id = 'supportScript';
		s.charset = 'utf-8';
		s.async = true;
		var id = 'e2edd9d08924ce3d826ba46df21ab7d2';
		s.src = 'https://admin.verbox.ru/support/support.js?h=' + id;
		var sc = d.getElementsByTagName('script')[0];
		w[m] = w[m] || function() {
			(w[m].q = w[m].q || []).push(arguments);
		};
		if (sc) sc.parentNode.insertBefore(s, sc);
		else d.documentElement.firstChild.appendChild(s);
	})(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox -->

<script type="text/javascript">
	(function(window, document, n, project_ids) {
		window.GudokData = n;
		if (typeof project_ids !== "object") {
			project_ids = [project_ids]
		};
		window[n] = {};
		window[n]["projects"] = project_ids;
		config_load(project_ids.join(','));

		function config_load(cId) {
			var a = document.getElementsByTagName("script")[0],
				s = document.createElement("script"),
				i = function() {
					a.parentNode.insertBefore(s, a)
				},
				cMrs = '';
			s.async = true;
			if (document.location.search && document.location.search.indexOf('?gudok_check=') === 0) cMrs += document.location.search.replace('?', '&');
			s.src = "//mod.gudok.tel/script.js?sid=" + cId + cMrs;
			if (window.opera == "[object Opera]") {
				document.addEventListener("DOMContentLoaded", i, false)
			} else {
				i()
			}
		}
	})(window, document, "gd", "lvgfxk4ssz");
</script>

<?php wp_footer(); ?>

</body>


</html>