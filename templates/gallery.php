<?php 
    $title = "Galerie";
    $styles = array_merge(
        [
            "public/js/jquery-plugins/skitter-slideshow/skitter.css"
        ], $styles
    );
    $scripts = array_merge(
        [
            "public/js/gallery.js",
            "public/js/jquery-plugins/skitter-slideshow/jquery.skitter.min.js",
            "public/js/jquery-plugins/skitter-slideshow/jquery.easing.1.3.js"
        ], 
        $scripts
    );
?>
<?php ob_start(); ?>
    <?php if(isset($gallery_top)) echo $gallery_top; ?>
    <div class="skitter-large-box">
        <div class="skitter skitter-large with-dots">
        <ul>
            <li>
                <img src="public/images/img1.jpg" class="cubeRandom" />
                
            </li>
            <li>
                <img src="public/images/img2.jpg" class="cubeRandom" />
            </li>
            <li>
                <img src="public/images/img3.jpg" class="cubeRandom" />
            </li>
            <li>
                <img src="public/images/img4.jpg" class="cubeRandom" />
            </li>
        </ul>
    </div>
    </div>

   	<div class="container-fluid">
   		<div class="row" id="gallery">
   			<div class="col-12 col-md-12"id="images">
   				<div class="row">
                <?php $index = 1;foreach ($gallery_images as $image) { ?>
                    <div class="col-6 col-md-4 col-lg-4 p-1 mb-0 mb-md-1 image" data-index="<?= $index; ?>">
                      <img src="public/images/gallery/college/<?= $image; ?>"alt="image" class="w-100 rounded-sm shadow-1-strong"/>
                    </div>
                <?php 
                    $index++;} 
                ?>
                </div>
   			</div>
            <div class="d-none col-12 col-md-8 p-0 m-0"id="displaying">
                <div class="d-none d-md-block w-100 p-0 m-0 mr-1" id="displaying-container">
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-md-12 p-0 m-0 w-100 h-100 bg-dark justify-content-center" id="displaying-image">
                            <img src="public/icons/png/picture.png"class="d-flex m-auto"style="height:100%;" data-index-image="0">
                        </div>
                    </div>
                    <div class="row"id="displaying-controls">
                        <div class="col-md-12 m-0 d-flex justify-content-between">
                            <button class="btn btn-primary"id="diaporama-displaying"><i class="fa fa-play"></i> Diaporama</button>
                            <div>
                                <button class="btn btn-primary" id="prev-displaying"><i class="fa fa-arrow-left"></i> Prev</button>
                                <button class="btn btn-primary"id="next-displaying"><i class="fa fa-arrow-right"></i> Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   		</div>
   	</div>
    <?php if(isset($gallery_bottom)) echo $gallery_bottom; ?>
<?php $content = ob_get_clean(); ?>

<?php require("templates/site-template.php");