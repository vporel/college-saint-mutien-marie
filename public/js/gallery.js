const GALLERY_DIVS_MAX_HEIGHT = 500,
	FORWARD = "forward",
	BACKWARD = "backward",
	GALLERY_ID = "#gallery";

let displaying_actived = false;

$(function(){
	let $gallery = $(GALLERY_ID),
		$images = $gallery.find("#images"),
		$displaying = $gallery.find("#displaying");

	function displaying_img_change(dir){
		let data_index_image = $displaying.find('#displaying-image img').attr('data-index-image'),
			$indexed_image_div = $images.find('.image[data-index="'+data_index_image+'"]'),
			$next_image = $indexed_image_div.next().find("img"),
			$prev_image = $indexed_image_div.prev().find("img");
		if(dir == FORWARD){
			$displaying.find('#displaying-image img').attr('src',$next_image.attr('src'));
			$displaying.find('#displaying-image img').attr('data-index-image', $next_image.parent().attr('data-index'));
		}else{
			$displaying.find('#displaying-image img').attr('src',$prev_image.attr('src'));
			$displaying.find('#displaying-image img').attr('data-index-image', $prev_image.parent().attr('data-index'));
		}
	}

	$images.find('.image').click(function(){
		let $img = $(this).find('img');
		if(!displaying_actived){
			displaying_actived = true;
			$images.removeClass('col-md-12').addClass('col-md-4');
			if($displaying.find('#displaying-container').css('display') == "block"){
				$gallery.find('>div').css('max-height', GALLERY_DIVS_MAX_HEIGHT+"px");
				$displaying.addClass("d-flex");
			}
		}
		if($displaying.find('#displaying-container').css('display') != "block"){
			$images.find('.image').removeClass("col-12").addClass("col-6");
			$(this).removeClass("col-6").addClass("col-12");
			
		}else{
			$displaying.find('#displaying-image img').attr('src', $img.attr('src'));
			$displaying.find('#displaying-image img').attr('data-index-image', $(this).attr('data-index'));
		}
	});
	$displaying.find('#next-displaying').click(function(){
		displaying_img_change(FORWARD);
	});
	$displaying.find('#prev-displaying').click(function(){
		displaying_img_change(BACKWARD);
	});

	//Diaporama
  	$('.skitter-large').skitter({
	    theme:'clean',
	    numbers_align:'center',
	    progressbar:true,
	    dots:true,
	    preview:true,
	    interval:4000,
	    label:false,
	    thumbs:true,
	    controls:true
  	});

});