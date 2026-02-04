const tabsTitles = document.querySelectorAll('.tabs__titles > p');
const tabsItems = document.querySelectorAll('.tabs__items');

    for(let i = 0; i < tabsTitles.length; i++) {
        let tabsTitle = tabsTitles[i];
        let tabsItem = tabsItems[i];

        tabsTitle.onclick = () => {
           tabsTitles.forEach((title) => {
               title.classList.remove('active');
           });

           tabsItems.forEach((item) => {
               item.classList.remove('active');
           })
           tabsTitle.classList.add('active');
           tabsItem.classList.add('active');
        }
	}

	const woocommerceProductGalleryImageLinks = document.querySelectorAll('.woocommerce-product-gallery__image > a');
	
	woocommerceProductGalleryImageLinks.forEach((link) => link.setAttribute('data-fancybox', 1));
	
	const relatedProducts = document.querySelector('section.related ul.columns-4');
	const relatedProductsTitles = document.querySelectorAll('section.related ul.columns-4 li.product h2.woocommerce-loop-product__title');
	const relatedProductsPrices = document.querySelectorAll('section.related ul.columns-4 li.product span.woocommerce-Price-amount');
	const html3 = '<span class="price--min">&nbsp;&nbsp;р/шт</span>';
	
	const relatedProductsButton = document.querySelector('#relatedProductsButton');
	
	relatedProductsButton.addEventListener('click', () => {
		let relatedProductsTitlesMaxHeight = getComputedStyle(relatedProductsTitles[0]).height;

		for(let i = 1; i < relatedProductsTitles.length; i++) {
			if(getComputedStyle(relatedProductsTitles[i]).height > relatedProductsTitlesMaxHeight) relatedProductsTitlesMaxHeight = getComputedStyle(relatedProductsTitles[i]).height;
		}
		
		relatedProductsTitles.forEach((title) => title.style.height = relatedProductsTitlesMaxHeight);
	});
	
	relatedProductsPrices.forEach((price) => price.insertAdjacentHTML('beforeEnd', html3));
	
	relatedProducts.classList.add('owl-carousel');
	
	$(relatedProducts).owlCarousel({
		items: 4,
		loop: true,
		autoplay: true,
		dots: false,
		margin: 100,
		responsive: {
			860: {
				items: 4,
				margin: -50
			},
			1200: {
				items: 4,
				margin: 24
			}
		}
	});
	
	const quantityNumber = document.querySelector('.quantity-num');
	const quantityArrowMinus = document.querySelector('.quantity-arrow-minus');
	const quantityArrowPlus = document.querySelector('.quantity-arrow-plus');

	quantityArrowMinus.onclick = () => {
		if(quantityNumber.value >= 1) quantityNumber.value = quantityNumber.value - 1;
	}

	quantityArrowPlus.onclick = () => quantityNumber.value = +(quantityNumber.value) + 1;
	
	const woocommerceProductGalleryImages = document.querySelectorAll('.woocommerce-product-gallery__image img');
	
	woocommerceProductGalleryImages.forEach((image) => {
		image.removeAttribute('width');
		image.removeAttribute('height');
	});
	
	const productTitle = document.querySelector('.product__right-header h1');
	const productOrigin = document.querySelector('.product__origin');
	const productButton = document.querySelector('.product__button');
	
	if(productButton) {
		productButton.addEventListener('click', () => sessionStorage.setItem(productTitle.innerText, productOrigin.innerText));
	}


if(window.innerWidth <= 1200) {
	const productGalleryWrapper = document.querySelector('.woocommerce-product-gallery__wrapper');
	const catalogItems = document.querySelectorAll('.catalog__item');
	
	productGalleryWrapper.classList.add('owl-carousel');

	$(productGalleryWrapper).owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		center: true,
		dots: true
	});

	for (let i = 0; i < catalogItems.length; i++) {
		if(i > 2) catalogItems[i].style.display = 'none';
	}

}
