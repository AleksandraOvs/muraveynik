const variationsForm = document.querySelector('form.variations_form');
const groupedForm = document.querySelector('form.grouped_form');

if(cartPage && !variationsForm && !groupedForm) {
	const cartBarItemCenter = document.querySelector('.cart__bar-item--center');
	const cartBarItemRight = document.querySelector('.cart__bar-item--right');

	cartBarItemCenter.textContent = '2';
	cartBarItemRight.textContent = '3';
	
	const quantityNumbers = document.querySelectorAll('.quantity-num');
	const quantityArrowMinuses = document.querySelectorAll('.quantity-arrow-minus');
	const quantityArrowPluses = document.querySelectorAll('.quantity-arrow-plus');
	
	for(let i = 0; i < quantityNumbers.length; i++) {
		quantityArrowMinuses[i].onclick = () => {
		if(quantityNumbers[i].value >= 1) quantityNumbers[i].value = quantityNumbers[i].value - 1;
		}
		
		quantityArrowPluses[i].onclick = () => quantityNumbers[i].value = +(quantityNumbers[i].value) + 1;
	}
	
	$( 'body' ).on( 'change', '.quantity-num', function() { 
		$( '[name="update_cart"]' ).trigger( 'click' );
	} );
	
	$( 'body' ).on( 'click', '.quantity-arrow-minus', function() { 
		$( '[name="update_cart"]' ).trigger( 'click' );
	} );
	
	$( 'body' ).on( 'click', '.quantity-arrow-plus', function() { 
		$( '[name="update_cart"]' ).trigger( 'click' );
	} );
	
	const cartCount = document.querySelector('td.cart__cart-count');
	
	sessionStorage.setItem('cartCountContent', cartCount.innerText);
	
	const productTitles = document.querySelectorAll('.cart__text > a > h4');
	const productOrigins = document.querySelectorAll('.product__origin');
	
	for(let i = 0; i < productTitles.length; i++ ) {
		productOrigins[i].innerText = sessionStorage.getItem(productTitles[i].innerText);
	}
}
