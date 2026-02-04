<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



Container::make('theme_options', 'Настройки сайта')
    
        ->set_page_menu_position( 2 )
        ->set_icon ('dashicons-admin-generic')
        ->add_tab(__('Контакты'), array (
            Field::make('image', 'crb_working_icon', 'Иконка режим работы')
            ->set_width(50),
            Field::make('text', 'crb_working', 'Режим работы')
            ->set_width(50),
            Field::make('image', 'crb_address_icon', 'Иконка адреса')
            ->set_width(50),
            Field::make('text', 'crb_address', 'Адрес')
            ->set_width(50),

            Field::make('complex', 'contacts', 'Ссылки на мессенджеры')
            ->add_fields( array(

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

            


            
            Field::make('image', 'tel_contact_link_icon', 'Иконка для номера телефона')

            ->set_width(33),
    
    
            Field::make('text', 'tel_contact_link', 'Ссылка на телефон')

            ->set_width(33)
    
            ->help_text('ссылка на телефон вида +700000000, whatsApp - https://wa.me/+7900000000'),
    
            Field::make('text', 'tel_contact', 'Номер телефона')
    
            ->set_width(33)
    
            ->help_text('Номер телефона, отображающийся на сайте')
        ))

        ->add_tab(__('Главная страница'), array (
          
            Field::make('text', 'crb_hero_button_price', 'Ссылка на прайс'),

            Field::make('complex', 'crb_our_prods', 'Слайдер "Изделия из нашего металла"')
            ->add_fields( array (
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
            ->add_fields( array (
                Field::make('image', 'crb_dialog_button_img', 'Иконка мессенджера')
                ->set_width(30),
                Field::make('text', 'crb_dialog_button_link', 'Ссылка на мессенджер')
                ->set_width(30),
                Field::make('text', 'crb_dialog_button_link_text', 'Текст кнопки')
                ->set_width(30),      
            ))
            
        ))

        ->add_tab(__('WooCommerce поля'), array (
            Field::make('complex', 'crb_for_clients', 'Раздел "Покупателям"')
            ->add_fields( array (
                Field::make('text', 'crb_for_clients_head', 'Пункт'),
                Field::make('text', 'crb_for_clients_text', 'Пояснение'),          
            )),

            Field::make('rich_text', 'crb_checkout_info', 'Сведения о доставке в разделе оформления заказа')
            ->help_text('Также этот текст выводится на странице товара в табах (в разделе "Доставка")'),

            Field::make('rich_text', 'crb_product_pay', 'Сведения об оплате на странице товара в табах (в разделе "Доставка")')
            
           
            
        ));
    

            // Field::make('rich_text', 'delm_cond_item', 'Местная доставка'),
            // Field::make('complex', 'del_cond', 'Условия доставки')
            //     ->add_fields( array(
            //         Field::make('text', 'del_cond_item', 'Условие')
            //     ))
            

            

//         ->add_tab(__('Хедер сайта'), array(
//             Field::make ('text', 'header_contacts_tel', 'Текст кнопки'),
//             Field::make ('text', 'header_contacts_tel_link', 'Ссылка на номер телефона')
//                 ->help_text('ссылка на номер телефона вида tel:+700000000, whatsApp - https://wa.me/+7900000000'),
//             Field::make('image', 'header_contacts_tel_link_image', 'Иконка')
//         ))
        
//         ->add_tab(__('Футер сайта'), array(

//             Field::make('complex', 'footer_contacts', 'Ссылки')

//                 ->add_fields( array(

//                     Field::make('text', 'footer_contact_name', 'Название')

//                         ->set_width(33),

//                     Field::make('text', 'footer_contact_link', 'Ссылка на контакт')

//                         ->set_width(33),

//                     Field::make('image', 'footer_contact_image', 'Иконка контакта')

//                         ->set_width(33),

//                 )),

//             Field::make('text', 'footer_tel_contact_link', 'Ссылка на телефон')

//             ->set_width(33)

//             ->help_text('ссылка на телефон вида tel:+700000000, whatsApp - https://wa.me/+7900000000'),

//             Field::make('text', 'footer_tel_contact', 'Номер телефона')

//             ->set_width(33)

//             ->help_text('Номер телефона, отображающийся на сайте')
           

// ))

// ->add_tab(__('Contact Form'), array(

//             Field::make('text', 'contactform1_head', 'Contact form#1 heading'),
//             Field::make('text', 'contactform2_head', 'Contact form#2 heading'),
//             Field::make('text', 'contactform_shortcode', 'Contact form#1 shortcode'),

// ));