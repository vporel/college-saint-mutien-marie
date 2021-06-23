<?php 
    $title = "Home";
    $styles = [
        "css/home.css", 
    ];
    $scripts = [
        "js/home.js"
    ];
?>
<?php ob_start(); ?>

	<div class="row"id="slide">
		<div class="col-12"id="images">
			<img src="images/img4.jpg"alt=""/>
		</div>
		<div class="offset-1 offset-md-2 col-10 col-md-6" id="over-slide">
			<h1>College Saint <br>Mutien Marie</h1>
			<p class="text-right">Un college qui forme avec delicatesse les eleves<br>xxxxxxxxxx yyyyyyy</p>
			<a href="#" class="float-right">Contactez-nous</a>
		</div>
	</div>

<?php $content_top = ob_get_clean(); ?>

<?php ob_start(); ?>
	<div class="row">
		<section class="col-12">
			<h3>Le college</h3>
			<p>
				Le college Saint-Mutien-Marie a été créé le 12 mai 2009 sous décret 
				ministriel.
				Il a comme directeur M. PLOPLEOP
				Lorem ipsum dolor sit amet consectetur adipisicing elit. 
				Aut, maiores veritatis. Mollitia, velit ipsum? Itaque est quod, 
				laudantium cum dolores, totam quidem quibusdam provident vitae commodi
					soluta consequatur, quasi sequi?
			</p>
			<strong><a href="#">Afficher plus</a></strong>
		</section>
		<section class="col-12">
			<h3>La formation</h3>
			<p>
				Le college offre des formations pour différentes filières et différents niveaux
				allant de ... à 
				Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
				Molestias earum nemo adipisci sit quisquam iusto, aspernatur explicabo? 
				Cumque quo, ipsa iusto magnam exercitationem eum nemo distinctio officiis corporis, quis voluptatem?
			</p>
			<strong><a href="#">Afficher plus</a></strong>
		</section>
		<section class="col-12">
			<h3>Inscription</h3>
			<p>
				Vous pouvez faire votre inscription en ligne<br>
				Il suffit de remplir le formulaire qui vous sera présenter et de suivre les instructions

				Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
				Molestias earum nemo adipisci sit quisquam iusto, aspernatur explicabo? 
				Cumque quo, ipsa iusto magnam exercitationem eum nemo distinctio officiis corporis, quis voluptatem?
				<br>
				<a href="#">Cliquez ici pour acceder à la page d'inscription</a>
			</p>
		</section>
	</div>
	
<?php $content = ob_get_clean(); ?>

<?php require("../templates/site-template.php");