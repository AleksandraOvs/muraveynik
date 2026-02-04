	const contactsFooterItems = document.querySelector('.contacts__footer-items');
	const contactsFooterItemsLinks = document.querySelectorAll('.contacts__footer-items a');
	const contactsFooterItemsImages = document.querySelectorAll('.contacts__footer-items img');

	for(let i = 0; i < contactsFooterItemsLinks.length; i++) {
		contactsFooterItemsLinks[i].href = contactsFooterItemsImages[i].src;
	}

	if(window.innerWidth < 861 || isMobile) {
		contactsFooterItems.classList.add('owl-carousel');

		$(contactsFooterItems).owlCarousel({
			items: 2,
			dots: false,
			loop: true,
			//margin: 180
			margin: 210
		});
	}
	
	
	