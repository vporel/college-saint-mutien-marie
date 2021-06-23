
let displaying_actived = false;

$(function(){
	let $gallery = $('#gallery'),
		$diaporama = $('#diaporama');
	

	$gallery.find('.images').each(function(){
		let $images = $(this);
		$images.find('.image').click(function(){
			let $img = $(this).find('img');
			if(!displaying_actived){
				$images.find('img').each(function(){
					$diaporama.append('<div><img src="'+$(this).attr('src')+'"/></div>');
				});
				$diaporama.mixSlide({
					controls : {
						active:true
					},
					thumbs:{
						active:true,
						position:"bottom"
					},
					fullscreen:true,
					transition:{
						name:"circle"
					},
					animation:{
						speed:1
					}
				});
				$diaporama.mixSlideOperation('change', $img.attr('src'));
				displaying_actived = true;
			}else{
				$diaporama.mixSlideOperation('change', $img.attr('src'));
				$diaporama.mixSlideData('fullscreen', true);
			}
		});
	});
});