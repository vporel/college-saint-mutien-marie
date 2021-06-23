
<?php 
    $title = "Galerie";
    $title_message = "Images du college Saint-Mutien-Marie";
$styles =[
        "css/gallery.css",
        //"js/jquery-plugins/mixSlide/mixSlide.css"
            "http://localhost/MesPlugins/mixSlide/src/mixSlide.css"
    ];
    $scripts = [
        "js/gallery.js",
        "http://localhost/MesPlugins/mixSlide/src/jquery.vporel.mixSlide.js"
    // "js/jquery-plugins/mixSlide/jquery.vporel.mixSlide.js"
    ];
    $show_aside = false;
?>
<?php ob_start(); ?>
    <div id="diaporama"> </div>

   <div class="container-fluid">
       <form class="row" id="search-event">
            <span class="col-8 offset-md-2">
                <input placeholder="Chercher un évènement" name="search-text"/>
                <button name="search-button" class="btn btn-primary"><i class="fas fa-search"></i><font class="d-none d-md-inline-block">Chercher</font></button>
            </span>
        </form>
       <div class="row" id="gallery">
           <div class="event col-12">
                <h3><a href="#"><i class="fas fa-arrow-down icon"></i> Visite du sous prefet - <i class="date">12 juin 2021</i></a></h3>
                <div class="col-12 images">
                    <div class="row">
                        <?php for($i = 1;$i<=3;$i++){ ?>
                        <div class="col-12 col-md-4 col-lg-4 p-1 mb-0 mb-md-1 image">
                            <img src="images/gallery/img<?= $i; ?>.jpg"alt="image" class="w-100 rounded-sm shadow-1-strong"/>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="event col-12">
                <h3><a href="#"><i class="fas fa-arrow-down icon"></i> Kermesse 3eme trimestre - <i class="date">06 juin 2021</i></a></h3>
                <div class="col-12 images">
                    <div class="row">
                        <?php for($i = 1;$i<=3;$i++){ ?>
                        <div class="col-12 col-md-4 col-lg-4 p-1 mb-0 mb-md-1 image">
                            <img src="images/gallery/img<?= $i; ?>.jpg"alt="image" class="w-100 rounded-sm shadow-1-strong"/>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="event col-12">
                <h3><a href="#"><i class="fas fa-arrow-down icon"></i> Journée philosophie - <i class="date">20 mai 2021</i></a></h3>
                <div class="col-12 images">
                    <div class="row">
                    <?php for($i = 1;$i<=3;$i++){ ?>
                        <div class="col-12 col-md-4 col-lg-4 p-1 mb-0 mb-md-1 image">
                            <img src="images/gallery/img<?= $i; ?>.jpg"alt="image" class="w-100 rounded-sm shadow-1-strong"/>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
       </div>
   </div>
<?php $content = ob_get_clean(); ?>

<?php require("../templates/site-template.php");