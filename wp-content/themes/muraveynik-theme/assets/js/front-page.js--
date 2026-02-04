const slider = document.querySelector('#slider');

makeSlider(slider);

if(window.innerWidth < 860 || isMobile) {
	makeSlider(sliderMobile);
}

function makeSlider(item) {
	$(item).owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		dots: true
	});
}
	
const sliderItems = document.querySelectorAll('.slider__item > a');
	
sliderItems.forEach((item) => item.addEventListener('click', (event) => {
	event.preventDefault();
	modalCatalogWrapper.classList.add('active');
}));

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


	if((window.innerWidth <= 1200 && slider) || (isMobile && slider)) {
		tabsItems.forEach((item) => {
			item.classList.add('owl-carousel');
		});

		makeCarousel('#tabsItems1 ul.columns-4');
		makeCarousel('#tabsItems2 ul.columns-4');
		makeCarousel('#tabsItems3 ul.columns-4');

		function makeCarousel(item) {
			$(item).owlCarousel({
				items: 3,
				//loop: true,
				autoplay: true,
				rewind: true,
				dots: false,
				nav: false,
				//center: true,
				margin: 70,
				responsive: {

					860: {
						items: 4,
						//center: true,
						nav: false
					},
					1030: {
						items: 5
					}
				}
			});
		}
	}

	
	const products1 = document.querySelectorAll('#tabsItems1 ul.columns-4 li.product');
	const products2 = document.querySelectorAll('#tabsItems2 ul.columns-4 li.product');
	const products3 = document.querySelectorAll('#tabsItems3 ul.columns-4 li.product');
	const productTitles1 = document.querySelectorAll('#tabsItems1 ul.columns-4 li.product h2.woocommerce-loop-product__title');
	const productTitles2 = document.querySelectorAll('#tabsItems2 ul.columns-4 li.product h2.woocommerce-loop-product__title');
	const productTitles3 = document.querySelectorAll('#tabsItems3 ul.columns-4 li.product h2.woocommerce-loop-product__title');
	
	if((window.innerWidth < 860 && slider) || (isMobile && slider)) {
		const tabsTitleMobile = document.querySelector('.tabs__titles-mobile p');
		const modalSelectTexts = document.querySelectorAll('div.modal-select p');
		
		for(let i = 0; i < modalSelectTexts.length; i++) {
				let modalSelectText = modalSelectTexts[i];
				
				modalSelectTexts.forEach((text) => text.onclick = () => {
					document.querySelector('button.fancybox-close-small').click();
					
					tabsItems.forEach((item) => {
						item.classList.remove('active');
					});
					
					tabsTitleMobile.innerText = text.innerText;
					
					switch(text.innerText) {
						case 'Популярные товары':
						tabsItems[0].classList.add('active');
						let productTitles1MaxHeight = getComputedStyle(productTitles1[0]).height;
						correctHeight(productTitles1, productTitles1MaxHeight);
						break;
						
						case 'Сезонное предложение':
						tabsItems[1].classList.add('active');
						let productTitles2MaxHeight = getComputedStyle(productTitles2[0]).height;
						correctHeight(productTitles2, productTitles2MaxHeight);
						break;
						
						case 'Распродажа':
						tabsItems[2].classList.add('active');
						let productTitles3MaxHeight = getComputedStyle(productTitles3[0]).height;
						correctHeight(productTitles3, productTitles3MaxHeight);
						break;
					}
				});
		}
		
		tabsTitleMobile.addEventListener('click', () => {
			tabsItems.forEach((item) => item.classList.remove('active'));
			
			switch(tabsTitleMobile.innerText) {
				case 'Популярные товары':
				tabsItems[0].classList.add('active');
				break;
				
				case 'Сезонное предложение':
				tabsItems[1].classList.add('active');
				break;
				
				case 'Распродажа':
				tabsItems[2].classList.add('active');
				break;
			}
		});
	}
	
	if(slider) {
		const tabsMoreButtons = document.querySelectorAll('.tabs__more');
		
		let productTitles1MaxHeight = getComputedStyle(productTitles1[0]).height;
		
		correctHeight(productTitles1, productTitles1MaxHeight);
		
		tabsTitles[1].addEventListener('click', () => {
			let productTitles2MaxHeight = getComputedStyle(productTitles2[0]).height;
			correctHeight(productTitles2, productTitles2MaxHeight);
		});
		
		tabsTitles[2].addEventListener('click', () => {
			let productTitles3MaxHeight = getComputedStyle(productTitles3[0]).height;
			correctHeight(productTitles3, productTitles3MaxHeight);
		});
		
		const productPrices1 = document.querySelectorAll('#tabsItems1 ul.columns-4 li.product span.woocommerce-Price-amount');
		const productPrices2 = document.querySelectorAll('#tabsItems2 ul.columns-4 li.product span.woocommerce-Price-amount');
		const productPrices3 = document.querySelectorAll('#tabsItems3 ul.columns-4 li.product span.woocommerce-Price-amount');
		
		let flag = true;
		
		function correctHeight(elems, maxHeight) {
			for(let i = 1; i < elems.length; i++) {
				if(getComputedStyle(elems[i]).height > maxHeight) maxHeight = getComputedStyle(elems[i]).height;
			}
			elems.forEach((elem) => elem.style.height = maxHeight);
		}
		
		if(window.innerWidth > 1200) {
			showMoreProducts(products1, tabsMoreButtons[0]);
			showMoreProducts(products2, tabsMoreButtons[1]);
			showMoreProducts(products3, tabsMoreButtons[2]);
			
			function showMoreProducts (prod, btn) {
				for(let i = 0; i < prod.length; i++) {
					if(i > 9) {
						prod[i].style.display = 'none';
						btn.style.display = 'block';
						
						btn.onclick = () => {
							if(flag) {
								for(let j = 10; j < prod.length; j++) {
									prod[j].style.display = '';
									btn.textContent = 'скрыть';
								}
							} else {
								for(let j = 10; j < prod.length; j++) {
									prod[j].style.display = 'none';
									btn.textContent = 'показать больше';
									//tabsTitles[0].scrollIntoView();
									window.scrollTo(0, 500);
								}
							}
							flag = !flag;
						}
					}
				}
			}
		}
	}

