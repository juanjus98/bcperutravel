new WOW().init();
progressively.init({
	onLoadComplete: function() {
		console.log('All images loaded!');
	}
});

$(function() {
	//Chosen origen nacional

	//Tooltip defoult
	$('[data-toggle="tooltip"]').tooltip();

	//Galería
	$('#imageGallery').lightSlider({
		gallery:true,
		item:1,
		loop:true,
		/*auto:true,*/
		thumbItem:9,
		slideMargin:0,
		enableDrag: true,
		enableTouch: true,
		currentPagerPosition:'left',
		onSliderLoad: function(el) {
			el.lightGallery({
				selector: '#imageGallery .lslide'
			});
		} 
	});

	/*#carousel-promo*/
	addLightSlider('#carousel-promo-1');
	/*addLightSlider('#carousel-promo-2');
	addLightSlider('#carousel-promo-3');
	addLightSlider('#carousel-promo-4');*/


});