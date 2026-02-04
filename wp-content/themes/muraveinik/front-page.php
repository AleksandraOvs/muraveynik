<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" sizes="32x32" />
	<link rel="icon" href="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" sizes="192x192" />
	<link rel="apple-touch-icon" href="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" />
	<meta name="msapplication-TileImage" content="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/favicon.svg" />
    <title><?php echo wp_get_document_title() ?></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets-new/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets-new/css/style.css?v=007">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/c192ada680.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets-new/js/jquery.fancybox.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets-new/js/jquery.maskedinput.min.js"></script>
</head>
<body>
    <div class="main-screen">
        <header class="header main-screen__header">
            <div class="wrapper">
                <div class="header__body flex">
					
					<?php if( is_front_page() ): ?>
                    <a class="header__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/logo.svg" alt=""><span>металлобаза в Клину </span></a>
                    <?php else: ?>
					<a href="https://muraveynik.su/" class="header__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/logo.svg" alt=""><span>металлобаза в Клину </span></a>
                    <?php endif; ?>
					
					<nav class="header__menu">
                        <button type="button" class="close"></button>
                        <ul class="flex">
                            <li>
                                <a>Каталог</a>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
								
								<?php echo get_categories_product_new(); ?>
                                
                            </li>
                            <li><a href="https://muraveynik.su/pokupatelyam/oformlenie-zakaza/">Доставка и оплата</a></li>
                            <li><a href="https://muraveynik.su/o-kompanii/">О компании</a></li>
                            <li><a href="https://muraveynik.su/kontakty/">Контакты</a></li>
                            <!--<li><a href="#">Статьи</a></li>-->
                        </ul>
                        <div class="header__burger-items">
                            <div class="contacts-burger flex">
                                <a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                <a href="mailto:<?php the_field( 'email', 'option' ); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                <a href="<?php the_field( 'whatsapp', 'option' ); ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="https://muraveynik.su/korzina/"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                            </div>
                            <form class="search-form-burger" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
                                <input type="search" value="<?php echo get_search_query(); ?>" name="s">
                                <input type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </form>
                        </div>
                    </nav>
                    <a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>" class="header__phone"><?php the_field( 'phone', 'option' ); ?></a>
                    <div class="header__search-cart flex">
                        <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
                            <input type="search" value="<?php echo get_search_query(); ?>" name="s">
                            <input type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </form>
                        <a href="https://muraveynik.su/korzina/"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                    </div>
					<div class="header__mobile-links">
                        <a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></a>
                        <a href="https://muraveynik.su/korzina/"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                    </div>
                    <div class="burger">
                        <div class="burger__item"></div>
                        <div class="burger__item"></div>
                        <div class="burger__item"></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-screen__body">
            <div class="wrapper">
                <h1><?php the_field( 'main-screen_title' ); ?></h1>
                <div class="main-screen__text">
					<?php 
					if( have_rows( 'main-screen_text' ) ): 
					while ( have_rows( 'main-screen_text' ) ): the_row();
					?>
                    <p><?php the_sub_field( 'paragraph' ); ?></p>
					<?php 
					endwhile;
					endif; ?>
				</div>
                <div class="main-screen__buttons flex">
                    <button class="button button--orange" type="button" data-fancybox data-src="#modalCallback">Оставить заявку</button>
                    <?php if( get_field( 'price' ) ): ?>
					<a download href="<?php the_field( 'price' ); ?>" class="button  button--white">Скачать прайс</a>
					<?php endif; ?>
				</div>
            </div>
        </div>
    </div>

    <section class="gains">
        <div class="wrapper">
            <h2><?php the_field( 'gains_title' ); ?></h2>
			
			<?php if( have_rows( 'gains_text' ) ): ?>
            <div class="gains__text">
				<?php while( have_rows( 'gains_text' ) ): the_row(); ?>
                <p><?php the_sub_field( 'paragraph' ); ?></p>
				<?php endwhile; ?>
            </div>
			<?php endif; ?>
			
			<?php if( have_rows( 'gains_items' ) ): ?>
            <div class="gains__items flex">
				<?php 
				while( have_rows( 'gains_items' ) ): the_row(); 
				$icon = get_sub_field( 'icon' );
				?>
                <div class="gains__item">
                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="gains__icon">
                    <p><?php the_sub_field( 'text' ); ?></p>
                </div>
				<?php endwhile; ?>
            </div>
			<?php endif; ?>
			
        </div>
    </section>
	
	<section class="bestselling-products">
        <div class="wrapper swiper">
            <h2>Популярные товары</h2>
			
			<?php
			global $product;
			$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'posts_per_page' => 7,
				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num',
			);
			$wc_query = new WP_Query($args);
			
			if ($wc_query->have_posts()): ?>
			<div class="bestselling-products__products flex swiper-wrapper">
				<?php 
				while ($wc_query->have_posts()):
				$wc_query->the_post();
				//woocommerce_product_loop_start(); 
				?>
				<div class="bestselling-products__product swiper-slide">
                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( $product->image_id ); ?></a>
                    <p class="price"><?php echo $product->price; ?>&nbsp;руб</p>
                    <p class="title"><?php echo $product->name; ?></p>
                </div>
				<?php //woocommerce_product_loop_end();
				endwhile; ?>
			</div>
			<?php
			endif;
			wp_reset_postdata();
			?>
            
        </div>
    </section>

    <section class="catalog">
        <div class="wrapper">
            <h2><?php the_field( 'catalog_title' ); ?></h2>
			
			<?php if( have_rows( 'catalog_text' ) ): ?>
            <div class="catalog__text">
				<?php while( have_rows( 'catalog_text' ) ): the_row(); ?>
                <p><?php the_sub_field( 'paragraph' ); ?></p>
				<?php endwhile; ?>
            </div>
			<?php endif; ?>
			
			<?php if( have_rows( 'catalog_items' ) ): ?>
            <div class="catalog__items flex">
				<?php while( have_rows( 'catalog_items' ) ): the_row(); ?>
                <div class="catalog__item">
					<?php if( get_sub_field( 'subcategories' ) ): ?>
                    <div class="flex">
						<?php while( have_rows( 'subcategories' ) ): the_row(); ?>
                        <p><?php the_sub_field( 'subcategory' ); ?></p>
						<?php endwhile; ?>
                    </div>
					<?php endif; ?>
					<?php 
					$category = get_sub_field( 'category' );
					$add_category_name = get_sub_field( 'add_category_name' ) == '' ? '' : get_sub_field( 'add_category_name' );
					if( $category ):
					?>
                    <a class="button button--green" href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); echo $add_category_name; ?></a>
					<?php endif; ?>
				</div>
				<?php endwhile; ?>
			</div>
				<a class="button catalog__button" href="https://muraveynik.su/product-category/metalloprokat/">Посмореть весь каталог</a>
			<?php endif; ?>
        </div>
    </section>
	
	<section class="works">
        <div class="wrapper">
            <h2><?php the_field( 'works_title' ); ?></h2>
			
			<?php if( have_rows( 'works_items' ) ): ?>
            <div class="works__items flex">
				<?php while( have_rows( 'works_items' ) ): the_row(); ?>
				<?php if( get_row_layout() == 'normal' ): 
				$icon = get_sub_field( 'icon' );
				?>
                <div class="works__item flex">
					<?php if( get_sub_field( 'text' ) ): ?>
                    <div class="text">
                        <p class="caption"><span><?php the_sub_field( 'step' ); ?></span> /шаг</p>
						<?php  while( have_rows( 'text' ) ): the_row(); ?>
                        <p><?php the_sub_field( 'paragraph' ); ?></p>
						<?php endwhile; ?>
                    </div>
					<?php endif; ?>
                    <div class="image"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></div>
                </div>
				<?php elseif( get_row_layout() == 'big' ): 
				$icon = get_sub_field( 'icon' );
				?>
				<div class="works__item works__item--big flex">
					<?php if( get_sub_field( 'text' ) ): ?>
                    <div class="text"> 
						<?php while( have_rows( 'text' ) ): the_row(); ?>
                        <p><?php the_sub_field( 'paragraph' ); ?></p>
						<?php endwhile; ?>
                        <div class="works__buttons flex">
                            <button class="button button--orange" type="button" data-fancybox data-src="#modalCallback">Оставить заявку</button>
                            <a href="https://muraveynik.su/product-category/metalloprokat/" class="button button--white">Перейти в каталог</a>
                        </div>
                    </div>
					<?php endif; ?>
                    <div class="image"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></div>
                </div>
				<?php endif; ?>
				<?php 
				$i++;
				endwhile; ?>
            </div>
			<?php endif; ?>
        </div>
    </section>

    <section class="production">
        <div class="wrapper">
            <h2><?php the_field( 'production_title' ); ?></h2>
            <div class="production__body flex">
			
				<?php 
				$production_slider = get_field( 'production_slider' );
				if( $production_slider ):
				?>
                <div class="production__slider swiper">
                    <div class="swiper-wrapper">
						<?php foreach( $production_slider as $production_slide): ?>
                        <div class="swiper-slide"><img src="<?php echo $production_slide['url']; ?>" alt="<?php echo $production_slide['alt']; ?>"></div>
						<?php endforeach; ?>
					</div>
                    
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
				<?php endif; ?>
				
				<?php if( have_rows( 'production_text' ) ): ?>
                <div class="production__text">
					<?php while( have_rows( 'production_text' ) ): the_row(); ?>
                    <h3><?php the_sub_field( 'caption' ); ?></h3>
						<?php 
						if( get_sub_field( 'content' ) ): 
							while( have_rows( 'content' ) ): the_row();
							?>
							<p><?php the_sub_field( 'paragraph' ); ?></p>
							<?php endwhile;
						endif; ?>
						<?php if( get_sub_field( 'list' ) ): ?>
							<ul>
							<?php while( have_rows( 'list' ) ): the_row(); ?>
								<li><?php the_sub_field( 'item' ); ?></li>
							<?php endwhile; ?>
							</ul>
							<?php 
						endif; 
					endwhile; 
					?>
                </div>
				<?php endif; ?>
				
            </div>
        </div>
    </section>

    <section class="dialog">
        <div class="wrapper">
            <div class="dialog__body flex">
                <div class="dialog__photo">
				
				<?php 
				$dialog_photo = get_field( 'dialog_photo' ); 
				if( !empty( $dialog_photo ) ):
				?>
				<img src="<?php echo $dialog_photo['url']; ?>" alt="<?php echo $dialog_photo['alt']; ?>">
				<?php endif; ?>
				
				</div>
                <div class="dialog__text">
                    <h2><?php the_field( 'dialog_title' ); ?></h2>
					
					<?php if( have_rows( 'dialog_list' ) ): ?>
                    <ul>
						<?php while( have_rows( 'dialog_list' ) ): the_row(); ?>
                        <li><?php the_sub_field( 'item' ); ?></li>
						<?php endwhile; ?>
                    </ul>
					<?php endif; ?>
					
					<?php 
					if( have_rows( 'dialog_text' ) ): 
					while( have_rows( 'dialog_text' ) ): the_row();
					?>
                    <p><?php the_sub_field( 'paragraph' ); ?></p>
                    <?php 
					endwhile;
					endif; 
					?>
					
					<div class="dialog__buttons flex">
                        <a href="<?php the_field( 'telegram', 'option' ); ?>" class="button button--green" target="_blank"><span><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/telegram-green.svg" alt=""></span><span>Telegram</span></a>
                        <a href="mailto:info@muraveynik.su" class="button button--white-green"><i class="fa fa-envelope" aria-hidden="true"></i><span>Написать письмо</span></a>
                        <button class="button button--white-green" type="button"  data-fancybox data-src="#modalCallback"><i class="fa fa-phone" aria-hidden="true"></i><span>Оставить заявку</span></button>
                    </div>
                    <div class="dialog__buttons-mobile">
                        <a href="tel:<?php echo str_replace( ' ', '-', get_field('phone', 'option') ); ?>" class="button button--green">Позвонить нам</a>
                        <a href="<?php the_field( 'telegram', 'option' ); ?>" class="button button--white-green" target="_blank"><span><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/telegram-white.svg" alt=""></span><span>Telegram</span></a>
                        <form class="dialog__form">
                            <!--<input type="text" name="name" placeholder="Имя *" autocomplete="off" required>-->
                            <input type="tel" name="phone" placeholder="+7 (999) 999 99 99 *" autocomplete="off" required>
                            <p class="remark">*Обязательное поле ввода</p>
                            <input type="submit" value="Отправить" class="button button--green">
                            <div class="checkbox flex">
                                <input type="checkbox" name="checkbox" id="checkbox1" checked><label for="checkbox1"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/check.svg" alt=""></label>
                                <div>
                                    <p>Нажимая кнопку вы принимаете условия</p>
                                    <a href="https://muraveynik.su/politika-konfidentsialnosti/">Политики конфеденциальности</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="wrapper">
            <div class="footer__body flex">
                <div class="footer__logo-links-copyright">
				
					<?php if( is_front_page() ): ?>
                    <a class="footer__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/logo-footer.svg" alt=""></a>
                    <?php else: ?>
					<a href="https://muraveynik.su/" class="footer__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/logo-footer.svg" alt=""></a>
                    <?php endif; ?>
					
					<a href="https://muraveynik.su/politika-konfidentsialnosti/">Политика конфиденциальности</a>
                    <br>
                    <a href="https://muraveynik.su/polzovatelskoe-soglashenie/">Пользовательское соглашение</a>
                    <p class="copyright">Copyright © Муравейник <?php echo date( 'Y' ); ?></p>
                </div>
                <nav class="footer__menu">
                    <ul>
                        <li><a href="https://muraveynik.su/product-category/metalloprokat/">Каталог</a></li>
                        <li><a href="https://muraveynik.su/pokupatelyam/oformlenie-zakaza/">Доставка и оплата</a></li>
                        <!--<li><a href="#">Статьи</a></li>-->
                        <li><a href="https://muraveynik.su/o-kompanii/">О компании</a></li>
                        <li><a href="https://muraveynik.su/kontakty/">Контакты</a></li>
                    </ul>
                </nav>
                <div class="footer__contacts">
                    <div class="footer__contact"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo str_replace( ' ', '-', get_field( 'phone', 'option' ) ); ?>"><?php the_field( 'phone', 'option' ); ?></a></div>
                    <div class="footer__contact"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php the_field( 'email', 'option' ); ?>"><?php the_field( 'email', 'option' ); ?></a></div>
                    <div class="footer__contact"><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php the_field( 'address', 'option' ); ?></span></div>
                    <!--<a class="footer__whatsapp" href="<?php the_field( 'whatsapp', 'option' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/whatsapp-white.svg" alt=""></a>-->
                </div>
            </div>
            <p class="footer__text"><?php the_field( 'footer_text', 'option' ); ?></p>
        </div>
    </footer>

    <a href="#" class="scroll-top-button"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/arrow-up.svg" alt=""></a>

    <form id="modalCallback" class="callback-form">
        <!--<input type="text" name="name" placeholder="Имя *" autocomplete="off" required>-->
        <input type="tel" name="phone" placeholder="+7 (999) 999 99 99 *" autocomplete="off" required>
        <p class="remark">*Обязательное поле ввода</p>
        <input type="submit" value="Оставить заявку" class="button button--orange">
        <div class="checkbox flex">
            <input type="checkbox" name="checkbox" id="checkbox2" checked required><label for="checkbox2"><img src="<?php echo get_template_directory_uri(); ?>/assets-new/images/front/check.svg" alt=""></label>
            <div class="flex">
                <p>Нажимая кнопку вы принимаете условия</p>
                <a href="https://muraveynik.su/politika-konfidentsialnosti/">Политики конфеденциальности</a>
            </div>
        </div>
    </form>

    <script>
        const menu = document.querySelector('.header__menu');
        const subMenu = document.querySelector('.sub-menu--1');
		const subMenuItems = subMenu.querySelectorAll('li');

        subMenuItems.forEach((item) => {
           if(item.children.length === 3) item.children[0].removeAttribute('href');
           else if(item.children.length === 2) item.children[1].remove();
        });

        if(window.innerWidth > 1200) {
            document.querySelectorAll('.header__menu > ul > li > a')[0].addEventListener('click', function(e) {
                if(!e.target.parentElement.parentElement.classList.contains('sub-menu')) {
                    subMenu.classList.toggle('active');
                    this.parentElement.children[1].classList.toggle('active');
                }
            }, false);

            document.body.addEventListener('click', function(event) {
                if((event.target.tagName !== 'A' && event.target.tagName !== 'UL' && event.target.tagName !== 'I') && subMenu.classList.contains('active')) 
                subMenu.classList.remove('active');
            }, false);
        } else {
            document.querySelector('.burger').addEventListener('click', function() {
                menu.classList.add('active');
            });
            menu.querySelector('.close').addEventListener('click', function() {
                menu.classList.remove('active');
            });
        }

        subMenu.querySelectorAll('li').forEach((a) => {
            a.addEventListener('click', function() {
                if(this.children.length > 2) {
                    this.children[2].classList.toggle('active');
                    this.children[1].classList.toggle('active');
                }
            });
        });

        if(window.innerWidth < 577) {
            document.querySelector('.footer__logo').after(document.querySelector('.footer__contacts'));
        }

        const header = document.querySelector('header.header');
        const mainScreen = document.querySelector('.main-screen');

        if(window.innerWidth > 576) {
            window.addEventListener('scroll', () => {
                if(mainScreen.getBoundingClientRect().bottom <= 0) header.classList.add('fixed');
                else header.classList.remove('fixed');
            });
        } else {
            window.addEventListener('scroll', () => {
                if(window.pageYOffset > 5) {
                    header.classList.add('sticked');
                } else header.classList.remove('sticked');
            })
        }

        const scrollTopButton = document.querySelector('a.scroll-top-button');

        window.addEventListener('scroll', () => {
            if(mainScreen.getBoundingClientRect().bottom <= 0) scrollTopButton.classList.add('visible');
            else scrollTopButton.classList.remove('visible');
        })

		$.fn.setCursorPosition = function(pos) {
			if ($(this).get(0).setSelectionRange) {
				$(this).get(0).setSelectionRange(pos, pos);
			} else if ($(this).get(0).createTextRange) {
				var range = $(this).get(0).createTextRange();
				range.collapse(true);
				range.moveEnd('character', pos);
				range.moveStart('character', pos);
				range.select();
			}
		};

		$('input[type="tel"]').click(function(){
			$(this).setCursorPosition(4); 
		});

		$('input[type="tel"]').mask("+7 (999) 999 99 99");
	
		async function sendForm(form) {
			
			event.preventDefault();
					
			let formData = new FormData(form);

			let response = await fetch('/wp-content/themes/muraveinik/inc/mail.php', {
				method: 'POST',         
				body: formData
			});
			
			if(response.ok) {
				successMessage();
				console.log('Форма отправлена');
			} else {
				errorMessage();
				console.log('Не удалось отправить форму');
			}
		}

		function successMessage() {
			const fancyboxCloseButton = document.querySelector('.fancybox-close-small');
			const message = document.createElement('div');
			message.className = 'message message--success';
			message.innerHTML = '<p>Спасибо за вашу заявку!</p><p>Ваша заявка получена: ' + new Date().toLocaleString() + '</p>';
			message.attributeStyleMap.set('height', CSS.px(header.offsetHeight));
			document.body.append(message);
			setTimeout(() => {
				if(fancyboxCloseButton) fancyboxCloseButton.click();
				setTimeout(() => {
					message.classList.add('fixed');
					setTimeout(() => {
						message.classList.remove('fixed');
						setTimeout(() => {
							message.remove();
						}, 1000);
					}, 2000);
				}, 1000);
			}, 1500);
		}
		function errorMessage() {
			const fancyboxCloseButton = document.querySelector('.fancybox-close-small');
			const message = document.createElement('div');
			message.className = 'message message--error';
			message.innerHTML = '<p>Извините, с отправкой письма произошла ошибка</p><p>Попробуйте еще раз позже...</p>';
			message.attributeStyleMap.set('height', CSS.px(header.offsetHeight));
			document.body.append(message);
			
			setTimeout(() => {
				if(fancyboxCloseButton) fancyboxCloseButton.click();
				setTimeout(() => {
					message.classList.add('fixed');
					setTimeout(() => {
						message.classList.remove('fixed');
						setTimeout(() => {
							message.remove();
						}, 1000);
					}, 2000);
				}, 1000);
			}, 1500);
		}

		document.querySelector('form.callback-form').addEventListener('submit', function() {
			sendForm(this);
		});

		document.querySelector('form.dialog__form').addEventListener('submit', function() {
			sendForm(this);
		});

		const swiper1 = new Swiper('.bestselling-products .wrapper', {
			loop: true,
			autoplay: true,
			slidesPerView: 2,
			spaceBetween: 17,
			breakpoints: {
				576: {
					slidesPerView: 3
				},
				768: {
					slidesPerView: 4
				},
				992: {
					slidesPerView: 5
				},
				1400: {
					slidesPerView: 6
				},
				1700: {
					slidesPerView: 7
				}
			}
		});

		const swiper2 = new Swiper('.production__slider', {
			loop: true,
			autoplay: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: false,
			breakpoints: {
				768: {
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
					pagination: false
				}
			}
		});
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