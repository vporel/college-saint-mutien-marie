
<?php 
    $title = "Personnel";
    $styles =[
        "css/staff.css"
    ];
    $scripts = [
        "js/staff.js"
    ];
?>
<?php ob_start(); ?>
    <div class="row">
        <section class="col-12" id="text">
            <h3>Administration et professeurs</h3>
            <p>
                Le collège a un principal, un vice principal, des censeurs, surveillants, professeurs
            </p>
        </section>
        <h3 class="staff-section-opener" data-section="admin"><i class="fas fa-arrow-down"></i>Haute administration</h3>
        <section class="col-12 staff-section" id="admin" data-state="0">
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers10.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Principal</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Mathematiques</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers1.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Vice Principal</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers2.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Censeur N°1</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers3.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Censeur N°2</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers4.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Censeur N°3</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
        </section>
        <h3 class="staff-section-opener" data-section="litterature"><i class="fas fa-arrow-right"></i>Département de Littérature</h3>
        <section class="col-12 staff-section" id="litterature" data-state="1">
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers10.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Principal</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Mathematiques</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers1.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Vice Principal</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers2.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Censeur N°1</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers3.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Censeur N°2</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>
            <div class="teacher row">
                <div class="col-12 col-md-1 p-0"><img src="images/personnel/pers4.jpg"/></div>
                <div class="col-12 col-md-4"><h4>Censeur N°3</h4><h5>M. XXXX</h5></div>
                <div class="col-12 col-md-7 matieres">
                    <p>PLEG - Informatique</p>
                    <p>Email : xxx@gmail.com</p>
                </div>
            </div>

        </section>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require("../templates/site-template.php");