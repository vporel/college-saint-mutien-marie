
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
		if($_GET['action'] == "add"){
			if(isset($_POST['nb-lines'])){
        		$nb_lines = (int) $_POST['nb-lines'];
        		$sales = [];
        		for($i = 1;$i<= $nb_lines;$i++){
        			$sales[] = new Sale([
        				"id_article" => $_POST["id_article-".$i],
        				"sale_mode" => $_POST["sale_mode-".$i],
        				"quantity" => $_POST["quantity-".$i],
        				"buying_price"=> $_POST["buying_price-".$i],
        				"sale_price" => $_POST["sale_price-".$i],
        				"discount" => $_POST["discount-".$i]
        			]);
		        }
		        $bill = new Bill([
		        	"client" => $_POST["client"],
		        	"client_number" => $_POST["client_number"],
		        	"sale_date" => Bill::CUR_DATE
		        ]);
		        if($bills_manager->add($bill)){
		        	$status = 1;
					$message = "Facture enregistrée";
					$bill = $bills_manager->get_elements("", "id DESC", "0,1")[0];
					foreach($sales as $sale){
						$sale->set_bill($bill);
						if($sales_manager->add($sale)){
							$article = $sale->get_article();
							$article->set_stock($article->get_stock() - $sale->get_quantity());
							$articles_manager->update($article);
						}
					}
				}else{
					$message = "Echec d'enregistrement de la facture";
				}
        	}else{
        		$message = "Le nombre de lignes n'a pas été envoyé - erreur code";
        	}
		}elseif($_GET['action'] == "list"){
			$order = "";
			$condition = "";
			$limit = "";
			if(isset($_GET['order'])) $order = $_GET['order'];
			if(isset($_GET['condition'])) $condition = $_GET['condition'];
			if(isset($_GET['limit'])) $limit = $_GET['limit'];
			$bills_list = $bills_manager->get_elements($condition, $order, $limit);
			$bills = [];
			foreach($bills_list as $bill){
				$bills[] = $bill->get("id", "client", "client_number", "sale_date", "total_price");
			}
			$status = 1;
			$nb_lines_table = $bills_manager->count_lines();
		}elseif($_GET['action'] == "show_bill"){
			$bill_object = $bills_manager->get_element(["id"=>$_GET["id_bill"]]);
			$bill = $bill_object->get("id", "client", "client_number", "sale_date", "total_price");
			$sales = $sales_manager->get_elements("id_bill = ".$bill_object->get_id(), "", "");
			$lines = [];
			foreach ($sales as $sale) {
				$sale_props = $sale->get("sale_mode", "quantity","total", "sale_price");
				$sale_props["label_article"] = $sale->get_article()->get_label();
				$lines[] = $sale_props;
			}
			$status = 1;
		}else{
			$message = "Aucun traitement possible demandé";
		}
	}else{
		$message = "Aucun traitement demandé";
	}
	if($_GET['action'] == "list"){
		echo json_encode(["status"=>$status, "message"=>$message, "bills" => $bills, "nb-lines-table"=> $nb_lines_table]);
	}elseif($_GET['action'] == "show_bill"){
		echo json_encode(["status"=>$status, "message"=>$message, "bill" => $bill, "lines" => $lines]);
	}else{
		echo json_encode(["status"=>$status, "message"=>$message]);
	}

?>