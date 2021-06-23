
<?php 
    $title = "Formation";
    $styles =[
        "css/formation.css"
    ];
    $scripts = [
    ];
?>
<?php ob_start(); ?>
    <div class="row">
        <section class="col-12" id="text">
            <h3>Classes college</h3>
            <p>
                Les classes du college vont de Sizième en terminale
            </p>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>6ème</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>5ème</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>4ème</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>3ème</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>2nde</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>1ère</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
            <div class="class row">
                <div class="col-12 col-md-4"><h4>Tle</h4><h5>M. XXXXX</h5></div>
                <div class="col-12 col-md-8 matieres">
                    <div class="row">
                        <a href="#" class="col-auto">SVT</a><a href="#" class="col-auto">Maths</a>
                        <a href="#" class="col-auto">ECM</a><a href="#" class="col-auto">Francais</a>
                        <a href="#" class="col-auto">Anglais</a><a href="#" class="col-auto">Informatique</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require("../templates/site-template.php");