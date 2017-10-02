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
 	auto:false,
 	item:3,
 	loop:false,
 	slideMove:3,
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

//Bootstrap datepicker solo una fecha
$('.datepicker').datepicker({
	language: "es",
	autoclose: true,
	todayHighlight: true,
	startDate: '+1d',
});

/**
 * Datepicker pasajes nacionales
 */
 var dpOptions = {
 	format: 'dd/mm/yyyy',
 	startDate: '+1d',
 	language: "es",
 	autoclose: true,
 };
 
 var dp1 = $("#pasajes_partida");
 var dp2 = $("#pasajes_retorno");

 var datePicker1 = dp1.datepicker(dpOptions).
 on('changeDate', function (e) {
 	var nDate = new Date(e.date);
 	nDate.setDate(nDate.getDate() + 1);
 	datePicker2.datepicker('setStartDate', nDate);
 	dp2.focus();
 });
 
 var datePicker2 = dp2.datepicker(dpOptions);
 
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

	/**
	 * Slider banners home
	 */
	
	$('#bannersHome').lightSlider({
        item:1,
        loop:true,
        auto:true,
        pager: false
    });

});