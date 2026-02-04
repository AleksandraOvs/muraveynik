<?php get_header() ?>

<section class="section-hero">
    <div class="container">
        <div class="hero-decor"></div>
        <div class="section-hero__content">
            <h1 class="title1 element-animation">Металлобаза в&nbsp;Клину&nbsp;— <br>быстро, выгодно, удобно</h1>
            <div class="frontpage__description">
                <p>
                    Металлобаза «Муравейник» в&nbsp;Клину — это&nbsp;металлопрокат по&nbsp;ГОСТу с&nbsp;доставкой в&nbsp;день заказа и&nbsp;резкой под&nbsp;нужные размеры
                </p>
            </div>
            <div class="main-screen__buttons flex">
                <!-- <button class="button orange" type="button" data-fancybox data-src="#modalCallback">Оставить заявку</button> -->
                <!--                  <button class="button orange" type="button" data-fancybox data-src="#modalCallback">Оставить заявку</button> -->
                <a class="button orange" href="tel:+79857170234">Позвонить нам</a>

                <?php

                if ($btn_price = carbon_get_theme_option('crb_hero_button_price')) {
                ?>
                    <a class="button white" target="_blank" href="<?php echo trim($btn_price); ?>">Скачать прайс</a>
                <?php
                }
                ?>
            </div>
        </div>

    </div>

</section>

<?php get_template_part('template-parts/advantages') ?>


<!-- <section class="section-adv">
    <div class="container">
        <div class="section-adv__pretitle">Мeталлобаза Муравейник</div>
        <h2 class="title2">Преимущества</h2>

        <div class="section-adv__description">
        <p>Вам больше не придется заказывать металл на площадках Москвы, а потом долго ждать доставку. Металлобаза в Клину Муравейник находится прямо на Ленинградском шоссе. Найти проще простого! А на удобной парковке всегда есть свободные места. Наши клиенты — жители города Клин, Клинского района, Москвы. По запросу привезём металл из Клина покупателям Московской, Тверской областей.</p>
        </div>

        <ul class="section-adv__list">
            <li class="section-adv__list element-animation">
            <div class="section-adv__list__img">
                <img src="<?php //echo get_stylesheet_directory_uri() . '/images/adv-icon01.png'
                            ?>" alt="">
            </div>    
            
                <p class="section-adv__list__text">
                    Доставляем собственным транспортом
                </p>
            </li>
            <li class="section-adv__list element-animation2">
            <div class="section-adv__list__img">
                <img src="<?php //echo get_stylesheet_directory_uri() . '/images/adv-icon02.png'
                            ?>" alt="">
            </div>    
           
                <p class="section-adv__list__text">
                    Доставим по&nbsp;Клину и &nbsp;району за&nbsp;1&nbsp;час
                </p>
            </li>
            <li class="section-adv__list element-animation">
            <div class="section-adv__list__img">
                <img src="<?php //echo get_stylesheet_directory_uri() . '/images/adv-icon03.png'
                            ?>" alt="">
            </div>    
            
                <p class="section-adv__list__text">
                    Резка под Ваши размеры
                </p>
            </li>
            <li class="section-adv__list element-animation2">
            <div class="section-adv__list__img">
                 <img src="<?php //echo get_stylesheet_directory_uri() . '/images/adv-icon04.png'
                            ?>" alt="">
            </div>    
           
                <p class="section-adv__list__text">
                    20&nbsp;лет на&nbsp;рынке металла
                </p>
            </li>
        </ul>
    </div>
</section> -->

<?php //get_template_part('template-parts/bestselling-block') 
?>

<?php //get_template_part('template-parts/section-categories') 
?>

<?php get_template_part('template-parts/catalog-block')
?>

<section class="section-we-work">
    <div class="container">
        <h2 class="title2">Как заказать металл</h2>

        <ul class="section-we-work__steps">
            <li class="section-we-work__steps__item element-animation">
                <div class="step-item__text">
                    <p class="caption"><span>01</span> /шаг</p>
                    <p><strong>Оформляете заказ</strong></p>
                    <p>Оставляете заявку на&nbsp;сайте, в&nbsp;мессенджере или по&nbsp;телефону :
                        <a href="tel:88888">8 985 717 02 34</a>
                    </p>
                </div>
                <div class="steps-item__img">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/how-we-work/img-step1.png' ?>" alt="">
                </div>
            </li>
            <li class="section-we-work__steps__item element-animation2">
                <div class="step-item__text">
                    <p class="caption"><span>02</span> /шаг</p>
                    <p><strong>Доставка или самовывоз</strong></p>
                    <p>Звонок от менеджера для уточнения деталей заказа</p>
                </div>
                <div class="steps-item__img">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/how-we-work/img-step22.webp' ?>" alt="">
                </div>
            </li>
            <li class="section-we-work__steps__item element-animation">
                <div class="step-item__text">
                    <p class="caption"><span>03</span> /шаг</p>
                    <p><strong>Доставляем</strong></p>
                    <p>Собственным транспортом</p>
                </div>
                <div class="steps-item__img">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/how-we-work/img-step3.webp' ?>" alt="">
                </div>
            </li>
            <li class="section-we-work__steps__item element-animation">
                <div class="step-item__text">
                    <p><strong>Нужна помощь с&nbsp;заказом?</strong></p>
                    <p>Звоните по&nbsp;номеру <a href="tel:898589955">8&nbsp;985&nbsp;717&nbsp;02&nbsp;34</a></p>
                    <div class="we-work__buttons flex">
                        <a href="tel:+79857170234" class="button orange">Позвонить нам</a>
                        <a class="button white" href="<?php echo site_url('catalog'); ?>">Перейти в каталог</a>
                    </div>
                </div>
                <div class="steps-item__img">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/how-we-work/que.png' ?>" alt="">
                </div>
            </li>
            <li class="section-we-work__steps__item element-animation">
                <div class="step-item__text">
                    <p class="caption"><span>04</span> /шаг</p>
                    <p><strong>Приёмка товара</strong></p>
                    <p>Получаете и проверяете заказ</p>
                </div>
                <div class="steps-item__img">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/how-we-work/img-step4.png' ?>" alt="">
                </div>
            </li>
        </ul>
    </div>
</section>

<?php get_template_part('template-parts/faq') ?>
<?php get_template_part('template-parts/partners') ?>
<?php get_template_part('template-parts/contact-us') ?>
<?php get_template_part('template-parts/reviews') ?>

<!-- ОТЗЫВЫ И КАРТА ЯНДЕКС

<section class="ya-widget">
    <div class="container">

        <div class="ya-widget__inner">
            <div style="width:100%;height:800px;overflow:hidden;position:relative;"><iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/166946266983?comments"></iframe><a href="https://yandex.ru/maps/org/muraveynik/166946266983/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Муравейник на карте Клина — Яндекс Карты</a></div>

            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/muraveynik/166946266983/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Муравейник</a><a href="https://yandex.ru/maps/10733/klin/category/metal_rolling/184106664/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Металлопрокат в Клину</a><a href="https://yandex.ru/maps/10733/klin/category/hardware_store/184107753/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Строительный магазин в Клину</a><iframe src="https://yandex.ru/map-widget/v1/?ll=36.701873%2C56.350677&mode=search&oid=166946266983&ol=biz&sctx=ZAAAAAgBEAAaKAoSCUURUrez4UJAEQ%2FR6A5i5UtAEhIJDJQUWABTtj8Rz4JQ3sfRnD8iBgABAgMEBSgKOABA%2BpEHSAFqAnJ1nQHNzMw9oAEAqAEAvQHI3dzqwgEG576X9u0EggId0LzRg9GA0LDQstC10LnQvdC40Log0LrQu9C40L2KAgCSAgUxMDczM5oCDGRlc2t0b3AtbWFwcw%3D%3D&sll=36.701873%2C56.350677&sspn=0.021801%2C0.006934&text=%D0%BC%D1%83%D1%80%D0%B0%D0%B2%D0%B5%D0%B9%D0%BD%D0%B8%D0%BA%20%D0%BA%D0%BB%D0%B8%D0%BD&z=16" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>


    </div>
</section> -->

<?php get_footer() ?>