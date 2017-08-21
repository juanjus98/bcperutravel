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

	//Galería videos.
	$("#content-slider").lightSlider({
		loop:true,
		auto:true,
		item:4,
		slideMove:2,
		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		speed:600,
		pauseOnHover: true,
		pager: false,
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

 //Galería de fotos.
 $("#content-slider-fotos").lightSlider({
 	loop:true,
 	auto:false,
 	item:4,
 	slideMove:2,
 	easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
 	speed:600,
 	pauseOnHover: true,
 	pager: false,
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

	//Ver video fancybox
	$(".various").fancybox({
		maxWidth : 800,
		maxHeight : 600,
		fitToView : false,
		width : '70%',
		height : '70%',
		autoSize : false,
		closeClick : false,
		openEffect : 'none',
		closeEffect : 'none'
	});


	});