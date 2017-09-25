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