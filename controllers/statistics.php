<?php 
	function load_class($class_name){
        require_once("../model/classes/".$class_name.".class.php");
    }
    spl_autoload_register("load_class");
	$articles_manager = new ArticlesManager;
    $sections_manager = new SectionsManager;
    $sales_manager = new SalesManager; 
    $users_manager = new UsersManager;
    $bills_manager = new BillsManager;

	$status = 1;
	$message = "";
	if(isset($_GET['query'])){
		if($_GET['query'] == "all_stock_price"){
			$data = $articles_manager->get_all_stock_price();
		}elseif($_GET['query'] == "most_sold_articles"){
			$period_start = date("Y-m")."-01 00:00:00";
			$period_end = date("Y-m")."-31 23:59:59";
			if(isset($_GET['period-start'])) $period_start = $_GET['period-start'];
			if(isset($_GET['period-end'])) $period_end = $_GET['period-end'];
			$data = $sales_manager->get_most_sold_articles($period_start, $period_end);

		}elseif($_GET['query'] == "sales_evolution"){
			$data = $sales_manager->get_evolution($_GET["display"], $_GET["month"], $_GET["year"], "sales");
		}elseif($_GET['query'] == "benefits_evolution"){
			$data = $sales_manager->get_evolution($_GET["display"], $_GET["month"], $_GET["year"], "benefits");
		}else{
			$status = 0;
			$message = "Aucun traitement possible demandé";
		}
	}else{
		$status = 0;
		$message = "Aucun traitement demandé";
	}
	echo json_encode(["status"=>$status, "message"=>$message, "data" => $data]);
?>