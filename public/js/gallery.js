let displaying_actived = false;

$(function(){
	$(".gallery .images img").click(function(){
		if(!displaying_actived){
			displaying_actived = true;
			$(".gallery .images").removeClass('col-md-12').addClass('col-md-4');
			$('#displaying').addClass("d-flex");
		}
		$('#displaying #showed-image').attr('src', $(this).attr('src'));
	})
});