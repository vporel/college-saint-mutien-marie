<?php 
    $title = "Galerie";
    $styles = [
        "public/css/college-gallery.css", 
    ];
    $scripts = [];
?>
<?php ob_start(); ?>
    <p class="pl-5 m-0">
        Images du college Saint-Mutien-Marie
    </p>
   
<?php $gallery_top = ob_get_clean(); ?>

<?php require("templates/gallery.php");