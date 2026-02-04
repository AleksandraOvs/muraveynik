jQuery(document).ready(function($)  {
        $('select').niceSelect();

	$('.catalog__menu li.menu-item-has-children > a, .sidebar__menu li.menu-item-has-children > a').removeAttr("href");

	//$('.catalog__menu li.menu-item-has-children, .sidebar__menu li.menu-item-has-children').append('<span class="catalog__menu__arrow"></span>');
	
	$('.catalog__menu li.menu-item-has-children a, .sidebar__menu li.menu-item-has-children a').on('click', function(){
		$(this).toggleClass('open');
    
	});


    $('.menu-item-has-children a .sub-menu-link').on('click', function(){
		$(this).toggleClass('open');
	});


    $('.catalog__menu li.menu-item-has-children a, .sidebar__menu li.menu-item-has-children a').on('click', function(){
		$(this).next().toggleClass('open');
});

function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('element-show');
      }
    });
  }
  let options = { threshold: [0.5] };
  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.element-animation, .element-animation2, .element-animation3, .frontpage__content:after');
  for (let elm of elements) {
    observer.observe(elm);
  }

  function scrollTo(to, duration = 700) {
    const
      element = document.scrollingElement || document.documentElement,
      start = element.scrollTop,
      change = to - start,
      startDate = +new Date(),
      // t = current time
      // b = start value
      // c = change in value
      // d = duration
      easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
      },
      animateScroll = function () {
        const currentDate = +new Date();
        const currentTime = currentDate - startDate;
        element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
        if (currentTime < duration) {
          requestAnimationFrame(animateScroll);
        }
        else {
          element.scrollTop = to;
        }
      };
    animateScroll();
  }
  $(window).on("load", function() {

    $('.js-load-lazy').each(function () {
      let src = $(this).attr('data-src');
      $(this).attr('src', src)
    });
  });
 
  
})//end ready


$(document).ready(function(){
  let timeout = undefined

  function update_cart() {
    if ( timeout !== undefined ) {
        clearTimeout( timeout )
      }

      timeout = setTimeout(function() {
        $("[name='update_cart']").removeAttr('disabled')
        $("[name='update_cart']").trigger("click")
      }, 500)
  }



  $('.woocommerce').on('change', 'input.qty', update_cart)

  setInterval(function(){
    $(".cart__counter").prop("onclick", null).off("click")

    $('.cart__counter').on( 'click', 'button.plus, button.minus', function(){
      var qty = $( this ).siblings('.quantity').find( '.qty' )
      var val = parseFloat(qty.val()) ? parseFloat(qty.val()) : '0'
      var max = parseFloat(qty.attr( 'max' ))
                
      var min = parseFloat(qty.attr( 'min' ))
      var step = parseFloat(qty.attr( 'step' ))
                

      if ( $(this).is( '.plus' ) ) {
        if ( max && ( max <= val ) ) {
          qty.val( max );
        } else {
          qty.val( val + step );
        }
      } else {
        if ( min && ( min >= val ) ) {
          qty.val( min )
        } else if ( val > 1 ) {
          qty.val( val - step )
        }
      }
    })

    $('.cart__counter-next').prop('onclick', null).off('click')
    $('.cart__counter-next').click(update_cart) 

    $('.cart__counter-prev').prop('onclick', null).off('click')
    $('.cart__counter-prev').click(update_cart)
  }, 1000)

  $(".message-close").click(function() {
    $(this).closest('.woocommerce-notices-wrapper, .woocommerce-NoticeGroup-checkout').hide();
  });
  var alertSuccess = $('.woocommerce-message');
  setTimeout(function() {
    alertSuccess.hide();
  }, 2500);   




// === FAQ ===
    document.querySelectorAll(".faq-question").forEach(btn => {
        btn.addEventListener("click", () => {
            const parent = btn.closest(".faq-item");
            if (!parent) return;
            const icon = btn.querySelector(".faq-icon");
            const answer = parent.querySelector(".faq-answer");
            parent.classList.toggle("active");
            if (icon) icon.classList.toggle("active");
            if (answer) answer.style.maxHeight = parent.classList.contains("active") ? answer.scrollHeight + "px" : null;
        });
    });

     // === Универсальный плавный скролл ===
    function easeInOutQuad(t) { return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t; }

    function smoothScrollToElement(selector, duration = 700) {
        const target = document.querySelector(selector);
        if (!target) return;
        document.documentElement.style.scrollBehavior = "auto";
        const element = document.scrollingElement || document.documentElement;
        const start = element.scrollTop;
        const targetTop = target.getBoundingClientRect().top + start - 160;
        const change = targetTop - start;
        const startTime = performance.now();

        function animate(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            element.scrollTop = start + change * easeInOutQuad(progress);
            if (elapsed < duration) requestAnimationFrame(animate);
            else document.documentElement.style.scrollBehavior = "";
        }
        requestAnimationFrame(animate);
    }

    function smoothScrollToTop(duration = 700) {
        const element = document.scrollingElement || document.documentElement;
        const start = element.scrollTop;
        const change = -start;
        const startTime = performance.now();

        function animate(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            element.scrollTop = start + change * easeInOutQuad(progress);
            if (elapsed < duration) requestAnimationFrame(animate);
        }
        requestAnimationFrame(animate);
    }


    // === Кнопка "вверх" ===
    const upArrow = document.querySelector(".arrow-up");
    if (upArrow) {
        upArrow.addEventListener("click", e => { e.preventDefault(); smoothScrollToTop(800); });
        window.addEventListener("scroll", () => {
            upArrow.classList.toggle("show", window.scrollY > 300);
        });
    }
});


// const div = document.querySelector( '#result');
 
// document.addEventListener( 'click', (e) => {
// 	const withinBoundaries = e.composedPath().includes(div);
 
// 	if ( ! withinBoundaries ) {
// 		div.style.display = 'none'; // скрываем элемент т к клик был за его пределами
// 	}
// })


 


