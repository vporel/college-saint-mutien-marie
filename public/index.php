<?php 
    function load_class($class_name){
        require_once("../models/classes/".$class_name.".class.php");
    } 
    spl_autoload_register("load_class");

    //Application's menu

    $nav_links = [
        "home" => ["text" =>"accueil"], 
        "historic" => ["text"=>"historique"],
        "staff" => ["text"=>"personnel"],
        "formation" => ["text"=>"formation"],
        "statistics" => ["text"=>"statistiques"],
        "gallery" => ["text"=>"galerie"],
        "contacts" => ["text"=>"contacts"]
    ];
    
    $view = "../views/home";
    if(
        isset($_GET['page']) AND 
        in_array($_GET["page"], array_keys($nav_links)) AND 
        $_GET["page"] != "home"
    ){
        $page = $_GET["page"];       
    }else{
        $page = "home";
    }

    require("../views/".$page."-view.php");

?>
