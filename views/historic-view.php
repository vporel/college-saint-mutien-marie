
<?php 
    $title = "Historique";
    $styles =[
        "css/historic.css"
    ];
    $scripts = [
    ];
?>
<?php ob_start(); ?>
    <div class="row">
        <section class="col-12" id="text">
            <h3>Historique du college Saint-Mutien-Marie</h3>
            <p>
                Le college Saint-Mutien-Marie a été créé le 12 mai 2009 sous décret 
                ministriel.
                Il a comme directeur M. PLOPLEOP
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Aut, maiores veritatis. Mollitia, velit ipsum? Itaque est quod, 
                laudantium cum dolores, totam quidem quibusdam provident vitae commodi
                    soluta consequatur, quasi sequi?
            </p>
        </section>
        <section class="col-12">
            <h3>Images</h3>
            <div class="row" id="images">
                <div class="col-12 col-md-4">
                    <img src="images/gallery/img4.jpg"/>
                    <i>Le fondateur</i>
                </div>
                <div class="col-12 col-md-4">
                    <img src="images/gallery/img2.jpg"/>
                    <i>Le promoteur</i>
                </div>
                <div class="col-12 col-md-4">
                    <img src="images/gallery/img5.jpg"/>
                    <i>L'actuel principal</i>
                </div>
            </Div>
        </section>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require("../templates/site-template.php");