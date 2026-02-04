<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package muraveinik
 */

?>
	
	<footer class="footer">
        <div class="container">
            <div class="footer__main">
                <div class="footer__left">
				
				<?php if(is_front_page()): ?>
				
                    <div class="footer__logo"><a><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.png" alt=""></a></div>
				
				<?php else: ?>
				
                    <div class="footer__logo"><a href="/"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.png" alt=""></a></div>
					
				<?php endif; ?>
				
                    <a href="https://muraveynik.su/politika-konfidentsialnosti/">Политика конфиденциальности</a><a href="https://muraveynik.su/polzovatelskoe-soglashenie/">Пользовательское соглашение</a>
                    <p>Copyright © Муравейник 2020-2023</p>

                </div>
                <nav class="footer__center">
                <?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'container' => false,
							'menu_class' => 'footer__menu',
						)
					);
				?>
                </nav>
                <div class="footer__right">
                    <a href="tel:+7-985-717-02-34">+7 985 717 02 34</a><a href="mailto:info@muraveynik.su">info@muraveynik.su</a>
                    <p>г. Клин, ул. Терешковой, 48</p>
                    <div class="footer__icons">
                        <!--Скрыла соцсети <a href="#"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-vk fa-3x" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-youtube-play fa-3x" aria-hidden="true"></i></a>-->
                    </div>
                </div>
            </div>
            <div class="footer__footer">
                <p>Информация о товаре, представленном на сайте, не является публичной офертой. Характеристики, комплект поставки, внешний вид, страна и место производства товара могут отличаться от указанных или могут быть изменены производителем без отображения в каталоге магазина Муравейник. Условия приобретения товара требуют согласования с менеджером магазина. Предложение действительно с момента согласования его с менеджером Интернет-магазина.</p>
            </div>
        </div>
    </footer>
    <footer class="footer-mobile">
        <div class="container">
            <div class="footer-mobile__header">
                <div class="footer-mobile__logo"><a href="/"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.png" alt=""></a></div>
                <div class="footer-mobile__icons">
                    <!--Скрыла иконки соцсетей <a href="#"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-vk fa-3x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play fa-3x" aria-hidden="true"></i></a>-->
                </div>
            </div>
            <div class="footer-mobile__center">
                <a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>"><?php the_field( 'phone', 'option' ); ?></a>
                <p><?php echo get_post_meta( 395, 'address', true ); ?></p>
                <a href="mailto:<?php the_field( 'email', 'option' ); ?>"><?php the_field( 'email', 'option' ); ?></a>
            </div>
            <div class="footer-mobile__footer">
                <div class="footer-mobile__footer-1">
                    <a href="/develop/politika-konfidentsialnosti/">Политика конфиденциальности</a><a href="https://muraveynik.su/politika-konfidentsialnosti/">Политика конфиденциальности</a>
                </div>
                <p class="footer-mobile__footer-2">Copyright © Муравейник 2020-2023</p>
                <p class="footer-mobile__footer-3">Информация о товаре, представленном на сайте, не является публичной офертой. Характеристики, комплект поставки, внешний вид, страна и место производства товара могут отличаться от указанных или могут быть изменены производителем без отображения в каталоге магазина. Муравейник. Условия приобретения товара требуют согласования с менеджером магазина. Предложение действительно с момента согласования его с менеджером Интернет-магазина.</p>
            </div>
        </div>
    </footer>
	<!--<a data-fancybox data-src="#modalForm" href="javascript:;" target="_blank" title="" rel="noopener noreferrer"><div class="modalform-button"><i class="fa fa-envelope-o" aria-hidden="true"></i></div></a>-->
    <div class="modal-catalog-wrapper">
        <section id="catalogMenu" class="catalog-menu">
            <div class="container">
                <header class="catalog-menu__header">
                    <div class="catalog-menu__logo"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt=""></div>
                    <h2>Каталог</h2>
                    <div class="catalog-menu__close-button"></div>
                </header>
                
				<?php echo get_categories_product(); ?>	
				
			</div>
        </section>
        <section id="catalogSubmenu-1" class="catalog-menu catalog-submenu">
            <div class="container">
                <header class="catalog-menu__header">
                    <div class="catalog-menu__logo"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt=""></div>
                    <h2>Металлопрокат</h2>
                    <div class="catalog-menu__close-button"></div>
                </header>
                <div class="catalog-menu__return-button">&nbsp;&nbsp;&nbsp;&nbsp;Назад</div>
				<div class="catalog-submenu__wrapper">
             
				</div>
            </div>
        </section>
    </div>
    <div id="modalSearch" class="modal-search"><?php get_product_search_form(); ?></div>
    <div id="modalMap" class="modal-map"></div>
	<section id="modalThanks" class="thanks">
        <div class="container thanks__container">
            <h2>Спасибо за заказ!</h2>
            <div class="thanks__body">
                <div class="left">
                    <p>Номер Вашего заказа: <span></span></p>
                    <p>Сумма Вашего заказа: <span></span></p>
                    <p>Ваш заказ поступил в обработку.<br>В ближайшее время с Вамя свяжется оператор.</p>
                    <div class="thanks__order-info">
                        <p>Информация о заказе:</p>
                        <p class="min">Контактное лицо: <span></span></p>
                        <p class="min">Телефон для связи: <span></span></p>
                    </div>
                </div>
                <div class="right">
                    <p>Если у Вас возникли вопросы относительно заказа или нашей работы, пожалуйста, свяжитесь с нами любым удобным способом:</p>
                    <div class="thanks__contacts-items">
                        <a class="thanks__contacts-item" href="tel:+7-985-717-02-34"><i class="fa fa-phone fa-2x fa-fw" aria-hidden="true"></i><p>+7 985 717 02 34</p></a>
                        <a class="thanks__contacts-item" href="mailto:info@muraveynik.su"><i class="fa fa-envelope fa-2x fa-fw" aria-hidden="true"></i><p>Отправить письмо</p></a>
                    </div>
                    <div class="button thanks__button"><a href="/">На главную</a></div>
                </div>
            </div>
        </div>
    </section>
	<div class="modal-filters-wrapper">
		<div id="modalFilters" class="modal-filters">
			<header class="modal-filters__header">
				<div class="modal-filters__title">
					<i class="fa fa-filter fa-3x" aria-hidden="true"></i>
					<h2>Фильтр</h2>
				</div>
				<p id="filtersCloseButton">закрыть</p>
			</header>
			<?php
			if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('sidebar-2');
			?>

		</div>
	</div>
	<div id="modalSelect" class="modal-select">
		<p>Популярные товары</p>
        <p>Сезонное предложение</p>
        <p>Распродажа</p>
	</div>
	
	<!--<div id="modalForm">
		<form id="form" class="form">
			<h3>Спасибо за письмо!<br>Мы скоро свяжемся с Вами...</h3>
			<input type="text" placeholder="Ваше имя" name="name">
			<input type="tel" placeholder="Ваш телефон *" name="phone" required>
			<input type="email" placeholder="Ваш Email" name="email">
			<textarea placeholder="Ваше сообщение" name="text"></textarea>
			<input type="checkbox" id="checkbox" required><label for="checkbox">Вы не робот</label>
			<input type="submit" class="button form__button" value="Отправить">
		</form>
	</div>-->
	
<?php wp_footer(); ?>
	<script>
		const orderButton = document.querySelector('.order__button');
		
		if(orderButton) {
			orderButton.addEventListener('click', () => {
				const orderDetails = document.querySelectorAll('div.order__container-left table td');
				
				const dialogOrderDetails = document.querySelectorAll('.thanks__body .left p span');
			
				dialogOrderDetails[0].innerText = orderDetails[24].innerText;
				dialogOrderDetails[1].innerText = document.querySelectorAll('.order__inputs table td')[1].innerText;
				dialogOrderDetails[2].innerText = orderDetails[1].innerText;
				dialogOrderDetails[3].innerText = orderDetails[5].innerText;
			});
		}
	</script>
<!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    
       ym(68919115, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true,
            ecommerce:"dataLayer"
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/68919115" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Begin Verbox {literal} -->
    <script type='text/javascript'>
    	(function(d, w, m) {
    		window.supportAPIMethod = m;
    		var s = d.createElement('script');
    		s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
    		s.async = true;
    		var id = 'e2edd9d08924ce3d826ba46df21ab7d2';
    		s.src = 'https://admin.verbox.ru/support/support.js?h='+id;
    		var sc = d.getElementsByTagName('script')[0];
    		w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
    		if (sc) sc.parentNode.insertBefore(s, sc); 
    		else d.documentElement.firstChild.appendChild(s);
    	})(document, window, 'Verbox');
    </script>
<!-- {/literal} End Verbox -->

<script type="text/javascript">(function(window,document,n,project_ids){window.GudokData=n;if(typeof project_ids !== "object"){project_ids = [project_ids]};window[n] = {};window[n]["projects"]=project_ids;config_load(project_ids.join(','));function config_load(cId){var a=document.getElementsByTagName("script")[0],s=document.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},cMrs='';s.async=true;if(document.location.search&&document.location.search.indexOf('?gudok_check=')===0)cMrs+=document.location.search.replace('?','&');s.src="//mod.gudok.tel/script.js?sid="+cId+cMrs;if(window.opera == "[object Opera]"){document.addEventListener("DOMContentLoaded", i, false)}else{i()}}})(window, document, "gd", "lvgfxk4ssz");</script>
</body>
</html>
