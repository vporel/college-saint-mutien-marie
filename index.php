<?php 

    function load_class($class_name){
        require_once("models/classes/".$class_name.".class.php");
    }
    spl_autoload_register("load_class");

    //Application's menu
    $home_link = ["text" =>"accueil"];
    $sub_links = [
        "historic" => ["text"=>"historique"],
        "gallery" => ["text"=>"galerie"],
        "effectifs" => ["text"=>"effectifs",
            "sub-links" => [
                "students" => ["text"=>"elèves"],
                "teachers" => ["text"=>"enseignants"]
            ]
        ],
        "faculties" => ["text"=>"filières"],
        "contacts" => ["text"=>"contacts"]
    ];
    $college_link = ["text"=>"college", "sub-links" => $sub_links];
    $cfp_link = ["text"=>"CFP", "sub-links" => $sub_links];

    $nav_links = ["home" =>$home_link, "college" => $college_link, "cfp" => $cfp_link];
    
    $view = "views/home";
    if(
        isset($_GET['page']) AND 
        in_array($_GET["page"], array_keys($nav_links)) AND 
        $_GET["page"] != "home"
    ){
        $page = $_GET["page"];
        $path_start = "views/".$page."/".$page;
        if(
            isset($_GET["part"]) AND 
            in_array($_GET["part"], array_keys($nav_links[$page]["sub-links"]))
        ){
            $part = $_GET["part"];
            if($part == "gallery"){
                $gallery_files = scandir("public/images/gallery/".$page);
                $gallery_images = array_filter($gallery_files, function($file){
                    return preg_match("#\.(jpg|jpeg|tif|bmp|gif|png)$#", strtolower($file));
                });
            }
            if(
                isset($_GET["part_2"]) AND 
                in_array($_GET["part_2"], array_keys($nav_links[$page]["sub-links"][$part]["sub-links"]))
            ){
                $part_2 = $_GET["part_2"];
                $view = $path_start."-".$part."-".$part_2;;
            }else{
                $view = $path_start."-".$part;
            }

        }else{
            $view = $path_start;
        }
    }else{
        $page = "home";
    }

    require($view."-view.php");

?>
