<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tests bootstrap</title>
    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css"/>
</head>
<body>
    <style type="text/css">
       
    </style>
    <?php
        $array = ["e"=>"dd", "tt"=>"yy"];
        print_r(array_keys($array));
    ?>
    <div class="container">
        <header class="row">
            <nav class="col navbar navbar-expand-md navbar-dark bg-dark"style="">
                <a href=""class="navbar-brand">Site</a>
                <button class="navbar-toggler" data-target="#navbar-content" type="button"data-toggle="collapse">
                    Nav
                </button>
                <div id="navbar-content" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link">Home</a></li>
                    <li class="nav-item"><a class="nav-link">Cours</a></li>
                    <li class="nav-item"><a class="nav-link">Enseignants</a></li>
                </ul>
                </div>
            </nav>
        </header>
    </div>
    <div class="container">
        <div class="jumbotron">
            <h2>Bienvenu sur Mon site</h2>
        </div>
        <style type="text/css">
            .card img{width:60%;margin-left:20%;}
        </style>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 card">
                <img src="public/icons/png/003-diamond.png" class="card-img-top"/>
                <h3 class="card-title text-center text-md-left">Galerie</h3>
                <p class="card-text">Les images du sites, differentes creations</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 card">
                <img src="public/icons/png/001-firefox.png" class="card-img-top"/>
                <h3 class="card-title text-center text-md-left">Enseignants</h3>
                <p class="card-text">Les meilleurs enseignants</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 card">
                <img src="public/icons/png/005-wifi.png" class="card-img-top"/>
                <h3 class="card-title text-center text-md-left">Contacts</h3>
                <p class="card-text">Contactez nous</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 card">
                <img src="public/icons/png/005-tools.png" class="card-img-top"/>
                <h3 class="card-title text-center text-md-left">Cours</h3>
                <p class="card-text">Tous nos cours</p>
            </div>
        </div>
    </div>
    <script language="javascript"src="public/js/jquery.js"></script>
    <script language="javascript"src="public/css/bootstrap/bootstrap.min.js"></script>
</body>
</html>