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
 	item:3,
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
}
new WOW().init();

progressively.init({
	onLoadComplete: function() {
		console.log('All images loaded!');
	}
});

$(function() {
	//Select search select2
	$(".select_search").select2();

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

	//Slimscroll
	$('.box-wscroll').slimScroll({
		height: '233px'
	});

	//Toolbar static
	$("#tool-bar").sticky({ topSpacing: 0 });

/*$('[data-toggle="tab"]').click(function (e) {
  e.preventDefault();
  var content_id = $(this).attr('href');
  var carousel_id = $(content_id).find('ul.carousel-promo').attr('id');
  console.log("Content " + content_id);
  console.log("Carousel " + carousel_id);
  addLightSlider('#' + carousel_id);
});*/

/*#carousel-promo*/
addLightSlider('#carousel-promo-1');
addLightSlider('#carousel-promo-2');
addLightSlider('#carousel-promo-3');
addLightSlider('#carousel-promo-4');

$( ".tab-promo-2" ).trigger( "click" );
$( ".tab-promo-1" ).trigger( "click" );

});