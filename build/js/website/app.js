$(function() {
	//Select search select2
	$(".select_search").select2();

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

	//Slimscroll
	$('.box-wscroll').slimScroll({
		height: '233px'
	});

	//Toolbar static
	$("#tool-bar").sticky({ topSpacing: 0 });

	/**
 * Lightslider
 */
 $('#carousel-promo-1').lightSlider({
 	item:4,
 	loop:true,
 	slideMove:2,
 	easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
 	speed:600,
 	slideMargin: 15,
 	responsive : [
 	{
 		breakpoint:800,
 		settings: {
 			item:3,
 			slideMove:1,
 			slideMargin:6,
 		}
 	},
 	{
 		breakpoint:480,
 		settings: {
 			item:2,
 			slideMove:1
 		}
 	}
 	]
 });


});