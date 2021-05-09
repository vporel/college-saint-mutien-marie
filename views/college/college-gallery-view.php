<?php 
    $title = "Galerie";
    $styles = [
        "public/css/college-gallery.css", 
    ];
    $scripts = [
      "public/js/gallery.js"
    ];
?>
<?php ob_start(); ?>

   	<div class="container-fluid">
   		<div class="row gallery">
   			<div class="col-12 col-md-12 order-2 order-md-1 images">
   				<div class="row">
          <?php foreach ($gallery_images as $image) {?>
            <div class="col-6 col-md-4 col-lg-3 p-1 mb-0 mb-md-1 image">
              <img src="public/images/gallery/college/<?= $image; ?>"alt="image" class="w-100 rounded-sm shadow-1-strong"/>
            </div>
          <?php } ?>
          </div>
   			</div>
        <div class="d-none col-12 col-md-8 order-1 order-md-2 p-1"id="displaying">
          <div class="row">
            <div class="col-md-12">
              <img src="public/icons/png/picture.png"id="showed-image"class="w-100">
            </div>
          </div>
        </div>
   		</div>
   	</div>

<?php $content = ob_get_clean(); ?>

<?php require("templates/site-template.php");