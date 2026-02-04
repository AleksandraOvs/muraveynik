	const orderPageMain = document.querySelector('div.order--main');
	
	if(orderPageMain) {
	$( function() {
		$("#input8").datepicker({dateFormat: "dd/mm/yy"});
	  } );
	$('#input9').timepicker({
        showOn: 'button',
        button: '#input9'
	});

	const radioButton1 = document.querySelector('#radio1');
	const radioButton2 = document.querySelector('#radio2');
	const radioButton3 = document.querySelector('#radio3');
	const radioButton4 = document.querySelector('#radio4');
	const orderItem1 = document.querySelector('#orderItem1');
	const orderItem2 = document.querySelector('#orderItem2');
	const orderItem3 = document.querySelector('#orderItem3');
	const orderItem4 = document.querySelector('#orderItem4');
	const orderItem5 = document.querySelector('#orderItem5');
	const orderWarning = document.querySelector('.order__warning');
	
	const firstNameField = document.querySelector('#billing_first_name');
	const lastNameField = document.querySelector('#billing_last_name');
	const companyNameField = document.querySelector('#billing_company');
	const INNField = document.querySelector('#billing_address_1');
	const paymentMethodField = document.querySelector('#billing_address_2');
	const phoneField = document.querySelector('#billing_phone');
	const emailField = document.querySelector('#billing_email');
	
	const corpusField = document.querySelector('#shipping_city');
	const floorField = document.querySelector('#shipping_state');
	const flatField = document.querySelector('#shipping_postcode');
	const dateField = document.querySelector('#shipping_first_name');
	const timeField = document.querySelector('#shipping_last_name');
	const cityField = document.querySelector('#shipping_company');
	const streetField = document.querySelector('#shipping_address_1');
	const houseField = document.querySelector('#shipping_address_2');
	const doorphoneField = document.querySelector('#doorphone');
	
	const companyName = document.querySelector('#input1');
	const INN = document.querySelector('#input2');
	const email1 = document.querySelector('#input3');
	const firstName = document.querySelector('#input4');
	const lastName = document.querySelector('#input5');
	const phone = document.querySelector('#input6');
	const email2 = document.querySelector('#input7');
	const paymenrMethod1 = document.querySelector('#radio5');
	const paymenrMethod2 = document.querySelector('#radio6');
	
	const date = document.querySelector('#input8');
	const time = document.querySelector('#input9');
	const city = document.querySelector('#input10');
	const street = document.querySelector('#input11');
	const house = document.querySelector('#input12');
	const corpus = document.querySelector('#input13');
	const flat = document.querySelector('#input14');
	const floor = document.querySelector('#input15');
	const doorphone = document.querySelector('#input16');

	if(radioButton1 && radioButton2) {
		radioButton1.onclick = () => {
			orderItem1.style.opacity = '0.3';
			orderItem1.style.zIndex = '-1';
			
			orderItem2.style.opacity = '1.0';
			orderItem2.style.zIndex = '1';
			
			companyName.removeAttribute('required');
			INN.removeAttribute('required');
			email1.removeAttribute('required');
			
			firstName.setAttribute('required', 1);
			lastName.setAttribute('required', 1);
			phone.setAttribute('required', 1);
			email2.setAttribute('required', 1);
		}
	
		radioButton2.onclick = () => {
			orderItem1.style.opacity = '1.0';
			orderItem1.style.zIndex = '1';
			
			orderItem2.style.opacity = '0.3';
			orderItem2.style.zIndex = '-1';
			
			companyName.setAttribute('required', 1);
			INN.setAttribute('required', 1);
			email1.setAttribute('required', 1);
			
			firstName.removeAttribute('required');
			lastName.removeAttribute('required');
			phone.removeAttribute('required');
			email2.removeAttribute('required');
		}
		
		//const orderItem3Bottom = getComputedStyle(orderItem3).bottom;
	
		radioButton3.onclick = () => {
			orderItem4.style.opacity = '0.3';
			orderItem4.style.zIndex = '-1';
			orderItem5.style.opacity = '0.3';
			orderItem5.style.zIndex = '-1';
			orderWarning.style.display = 'none';
			
			city.removeAttribute('required');
			street.removeAttribute('required');
			house.removeAttribute('required');
		}
	
		radioButton4.onclick = () => {
			orderItem4.style.opacity = '1.0';
			orderItem4.style.zIndex = '1';
			orderItem5.style.opacity = '1.0';
			orderItem5.style.zIndex = '1';
			orderWarning.style.display = 'block';
			//orderItem3.style.bottom = 

			city.setAttribute('required', 1);
			street.setAttribute('required', 1);
			house.setAttribute('required', 1);
		}	
	}

	const cartBarItemLeftOrder = document.querySelector('.cart__bar-item--left--order');
	const cartBarItemRightOrder = document.querySelector('.cart__bar-item--right--order');
	const cartBarItemCenterOrder2 = document.querySelector('.cart__bar-item--center--order2');

	cartBarItemLeftOrder.textContent = '1';
	if(cartBarItemRightOrder) cartBarItemRightOrder.textContent = '3';
	if(cartBarItemCenterOrder2) cartBarItemCenterOrder2.textContent = '2';
	
	passValueToField(firstName, firstNameField);
	passValueToField(lastName, lastNameField);
	passValueToField(phone, phoneField);
	passValueToField(email1, emailField);
	passValueToField(email2, emailField);
	passValueToField(companyName, companyNameField);
	passValueToField(INN, INNField);
	passValueToField(paymenrMethod1, paymentMethodField);
	passValueToField(paymenrMethod2, paymentMethodField);
	
	passValueToField(date, dateField);
	passValueToField(time, timeField);
	passValueToField(city, cityField);
	passValueToField(street, streetField);
	passValueToField(house, houseField);
	passValueToField(corpus, corpusField);
	passValueToField(flat, flatField);
	passValueToField(floor, floorField);
	passValueToField(doorphone, doorphoneField);
	
	function passValueToField(input, field) {
		input.value = field.value;
		input.oninput = () => field.value = input.value;
	}
	
	}
	
	const orderCartCount = document.querySelector('td.order__cart-count');
	
	if(orderCartCount) orderCartCount.innerText = sessionStorage.getItem('cartCountContent');
