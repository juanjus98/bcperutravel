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

	$("#country").typeahead({
		source:function(query, result)
		{
			$.ajax({
				method: "POST",
				url: base_url + 'json/ciudades',
				data: { q: query },
				dataType : 'json',
				success : function(data){
					result($.map(data,function(item){
						return item.city;
					}));
				}
			});
		}
	});

	/**
	 * Form paquetes
	 */
	 $('#country_search_1').typeahead({
	 	source: function(query, process) {
	 		var $url =base_url + 'json/ciudades';
	 		var $items = [];
	 		$items = [""];
	 		$.ajax({
	 			url: $url,
	 			dataType: "json",
	 			type: "POST",
	 			success: function(data) {
	 				$.map(data, function(data){
	 					var group;
	 					var name_fix = data.name + ', ' + data.country;
	 					group = {
	 						id: data.id,
	 						name: name_fix,
	 						country : data.country,                           
	 						toString: function () {
	 							return JSON.stringify(this);
	 						},
	 						toLowerCase: function () {
	 							var name_fix = this.name + ', ' + this.country;
	 							/*return this.name.toLowerCase();*/
	 							return name_fix.toLowerCase();
	 						},
	 						indexOf: function (string) {
	 							var name_fix = this.name + ', ' + this.country;
	 							/*return String.prototype.indexOf.apply(this.name, arguments);*/
	 							return String.prototype.indexOf.apply(name_fix, arguments);
	 						},
	 						replace: function (string) {
	 							var value = '';
	 							value +=  this.name;
	 							if(typeof(this.level) != 'undefined') {
	 								value += ' <span class="pull-right muted">';
	 								value += this.level;
	 								value += '</span>';
	 							}
	 							return String.prototype.replace.apply('<div style="padding: 10px; font-size: 1.5em;">' + value + '</div>', arguments);
	 						}
	 					};
	 					$items.push(group);
	 				});
	 				process($items);
	 			}
	 		});
	 	},
	 	property: 'name',
	 	items: 10,
	 	minLength: 3,
	 	updater: function (item) {
	 		$('#destino_id').val(item.id);
	 		return item.name;
	 	}
	 });

	/**
	 * Form paquetes
	 */
	 $('#country_search_2').typeahead({
	 	source: function(query, process) {
	 		var $url =base_url + 'json/ciudades';
	 		var $items = [];
	 		$items = [""];
	 		$.ajax({
	 			url: $url,
	 			dataType: "json",
	 			type: "POST",
	 			success: function(data) {
	 				$.map(data, function(data){
	 					var group;
	 					var name_fix = data.name + ', ' + data.country;
	 					group = {
	 						id: data.id,
	 						name: name_fix,
	 						country : data.country,                           
	 						toString: function () {
	 							return JSON.stringify(this);
	 						},
	 						toLowerCase: function () {
	 							var name_fix = this.name + ', ' + this.country;
	 							/*return this.name.toLowerCase();*/
	 							return name_fix.toLowerCase();
	 						},
	 						indexOf: function (string) {
	 							var name_fix = this.name + ', ' + this.country;
	 							/*return String.prototype.indexOf.apply(this.name, arguments);*/
	 							return String.prototype.indexOf.apply(name_fix, arguments);
	 						},
	 						replace: function (string) {
	 							var value = '';
	 							value +=  this.name;
	 							if(typeof(this.level) != 'undefined') {
	 								value += ' <span class="pull-right muted">';
	 								value += this.level;
	 								value += '</span>';
	 							}
	 							return String.prototype.replace.apply('<div style="padding: 10px; font-size: 1.5em;">' + value + '</div>', arguments);
	 						}
	 					};
	 					$items.push(group);
	 				});
	 				process($items);
	 			}
	 		});
	 	},
	 	property: 'name',
	 	items: 10,
	 	minLength: 3,
	 	updater: function (item) {
	 		$('#ciudad_origen_id').val(item.id);
	 		return item.name;
	 	}
	 });

	 $('#country_search_3').typeahead({
	 	source: function(query, process) {
	 		var $url =base_url + 'json/ciudades';
	 		var $items = [];
	 		$items = [""];
	 		$.ajax({
	 			url: $url,
	 			dataType: "json",
	 			type: "POST",
	 			success: function(data) {
	 				$.map(data, function(data){
	 					var group;
	 					var name_fix = data.name + ', ' + data.country;
	 					group = {
	 						id: data.id,
	 						name: name_fix,
	 						country : data.country,                           
	 						toString: function () {
	 							return JSON.stringify(this);
	 						},
	 						toLowerCase: function () {
	 							var name_fix = this.name + ', ' + this.country;
	 							/*return this.name.toLowerCase();*/
	 							return name_fix.toLowerCase();
	 						},
	 						indexOf: function (string) {
	 							var name_fix = this.name + ', ' + this.country;
	 							/*return String.prototype.indexOf.apply(this.name, arguments);*/
	 							return String.prototype.indexOf.apply(name_fix, arguments);
	 						},
	 						replace: function (string) {
	 							var value = '';
	 							value +=  this.name;
	 							if(typeof(this.level) != 'undefined') {
	 								value += ' <span class="pull-right muted">';
	 								value += this.level;
	 								value += '</span>';
	 							}
	 							return String.prototype.replace.apply('<div style="padding: 10px; font-size: 1.5em;">' + value + '</div>', arguments);
	 						}
	 					};
	 					$items.push(group);
	 				});
	 				process($items);
	 			}
	 		});
	 	},
	 	property: 'name',
	 	items: 10,
	 	minLength: 3,
	 	updater: function (item) {
	 		$('#ciudad_destino_id').val(item.id);
	 		return item.name;
	 	}
	 });

	/**
	 * Test busqueda de ciudades
	 */
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
	 				item += '<li><a href="javascript:;" class="city-item" data-cityid="' + value.id + '" data-city="' + value.city + ', ' + value.country + '">' + value.city + ', ' + value.country + '</a></li>';
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
	console.log('SELECCIONANDO!');
	var cityid = $(this).data('cityid');
	var city = $(this).data('city');
	$('#ciudad_destino').val(city);
	/*console.log(cityid);*/
	$("#ciudades-dropdown").dropdown('toggle');
	/*return false;*/
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

	 //Select ciudad -  listado de productos sel_ciudad_list
	$(document).on("change","#sel_ciudad_list",function() {
		var link = $(this).val();
		window.location.href = link;
		return false;
	});

});