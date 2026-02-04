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


   $(document).mouseup(function (e) { // событие клика по веб-документу
      // if (window.innerWidth >= 1200) {
      $('.header__catalog__link').click(function (event) {
         $('.header__catalog').find('.catalog__menu').addClass('open');
      });

      var div = $(".catalog__menu"); // тут указываем ID элемента
      if (!div.is(e.target) // если клик был не по нашему блоку
         && div.has(e.target).length === 0) { // и не по его дочерним элементам
         div.removeClass('open'); // скрываем его
      };


      //}
   });
})