new WOW().init();
progressively.init({
	onLoadComplete: function() {
		console.log('All images loaded!');
	}
});

$(function() {


 $('#ciudad_destino').keyup(function(){
 	var ajaxUrl = base_url + 'json/ciudades';
 	var q = $(this).val();
  	var dataSearch = { q: q };

  	var contDropdown = $("#ciudades-dropdown");
	
	if(q.length > 2){
		$.ajax({
			method: "POST",
			url: ajaxUrl,
			data: dataSearch,
			dataType : 'json',
			beforeSend: function(){
				// Handle the beforeSend event
				/*console.log("Cargando...");*/
				contDropdown.find('.cont-load').fadeIn();
			}
		})
		.done(function( result ) {
			contDropdown.empty();
			var item = '<li class="dropdown-header">LISTADO DE CIUDADES</li>';
			item += '<li class="disabled cont-load" style="display: none;"><a href="#">CARGANDO...</a></li>';
			$.each(result, function( index, value ) {
				item += '<li><a href="#" class="city-item" data-cityid="' + value.id + '" data-city="' + value.city + '">' + value.city + ', ' + value.country + '</a></li>';
				/*console.log(value);*/
			});
			contDropdown.append( item );
		});
	}else{
		contDropdown.empty();
		var item = '<li class="dropdown-header">LISTADO DE CIUDADES</li>';
		item += '<li class="disabled cont-load" style="display: none;"><a href="#">CARGANDO...</a></li>';
		contDropdown.append( item );
	}

 });

//city-item
$(document).on("click",".city-item",function() {
	var cityid = $(this).data('cityid');
	var city = $(this).data('city');
	$('#ciudad_destino').val(city);
	/*console.log(cityid);*/
	$("#ciudades-dropdown").dropdown('toggle');
	return false;
});
 


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