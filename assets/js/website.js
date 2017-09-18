/**
 * Variables globales
 */
$.getDataJson = function(url, data, callback) {
	return $.ajax({
		method: 'POST',
		url: url,
		data: data,
		dataType: 'json',
		success: callback
	});
};

function addLightSlider(carousel_id){
	$(carousel_id).lightSlider({
 	auto:true,
 	item:2,
 	loop:true,
 	slideMove:2,
 	easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
 	speed:600,
 	slideMargin: 10,
 	pager:false,
 	pauseOnHover:true,
 	responsive : [
 	{
 		breakpoint:800,
 		settings: {
 			item:2,
 			slideMove:1,
 			slideMargin:6,
 		}
 	},
 	{
 		breakpoint:480,
 		settings: {
 			item:1,
 			slideMove:1
 		}
 	}
 	]
 });
}
new WOW().init();
progressively.init({
	onLoadComplete: function() {
		console.log('All images loaded!');
	}
});

$(function() {
	//Bootstrap datepicker home
	$('.datepicker').datepicker();
	
	//Chosen origen nacional
	$(".chosen-select").chosen({
		no_results_text: "Sin resultados.",
	});

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