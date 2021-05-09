
<?php

	function load_class($class_name){
        require_once("../model/classes/".$class_name.".class.php");
    }
    spl_autoload_register("load_class");
    session_start();
	$users_manager = new UsersManager;
	$current_user = $users_manager->get_element(["id"=> (int) $_SESSION['id-user']]);

	$status = 0;
	$message = "";
	if(isset($_GET['action'])){
		$bills_manager = new BillsManager;
		$sales_manager = new SalesManager;
		$articles_manager = new ArticlesManager;
		if($_GET['action'] == "list"){
			$order = "";
			$condition = "";
			$limit = "";
			if(isset($_GET['order'])) $order = $_GET['order'];
			if(isset($_GET['condition'])) $condition = $_GET['condition'];
			if(isset($_GET['limit'])) $limit = $_GET['limit'];
			$sales_list = $sales_manager->get_elements($condition, $order, $limit);
			$sales = [];
			foreach($sales_list as $sale){
				$sale_props = $sale->get(
					"id", "sale_mode", "quantity", "buying_price", "sale_price", "total", "discount", "benefit"
				);
				$article = $sale->get_article();
				$bill = $sale->get_bill();
				$sale_props["article_code"] = $article->get_code();
				$sale_props["article_label"] = $article->get_label();
				$sale_props["id_bill"] = $bill->get_id();
				$sale_props["sale_date"] = $bill->get_sale_date();
				$sales[] = $sale_props;
			}
			$status = 1;
			$nb_lines_table = $sales_manager->count_lines();
		}else{
			$message = "Aucun traitement possible demandé";
		}
	}else{
		$message = "Aucun traitement demandé";
	}
	if($_GET['action'] == "list")
		echo json_encode(["status"=>$status, "message"=>$message, "sales" => $sales, "nb-lines-table"=> $nb_lines_table]);
	else
		echo json_encode(["status"=>$status, "message"=>$message]);

?>