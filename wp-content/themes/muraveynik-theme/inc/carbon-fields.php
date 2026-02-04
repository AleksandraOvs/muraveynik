<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'site_carbon');
function site_carbon()
{
    Container::make('post_meta', 'Контент главной страницы')
        ->where('post_id', '=', get_option('page_on_front')) // только главная
        ->add_tab('Преимущества', [
            Field::make('text', 'crb_advs_head', 'Заголовок блока')
                ->set_width(50),

            Field::make('complex', 'crb_advs_items', 'Список преимуществ')
                ->set_layout('tabbed-vertical')
                ->set_header_template('<%- crb_adv_item_head %>') // заголовок каждого элемента
                ->add_fields([
                    Field::make('image', 'crb_adv_item_icon', 'Иконка преимущества')
                        ->set_width(33),

                    Field::make('text', 'crb_adv_item_head', 'Заголовок преимущества')
                        ->set_width(33),

                    Field::make('rich_text', 'crb_adv_item_desc', 'Описание преимущества')
                        ->set_width(33),
                ]),
        ])
        ->add_tab('Категории для главной страницы', [
            Field::make('association', 'crb_main_categories', 'Основные категории товаров')
                ->set_types([
                    [
                        'type' => 'term',
                        'taxonomy' => 'product_cat',
                    ],
                ])
                ->set_max(6) // максимум 10 категорий можно выбрать
                ->set_help_text('Выберите категории для отображения на главной (максимум 6шт.)')
        ])

        ->add_tab('FAQ', array(
            Field::make('rich_text', 'crb_faq_description', 'Текстовая область'),
            Field::make('complex', 'crb_faq', 'Вопросы и ответы')
                ->set_layout('tabbed-vertical')
                ->add_fields('faq_item', 'FAQ элемент', array(
                    Field::make('text', 'question', 'Вопрос')
                        ->set_width(50),
                    Field::make('rich_text', 'answer', 'Ответ')
                        ->set_width(50),
                )),
            Field::make('complex', 'crb_faq_slider', 'Слайдер')
                ->add_fields('faq_slider_item', 'Изображение для слайдера', array(
                    Field::make('image', 'faq_img', 'Изображение')
                        ->set_width(50)
                )),
        ))

        ->add_tab('Блок Партнеры', array(
            Field::make('rich_text', 'crb_partners_text', 'Заголовок'),
            Field::make('rich_text', 'crb_partners_description', 'Текстовая область'),
            Field::make('complex', 'crb_partners_list', 'Список партнеров')
                ->add_fields('partners_list_item', 'Логотип', array(
                    Field::make('image', 'partners_list_item_img', 'Изображение логотипа')
                        ->set_width(50),
                    Field::make('text', 'partners_list_item_sign', 'Подпись к лого')
                        ->set_width(50)
                )),
        ))

        ->add_tab('Отзывы', array(
            Field::make('complex', 'crb_rw_list', 'Слайдер отзывов')
                ->add_fields('rw_list_item', 'Скрины отзыва', array(
                    Field::make('image', 'crb_rw_img', 'Скрин отзыва')
                )),
        ));


    Container::make('post_meta', ' Условия доставки')
        ->show_on_page('oformlenie-zakaza')
        ->add_fields(array(
            Field::make('complex', 'crb_delivery_items', 'Условия доставки')
                ->add_fields(array(
                    Field::make('text', 'crb_delivery_title', 'Вопрос')
                        ->set_width(20),
                    Field::make('rich_text', 'crb_delivery_content', 'Ответ')
                        ->set_width(60),
                ))
        ));

    Container::make('post_meta', 'О компании')
        ->show_on_page('o-kompanii')
        ->add_tab(__(' Пункты "О компании" '), array(
            Field::make('complex', 'crb_about_items', 'Пункты о компании')
                ->add_fields(array(
                    Field::make('text', 'crb_about_title', 'Заголовок')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_about_content', 'Текст')
                        ->set_width(33),
                    Field::make('image', 'crb_about_img', 'Изображение')
                        ->set_width(33)
                ))
        ))

        ->add_tab(__(' Преимущества '), array(
            Field::make('complex', 'crb_adv_items', 'Преимущества')
                ->add_fields(array(
                    Field::make('text', 'crb_adv_item', 'Преимущество')
                        ->set_width(70),
                    Field::make('image', 'crb_adv_img', 'Преимущество иконка')
                        ->set_width(30)
                ))
        ));

    // Container::make('post_meta', 'Вкладки на странице товара')
    //             ->show_on_post_type( 'product' )
    //             ->add_fields( array(
    //               //  Field::make('rich_text', 'crb_product_characteristics', 'Характеристики'),
    //                 Field::make('rich_text', 'crb_product_delivery', 'Информация о доставке'),
    //                 Field::make('rich_text', 'crb_product_pay', 'Информация об оплате')

    // ));

    Container::make('post_meta', 'Контакты')
        ->show_on_page('kontakty')
        ->add_fields(array(
            Field::make('image', 'crb_contact_item_img', 'Иконка-адрес')
                ->set_width(25),
            Field::make('text', 'crb_contact_address', 'Адрес')
                ->set_width(25),

            Field::make('image', 'crb_contact_item_phones_img', 'Иконка-телефоны')
                ->set_width(25),
            Field::make('rich_text', 'crb_contact_item_phone', 'Телефоны')
                ->set_width(25),

            Field::make('image', 'crb_contact_item_working_img', 'Иконка-режим работы')
                ->set_width(25),
            Field::make('rich_text', 'crb_contact_item_working', 'Режим работы')
                ->set_width(25),

            Field::make('complex', 'crb_contacts_messengers')
                ->add_fields(array(
                    Field::make('image', 'crb_contact_item_working_img', 'Иконка мессенджера')
                        ->set_width(25),
                    Field::make('rich_text', 'crb_contact_item_working', 'Ссылка на мессенджер')
                        ->set_width(25),
                )),

            Field::make('rich_text', 'crb_contact_map', 'Ссылка на карту'),

            Field::make('complex', 'crb_contacts_driving')
                ->add_fields(array(
                    Field::make('image', 'crb_contacts_driving_img', 'Иконка мессенджера')
                )),
        ));

    // Container::make('post_meta', ' Информация о товаре')
    //     ->show_on_post_type( 'product' )
    //     ->add_fields ( array (
    //         Field::make('rich_text', 'crb_character_items', 'Характеристики'),

    //              ->add_fields( array(
    //                  Field::make('text', 'crb_delivery_title', 'Вопрос')
    //                  ->set_width(20),
    //                  Field::make('rich_text', 'crb_delivery_content', 'Ответ')
    //                  ->set_width(60),
    //              ))
    // ));




    // Container::make('post_meta', 'Свяжитесь с нами')
    //     ->show_on_page('main')
    //     ->set_classes( 'contact-us' )
    //     ->add_fields( array(
    //         Field::make('text', 'contact-us-head'),
    //         Field::make('text', 'contact-us-head_button'),
    //         Field::make('text', 'contact-us-head_button_link')

    //         ));

    // Container::make('post_meta', 'Отзывы')
    //     ->show_on_page('main')
    //     ->set_classes( 'feedb-us' )
    //     ->add_fields( array(
    //         Field::make('complex', 'feedb')
    //             ->add_fields( array (
    //                 Field::make('image', 'feedb_img', 'Аватар'),
    //                 Field::make('text', 'feedb_name', 'Имя'),
    //                 Field::make('text', 'feedb_text', 'Текст отзыва'),
    //                 Field::make('date', 'feedb_date', 'Дата')
    //                 ->set_storage_format( 'Y-m-d' ),
    //             ))
    //         ));





    //->add_fields( array(
    //  Field::make('complex', 'about_us', 'О нас')
    //            ->show_on_post_type('portfolio')
    //            ->add_fields (array (
    //                Field::make('text', 'crb_portfolio_link', 'Youtube link')
    //                ->set_width(33),
    //                Field::make('image', 'crb_portfolio_placeholder', 'Project Placeholder')
    //                ->set_width(33),
    //                Field::make('media_gallery', 'crb_portfolio_sources', 'Project Sources')
    //                ->set_width(33)
    //                -> set_type('video')
    //            ));


    //));



    // ->add_tab( 'Header content', array(
    //     Field::make('text', 'crb_main_header', 'Main header')
    //     ->set_width(20),

    //     Field::make('complex', 'crb_header_list')
    //         ->set_width(20)
    //         ->set_classes( 'complex-column' )
    //         ->add_fields( array (
    //             Field::make('text', 'header_list_item', 'Header list item')
    //         )),

    //     Field::make('text', 'crb_button_text', 'Button text' )
    //     ->set_width(15),

    //     Field::make('text', 'crb_button_link', 'Button link' )
    //     ->set_width(15),


    //     Field::make( 'media_gallery', 'crb_hero_video', 'Видео для первого экрана' )
    //      ->set_type( 'video' )
    //      ->set_width(10),
    //     ))

    // ->add_tab( 'Count block', array(
    //              Field::make( 'complex', 'counts')
    //              ->set_classes('block-counts')
    //              ->add_fields (array (
    //                 Field::make('image', 'crb_counts_icon', 'Count icon')
    //                 ->set_width(33),
    //                 Field::make('text', 'crb_counts_number', 'Number')
    //                 ->set_width(33),
    //                 Field::make('text', 'crb_counts_description', 'Description')
    //                 ->set_width(33)
    //              ))
    //         ))

    // ->add_tab( 'Video Types', array(
    //          Field::make( 'complex', 'video_types')
    //          ->add_fields (array (
    //              Field::make('image', 'crb_vtypes_image', 'Video Types Image')
    //              ->set_width(25),
    //              Field::make('image', 'crb_vtypes_gif', 'Video Types Gif')
    //              ->set_width(25),
    //              Field::make('text', 'crb_vtypes_subtitle', 'Video Types Subtitle')
    //              ->set_width(25),
    //              Field::make('text', 'crb_vtypes_text', 'Video Types Text')
    //              ->set_width(25)
    //              ))
    //          ))

    // ->add_tab( 'How we work', array(
    //      Field::make( 'complex', 'we_work')
    //      ->add_fields (array (
    //          Field::make('image', 'crb_we_work_image', 'We Work Image')
    //          ->set_width(25),
    //          Field::make('text', 'crb_we_work_count', 'We Work Count')
    //          ->set_width(25),
    //          Field::make('text', 'crb_we_work_subtitle', 'We Work Subtitle')
    //          ->set_width(25),
    //          Field::make('text', 'crb_we_work_text', 'We Work Text')
    //          ->set_width(25)
    //          ))
    //      ))

    // ->add_tab( 'Cases', array(
    //     Field::make( 'complex', 'cases')
    //     ->add_fields (array (
    //                 Field::make('image', 'crb_cases_image', 'We Work Image')
    //                 ->set_width(33),
    //                 Field::make('text', 'crb_cases_subtitle', 'We Work Subtitle')
    //                 ->set_width(33),
    //                 Field::make('text', 'crb_cases_text', 'We Work Text')
    //                 ->set_width(33)
    //                 ))
    //         ));
    // Container::make('post_meta', 'Добавить в портфолио')
    //        ->show_on_post_type('portfolio')
    //        ->add_fields (array (
    //            Field::make('text', 'crb_portfolio_link', 'Youtube link')
    //            ->set_width(33),
    //            Field::make('image', 'crb_portfolio_placeholder', 'Project Placeholder')
    //            ->set_width(33),
    //            Field::make('media_gallery', 'crb_portfolio_sources', 'Project Sources')
    //            ->set_width(33)
    //            -> set_type('video')
    //        ));


    Container::make('theme_options', 'Настройки сайта')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-admin-generic')
        ->add_tab(__('Контакты'), array(
            Field::make('image', 'crb_working_icon', 'Иконка режим работы')
                ->set_width(50),
            Field::make('text', 'crb_working', 'Режим работы')
                ->set_width(50),
            Field::make('image', 'crb_address_icon', 'Иконка адреса')
                ->set_width(50),
            Field::make('text', 'crb_address', 'Адрес')
                ->set_width(50),

            Field::make('complex', 'contacts', 'Ссылки на мессенджеры')
                ->add_fields(array(

                    Field::make('text', 'contact_name', 'Название')
                        ->set_width(33),
                    Field::make('text', 'contact_link', 'Ссылка на контакт')
                        ->set_width(33),
                    Field::make('image', 'contact_image', 'Иконка контакта')
                        ->set_width(33),
                )),


            Field::make('text', 'crb_messenger', 'Ссылка на мессенджер')
                ->set_width(50),
            Field::make('image', 'crb_messengers_image', 'Иконка')
                ->set_width(50),

            Field::make('image', 'mail_contact_link_icon', 'Иконка для email')
                ->set_width(33),
            Field::make('text', 'mail_contact_link', 'Ссылка на email')
                ->set_width(33)
                ->help_text('ссылка на email вида mailto:info@mail.com'),
            Field::make('text', 'mail_contact', 'Email подпись')
                ->set_width(33)
                ->help_text('Почта, отображается в ссылке'),


            Field::make('image', 'tel_contact_link_icon', 'Иконка для номера телефона')
                ->set_width(33),
            Field::make('text', 'tel_contact_link', 'Ссылка на телефон')
                ->set_width(33)
                ->help_text('ссылка на телефон вида +700000000, whatsApp - https://wa.me/+7900000000'),
            Field::make('text', 'tel_contact', 'Номер телефона')
                ->set_width(33)
                ->help_text('Номер телефона, отображающийся на сайте')
        ))

        ->add_tab(__('Главная страница'), array(

            Field::make('text', 'crb_hero_button_price', 'Ссылка на прайс'),

            Field::make('complex', 'crb_our_prods', 'Слайдер "Изделия из нашего металла"')
                ->add_fields(array(
                    Field::make('image', 'crb_our_prods_img', 'Изображение для слайда')
                ))
                ->set_width(50),

            Field::make('rich_text', 'crb_our_prods_text', 'Текст Изделия из нашего металла')
                ->set_width(50),
            Field::make('image', 'crb_dialog_img', 'Фото для блока "Мы открыты диалогу"')
                ->set_width(50),
            Field::make('rich_text', 'crb_dialog_text', 'Текст для блока "Мы открыты диалогу"')
                ->set_width(50),

            Field::make('complex', 'crb_dialog_buttons', 'Кнопки мессенджеров в блоке "Мы открыты диалогу"')
                ->add_fields(array(
                    Field::make('image', 'crb_dialog_button_img', 'Иконка мессенджера')
                        ->set_width(30),
                    Field::make('text', 'crb_dialog_button_link', 'Ссылка на мессенджер')
                        ->set_width(30),
                    Field::make('text', 'crb_dialog_button_link_text', 'Текст кнопки')
                        ->set_width(30),
                ))

        ))

        ->add_tab(__('WooCommerce поля'), array(
            Field::make('complex', 'crb_for_clients', 'Раздел "Покупателям"')
                ->add_fields(array(
                    Field::make('text', 'crb_for_clients_head', 'Пункт'),
                    Field::make('text', 'crb_for_clients_text', 'Пояснение'),
                )),

            Field::make('rich_text', 'crb_checkout_info', 'Сведения о доставке в разделе оформления заказа')
                ->help_text('Также этот текст выводится на странице товара в табах (в разделе "Доставка")'),

            Field::make('rich_text', 'crb_product_pay', 'Сведения об оплате на странице товара в табах (в разделе "Доставка")')



        ));
}
