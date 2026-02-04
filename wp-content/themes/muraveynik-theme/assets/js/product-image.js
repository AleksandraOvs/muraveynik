//slick-slider product
$('.product__swiper').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: $('.product-image__slider-prev'),
    nextArrow: $('.product-image__slider-next'),
    //dots: false,
    // responsive: [
    //     {
    //         breakpoint: 576,
    //         settings: {
    //             arrows: false,
    //         }
    //     }
    // ]

})

$('.product__swiper__nav').slick({
    slidesToShow: 7,
    slidesToScroll: 5,

    asNavFor: '.product__swiper',
    //dots: true,
    arrows: false,
   // centerMode: true,
    focusOnSelect: true,
});

$('.section-bestselling__products').slick({
    slidesToShow: 7,
    slidesToScroll: 5,
    arrows: true,
    dots: false,
    prevArrow: $('.bs-slider-prev'),
    nextArrow: $('.bs-slider-next'),
    responsive: [
        {
          breakpoint: 1800,
          settings: {
            slidesToShow: 6,
            slidesToScroll: 3,
            infinite: true,
          }
        },

        {
            breakpoint: 1400,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 3,
              infinite: true,
            }
          },
        
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
            }
          },

          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
            }
          },

          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            }
          },

      ]
});

$('.categories__list').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  prevArrow: $('.categories-slider-prev'),
  nextArrow: $('.categories-slider-next'),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    }


  ]
});

$('.our-products__section__slider').slick({
  slidesToShow: 1,
  //slidesToScroll: 5,
  arrows: true,
  dots: false,
  prevArrow: $('.our-prods-slider-prev'),
  nextArrow: $('.our-prods-slider-next'),
});