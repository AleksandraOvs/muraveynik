	const catalogFilterButton = document.querySelector('.catalog__filter-button');
	const filtersCloseButton = document.querySelector('#filtersCloseButton');
	const modalFiltersWrapper = document.querySelector('.modal-filters-wrapper');
	const premmerceActiveFiltersWidgetWrappers = document.querySelectorAll('.premmerce-active-filters-widget-wrapper');
	const filterItems = document.querySelectorAll('.filter__item');
	
	catalogFilterButton.addEventListener('click', () => {
		modalFiltersWrapper.classList.add('active');
		catalogPage.classList.add('hidden');
	});
	
	filtersCloseButton.addEventListener('click', () => {
		modalFiltersWrapper.classList.remove('active');
		catalogPage.classList.remove('hidden');
	});
	
	premmerceActiveFiltersWidgetWrappers.forEach((wrapper) => {
		
		if(wrapper.innerHTML === '') {
			wrapper.attributeStyleMap.set('display', 'none');
		}
	});
	
	if(filterItems.length >= 4) {
		filterItems[(filterItems.length / 2) - 2].attributeStyleMap.set('display', 'none');
		filterItems[filterItems.length - 2].attributeStyleMap.set('display', 'none');
	}
	if(filterItems.length <= 4) document.querySelector('.filter__item--type-submit-button').attributeStyleMap.set('display', 'none');
	
		
	const catalogItems = document.querySelector('div.catalog__items');
	const catalogProducts = document.querySelector('section.catalog ul.columns-4');
	const catalogSingleProducts = document.querySelectorAll('section.catalog ul.columns-4 li.product');
	
	if(catalogProducts) {
		const catalogProductsTitles = document.querySelectorAll('section.catalog ul.columns-4 li.product h2.woocommerce-loop-product__title');
		const catalogCategoriesTitles = document.querySelectorAll('section.catalog ul.columns-4 li.product-category h2.woocommerce-loop-category__title');
		const catalogProductsPrices = document.querySelectorAll('section.catalog ul.columns-4 li.product span.woocommerce-Price-amount');
		
		if(catalogProductsTitles.length > 0) {
			let catalogProductsTitlesMaxHeight = getComputedStyle(catalogProductsTitles[0]).height;
			
			for(let i = 1; i < catalogProductsTitles.length; i++) {
				if(getComputedStyle(catalogProductsTitles[i]).height > catalogProductsTitlesMaxHeight) catalogProductsTitlesMaxHeight = getComputedStyle(catalogProductsTitles[i]).height;
			}
			catalogProductsTitles.forEach((title) => title.style.height = catalogProductsTitlesMaxHeight);
		}
		
		if(catalogCategoriesTitles.length > 0) {
			let catalogCategoriesTitlesMaxHeight = getComputedStyle(catalogCategoriesTitles[0]).height;
			
			for(let i = 1; i < catalogCategoriesTitles.length; i++) {
				if(getComputedStyle(catalogCategoriesTitles[i]).height > catalogCategoriesTitlesMaxHeight) catalogCategoriesTitlesMaxHeight = getComputedStyle(catalogCategoriesTitles[i]).height;
			}
			catalogCategoriesTitles.forEach((title) => title.style.height = catalogCategoriesTitlesMaxHeight);
			
			catalogCategoriesTitles.forEach((title) => title.style.paddingBottom = '40px');
			
		}
		
		const woocommercePagination = document.querySelector('nav.woocommerce-pagination');
		const container = document.querySelector('div.container');
		const catalogSidebar = document.querySelector('aside#secondary');
		
		if(window.innerWidth > 1201 && woocommercePagination) {
			catalogPage.style.paddingBottom = '140px';
			woocommercePagination.style.left = (1170 / 2) - (woocommercePagination.offsetWidth / 2) - catalogSidebar.offsetWidth + 'px';
		} else if(window.innerWidth > 861 && woocommercePagination) {
			catalogPage.style.paddingBottom = '140px';
			woocommercePagination.style.left = (834 / 2) - (woocommercePagination.offsetWidth / 2) + 'px';
		} else if(window.innerWidth < 860 && woocommercePagination) {
			catalogPage.style.paddingBottom = '128px';
			woocommercePagination.style.left = (343 / 2) - (woocommercePagination.offsetWidth / 2) + 'px';
		}
		
		const priceMeters = document.querySelectorAll('span.price--meter');

		if(priceMeters.length > 0) document.querySelectorAll('span.woocommerce-Price-currencySymbol').forEach((symbol) => symbol.insertAdjacentHTML('beforeEnd', '/метр'));
		
	}
	
	const catalogOptions = document.querySelectorAll('.catalog__option p');
	
	catalogOptions.forEach((option) => {
		option.onclick = () => {
			for(let i = 0; i < catalogSingleProducts.length; i++) {
				catalogSingleProducts[i].style.display = '';
			}
			
			if(option.textContent !== 'Все') {
				for(let i = 0; i < catalogSingleProducts.length; i++) {
					if(i >= option.textContent) catalogSingleProducts[i].style.display = 'none';
				}
			}
		}
	});
	
	const countSort = document.querySelector('select#count-sort');
	const countSortOptions = document.querySelectorAll('select#count-sort option');
	let count = 0;
	
	countSort.onclick = () => {
		if(count > 0) {
			for(let i = 0; i < catalogSingleProducts.length; i++) {
					catalogSingleProducts[i].style.display = '';
				}
				
			if(countSort.value !== 'Все') {
					for(let i = 0; i < catalogSingleProducts.length; i++) {
						if(i >= countSort.value) catalogSingleProducts[i].style.display = 'none';
					}
			}
		}
		count++;
	}
	
	const catalogHeader = document.querySelector('.catalog__header');
	const woocmmerceInfo = document.querySelector('p.woocommerce-info');
	
	if(woocmmerceInfo) {
		catalogHeader.style.display = 'none';
		document.querySelector('.catalog__sidebar').style.display = 'none';
	}

