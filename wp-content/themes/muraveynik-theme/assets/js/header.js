jQuery(document).ready(function ($) {

   const headerFront = document.querySelector('.header-front');
   const headerSearch = document.querySelector('.header__actions__search');

   // Вверх и показ верхнего меню
   const headerChange = () => {
      const
         mainBlock = document.querySelector('body');


      window.addEventListener('scroll', () => {
         if (-mainBlock.getBoundingClientRect().top > 550) {
            headerFront.classList.add('header-scroll');
            // headerSearch.classList.add('show');

         } else {
            headerFront.classList.remove('header-scroll');
            //  headerSearch.classList.remove('show');
         }
      })
   }
   headerChange();

   $('.header__search-btn').on('click', function (e) {
      e.stopPropagation(); // клик по кнопке не считается кликом "вне"
      $('.header__actions__search').toggleClass('show');
   });

   $('.header__actions__search').on('click', function (e) {
      e.stopPropagation(); // клик внутри формы не закрывает её
   });

   $('span.close').on('click', function (e) {
      e.stopPropagation(); // не даём событию дойти до document
      $('.header__actions__search').removeClass('show');
   });

   $(document).on('click', function () {
      $('.header__actions__search').removeClass('show');
   });

   // === Мобильное меню ===
   const body = document.body;
   const menu = document.querySelector(".mobile-menu");
   const burger = document.querySelector(".menu-toggle");
   document.addEventListener("click", function (e) {
      if (burger && e.target.closest(".menu-toggle")) {
         e.stopPropagation();
         burger.classList.toggle("active");
         if (menu) menu.classList.toggle("active");
         body.classList.toggle("_fixed");
         return;
      }
      if (menu && e.target.closest(".mobile-menu .main-navigation a")) {
         if (burger) burger.classList.remove("active");
         menu.classList.remove("active");
         body.classList.remove("_fixed");
         return;
      }
      if (menu && !e.target.closest(".mobile-menu") && burger) {
         burger.classList.remove("active");
         menu.classList.remove("active");
         body.classList.remove("_fixed");
      }
   });


   $(document).ready(function () {

      // Открытие / закрытие по кнопке каталога
      $('.header__catalog__link').on('click', function (event) {
         event.preventDefault();
         $('.catalog-menu').toggleClass('open');
      });

      // Закрытие по кнопке .close-menu
      $('.close-menu').on('click', function () {
         $('.catalog-menu').removeClass('open');
      });

      // Закрытие при клике вне меню
      $(document).on('mouseup', function (e) {
         var div = $('.catalog-menu');

         if (!div.is(e.target) && div.has(e.target).length === 0) {
            div.removeClass('open');
         }
      });

   });
})