new WOW().init();
progressively.init({
	onLoadComplete: function() {
		console.log('All images loaded!');
	}
});

$(function() {

/**
 * Busqueuda de paquetes input ciudad_destino
 */
 /*$(document).on("click", "#ciudad_destino", function() {
 	$(this)
 	.popover({ 
 		title: 'Twitter Bootstrap Popover', 
 		content: "It's so simple to create a tooltop for my website!",
 		placement : "bottom"
 	})
 	.blur(function () {
 		$(this).popover('hide');
 	});
 	return false;
 });*/

 /*var ajaxUrl = base_url + 'ciudades_json/filter';*/
 var ajaxUrl = 'assets/json/ubigeo/locations.json';

 $.typeahead({
 	input: '#ciudad_destino',
 	minLength: 1,
 	maxItem: 20,
 	order: "asc",
 	href: "https://en.wikipedia.org/?title={{display}}",
 	template: "{{display}} <small style='color:#999;'>{{group}}</small>",
 	source: {
 		/*country: {
 			ajax: {
 				url: "/jquerytypeahead/country_v2.json",
 				path: "data.country"
 			}
 		},*/
 		capital: {
 			ajax: {
 				type: "POST",
 				url: ajaxUrl,
 				path: "data.city",
 				/*data: {myKey: "myValue"}*/
 			}
 		}
 	},
 	callback: {
 		onNavigateAfter: function (node, lis, a, item, query, event) {
 			if (~[38,40].indexOf(event.keyCode)) {
 				var resultList = node.closest("form").find("ul.typeahead__list"),
 				activeLi = lis.filter("li.active"),
 				offsetTop = activeLi[0] && activeLi[0].offsetTop - (resultList.height() / 2) || 0;

 				resultList.scrollTop(offsetTop);
 			}

 		},
 		onClickAfter: function (node, a, item, event) {

 			event.preventDefault();

 			var r = confirm("You will be redirected to:\n" + item.href + "\n\nContinue?");
 			if (r == true) {
 				window.open(item.href);
 			}

 			$('#result-container').text('');

 		},
 		onResult: function (node, query, result, resultCount) {
 			if (query === "") return;

 			var text = "";
 			if (result.length > 0 && result.length < resultCount) {
 				text = "Showing <strong>" + result.length + "</strong> of <strong>" + resultCount + '</strong> elements matching "' + query + '"';
 			} else if (result.length > 0) {
 				text = 'Showing <strong>' + result.length + '</strong> elements matching "' + query + '"';
 			} else {
 				text = 'No results matching "' + query + '"';
 			}
 			$('#result-container').html(text);

 		},
 		onMouseEnter: function (node, a, item, event) {

 			if (item.group === "country") {
 				$(a).append('<span class="flag-chart flag-' + item.display.replace(' ', '-').toLowerCase() + '"></span>');
 			}

 		},
 		onMouseLeave: function (node, a, item, event) {

 			$(a).find('.flag-chart').remove();

 		}
 	}
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