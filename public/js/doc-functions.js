
function message(msg){
	$("header #message p").html(msg);
	$("header #message").fadeIn(500, function(){
		setTimeout(function(){
			$("header #message").fadeOut(500);
		}, 5000);
	});
}

$.fn.toggleIcon = function(first_color, second_color){
	this.each(function(){
		$(this).mouseover(function(){$(this).removeClass('icon-'+first_color).addClass('icon-'+second_color);});
    	$(this).mouseout(function(){$(this).removeClass('icon-'+second_color).addClass('icon-'+first_color);});
	});
	return this;
};
$.fn.serializeData = function(){
	let data_serialized = this.serializeArray();
	let data = {};
	for(let i = 0; i < data_serialized.length; i++){
		data[data_serialized[i].name] = data_serialized[i].value;
	}
	return data;
};
