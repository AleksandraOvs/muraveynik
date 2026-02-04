const catalogPage = document.querySelector('section.catalog');
const contactsPage = document.querySelector('section.contacts');
const productPage = document.querySelector('section.product');
const servicesPage = document.querySelector('section.services');
const actionsPage = document.querySelector('section.actions');
const cartPage = document.querySelector('form.cart');
const orderPage = document.querySelector('div.order');
const buyersPage = document.querySelector('div.buyers');
const basicPage = document.querySelector('section.basic-page');
const firstScreen = document.querySelector('section.first-screen');
const tabs = document.querySelector('div.tabs');
const about = document.querySelector('section.about');

let isMobile = false;

if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
		|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
	isMobile = true;
}

const burger = document.querySelector('.header__burger');
const burgerItems = document.querySelectorAll('.header__burger-item');
const headerFooter = document.querySelector('.header__footer');

burger.onclick = () => {
	burgerItems.forEach((item) => item.classList.toggle('active'));
	headerFooter.classList.toggle('active');
}

//const headerButton = document.querySelector('.header__button');
const modalCatalogWrapper = document.querySelector('.modal-catalog-wrapper');
const catalogMenuCloseButtons = document.querySelectorAll('.catalog-menu__close-button');
const catalogMenuReturnButton = document.querySelector('.catalog-menu__return-button');
const catalogMenuTitles = document.querySelectorAll('.catalog-menu h3');
const catalogMenu = document.querySelector('#catalogMenu');
const catalogSubmenu = document.querySelector('.catalog-submenu');
const catalogSubmenuTitle = document.querySelector('#catalogSubmenu-1 h2');
const catalogSubmenuWrapper = document.querySelector('#catalogSubmenu-1 div.container div.catalog-submenu__wrapper');
const catalogMenuMenus = document.querySelectorAll('.catalog-menu__menu');
const subcategoriesLists1 = document.querySelectorAll('ul.subcategories_list_1');


for(let i = 0; i < subcategoriesLists1.length; i++) {
	let subcategoriesList1 = subcategoriesLists1[i];
	
	if(subcategoriesList1.children.length > 3) {
		for(let j = 3; j < subcategoriesList1.children.length; j++) {
			subcategoriesList1.children[j].style.display = 'none';
		}
		let catalogMenuMoreButton = document.createElement('p');
		catalogMenuMoreButton.className = 'catalog-menu__more-button';
		catalogMenuMoreButton.innerText = 'Еще ' + (subcategoriesList1.children.length - 3) + '...';
		subcategoriesList1.append(catalogMenuMoreButton);
		
		
		if(window.innerWidth > 860) {
			catalogMenuMoreButton.onclick = () => {
				showSubmenu();
				showSubmenuContent(i);
			}
		}
	}
} 

for(let i = 0; i < catalogMenuTitles.length; i++) {
	catalogMenuTitles[i].onclick = () => {
		
		showSubmenuContent(i);
	}
}
/*
headerButton.addEventListener('click', () => {
	
	modalCatalogWrapper.classList.add('active');
});
*/
modalCatalogWrapper.addEventListener('click', (event) => {
	if(event.target.className === 'modal-catalog-wrapper active') modalCatalogWrapper.classList.remove('active');
});
/*
if(window.innerWidth <= 860 || isMobile) {
	headerButton.addEventListener('click', () => {
		
		if(catalogPage) catalogPage.style.display = 'none';
		if(contactsPage) contactsPage.style.display = 'none';
		if(productPage) productPage.style.display = 'none';
		if(servicesPage) servicesPage.style.display = 'none';
		if(actionsPage) actionsPage.style.display = 'none';
		if(cartPage) cartPage.style.display = 'none';
		if(orderPage) orderPage.style.display = 'none';
		if(buyersPage) buyersPage.style.display = 'none';
		if(basicPage) basicPage.style.display = 'none';
		if(firstScreen) firstScreen.style.display = 'none';
		if(tabs) tabs.style.display = 'none';
		if(about) about.style.display = 'none';
	});
}
*/
catalogMenuCloseButtons.forEach((button) => {
	button.onclick = () => {

		modalCatalogWrapper.classList.remove('active');

		if(catalogPage) catalogPage.style.display = '';
		if(contactsPage) contactsPage.style.display = '';
		if(productPage) productPage.style.display = '';
		if(servicesPage) servicesPage.style.display = '';
		if(actionsPage) actionsPage.style.display = '';
		if(cartPage) cartPage.style.display = '';
		if(orderPage) orderPage.style.display = '';
		if(buyersPage) buyersPage.style.display = '';
		if(basicPage) basicPage.style.display = '';
		if(firstScreen) firstScreen.style.display = '';
		if(tabs) tabs.style.display = '';
		if(about) about.style.display = '';

	}
});

catalogMenuTitles.forEach((title) => {
	
	if(title.innerText !== 'Кованые элементы' && title.innerText !== 'Двери' && title.innerText !== 'Вода для кулера') 
		title.addEventListener('click', showSubmenu);
	else if (title.innerText === 'Кованые элементы') 
		title.addEventListener('click', () => location.href = '/product-category/kovanye-elementy/');
	else if (title.innerText === 'Двери') 
		title.addEventListener('click', () => location.href = '/product-category/dveri/');
	else if (title.innerText === 'Вода для кулера') 
		title.addEventListener('click', () => location.href = '/product-category/voda-dlya-kulera/');
	
	if(window.innerWidth < 860 || isMobile) {
		title.addEventListener('click', () => {
			modalCatalogWrapper.scrollIntoView({behavior: 'smooth'});
		})
	}
});

catalogMenuReturnButton.onclick = () => {
	catalogMenu.classList.remove('disable');
	catalogSubmenu.classList.remove('active');
}

function showSubmenu() {
	catalogMenu.classList.add('disable');
	catalogSubmenu.classList.add('active');
}
function showSubmenuContent(index) {
	catalogSubmenuTitle.innerText = catalogMenuTitles[index].innerText;
	
	if(subcategoriesLists1[index])
	catalogSubmenuWrapper.innerHTML = subcategoriesLists1[index].outerHTML;
}



[].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
  img.setAttribute('src', img.getAttribute('data-src'));
  img.onload = function() {
    img.removeAttribute('data-src');
  };
});

const headerMenuLinks = document.querySelectorAll('.header__menu li a');

const basicPageTitle = document.querySelector('section.basic-page > div.container > h1');

if(buyersPage) headerMenuLinks[0].classList.add('active');
if(servicesPage) headerMenuLinks[1].classList.add('active');
if(basicPage && basicPageTitle.innerText == 'О компании') headerMenuLinks[2].classList.add('active');
if(contactsPage) headerMenuLinks[3].classList.add('active');

    
$('input[type="tel"]').mask("9(999) 999 99 99");
    
$('input[type="tel"]').click(function(){
    $(this).setCursorPosition(1); 
});

$('form.form').on('submit', sendForm);

$.fn.setCursorPosition = function(pos) {
    if ($(this).get(0).setSelectionRange) {
        $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
        var range = $(this).get(0).createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
    }
};

function sendForm(e) {
	e.preventDefault();

    var form = $(this),
        name = form.find('input[type="text"]'),
        tel = form.find('input[type="tel"]'),
        btn = form.find('button[type="submit"]');
    
    btn.attr('disabled', true).addClass('disabled');

    var data = form.serialize();

    $.ajax({
        url: '/wp-content/themes/muraveinik/inc/mail.php',
        type: 'POST',
        data: data,
    }).done(function(data) {
        $('button[title="Close"]').click();

        console.log("Ok! " + data);

        setTimeout(function() {
            $.fancybox.open('<h3 class="message-title">Спасибо за вашу заявку!</h3><p class="message-text">Ваша заявка получена ' + (new Date().toLocaleString()) + '</p>');
        }, 2000);

        form.find('input[type="text"]').val('');
        form.find('input[type="tel"]').val('');
        form.find('input[type="email"]').val('');
        form.find('textarea').val('');
        btn.removeAttr('disabled').removeClass('disabled'); 
    }).fail(function() {
        $('button[title="Close"]').click();

        console.log("Error from mail!!!" + data);

        setTimeout(function() {
            $.fancybox.open('<h3 class="message-title">Извините, с отправкой письма <span>произошла ошибка</h3><p class="message-text">Попробуйте еще раз позже...</p>');
        }, 2000);

        btn.removeAttr('disabled').removeClass('disabled'); 
    });
}

/*const modalForm = document.querySelector('#modalForm');

modalForm.addEventListener('click', (event) => {
	if(event.target.tagName !== 'INPUT' && event.target.tagName !== 'TEXTAREA') {
		document.querySelectorAll('form.form input').forEach((input) => input.blur());
	}
});*/

if(window.innerWidth < 861 || isMobile) {
	const mobileMapButton = document.querySelector('.header__header-mobile-map');
	const modaLMap = document.querySelector('#modalMap');
	
	mobileMapButton.onclick = () => {
		modalMap.innerHTML = '<div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/10733/klin/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Клин</a><a href="https://yandex.ru/maps/10733/klin/house/ulitsa_tereshkovoy_48/Z08YcQdiSUUHQFtsfX90cXlkZg==/?ll=36.702332%2C56.350481&utm_medium=mapframe&utm_source=maps&z=19.13" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Терешковой, 48 — Яндекс.Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCQpEJDYsC" width="100%" height="500" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>';
	}
}


