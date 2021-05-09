<?php 
    $title = "Home";
    $styles = [
        "public/css/home.css", 
    ];
    $scripts = [
        "public/js/home.js"
    ];
?>
<?php ob_start(); ?>

   	<div class="container-fluid">
   		<div class="row"id="slide">
   			<div class="col-12"id="images">
   				<img src="public/images/img4.jpg"alt=""/>
   			</div>
   			<div class="offset-1 offset-md-2 col-10 col-md-6" id="over-slide">
   				<h1>College Saint <br>Mutien Marie</h1>
   				<p class="text-right">Un college qui forme avec delicatesse les eleves<br>xxxxxxxxxx yyyyyyy</p>
   				<a href="#" class="float-right">Contactez-nous</a>
   			</div>
   		</div>
   	</div>

<?php $content = ob_get_clean(); ?>

<?php require("templates/site-template.php");