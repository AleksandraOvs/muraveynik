<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



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
