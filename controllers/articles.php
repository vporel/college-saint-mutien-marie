
<?php

	function load_class($class_name){
        require_once("../model/classes/".$class_name.".class.php");
    }
    spl_autoload_register("load_class");
    session_start();
	$users_manager = new UsersManager;
	$current_user = $users_manager->get_element(["id"=> (int) $_SESSION['id-user']]);

	$status = 1;
	$message = "";

	$data = [];

	if(isset($_GET['action'])){
		$articles_manager = new ArticlesManager;
		if($_GET['action'] == "add"){
			if(isset($_POST['nb-lines'])){
        		$articles_failed = [];
        		$nb_lines = (int) $_POST['nb-lines'];
        		for($i = 1;$i<= $nb_lines;$i++){
        			$article = new Article([
        				"id_section" => $_POST["id_section-".$i], 
        				"code" => $_POST["code-".$i], 
        				"label" => $_POST["label-".$i], 
        				"sale_mode" => $_POST["sale_mode-".$i], 
        				"unit_buying_price" => $_POST["unit_buying_price-".$i], 
        				"unit_sale_price" => $_POST["unit_sale_price-".$i],
						"counting_unit" => $_POST["counting_unit-".$i], 
        				"whole_buying_price" => $_POST["whole_buying_price-".$i], 
        				"whole_sale_price" => $_POST["whole_sale_price-".$i], 
        				"stock" => $_POST["stock-".$i],
						"minimum_stock" => $_POST["minimum_stock-".$i], 
						"maximum_stock" => $_POST["maximum_stock-".$i]
        			]);
        			if(!$articles_manager->element_exist(["label"=>$article->get_label(), "id_section" => $_POST["id_section-".$i]])){
						if(!$articles_manager->add($article)){
							$status = 0;
							$articles_failed[] = $article->get_label();
						}
					}else{
						$status = 0;
						$articles_failed[] = $article->get_label()."(existe déjà)";
					}	
		        }
		        if($status == 1){
					$message = "article(s) enregistrée(s)";
				}else{
					$message = "Echec de l'ajout pour : ".implode(', ', $articles_failed);
				}
        	}else{
				$status = 0;
        		$message = "Le nombre de lignes n'a pas été envoyé - erreur code";
        	}
		}elseif($_GET['action'] == "update"){
			if(isset($_POST['nb-lines'])){
        		$articles_failed = [];
        		$nb_lines = (int) $_POST['nb-lines'];
        		for($i = 1;$i<= $nb_lines;$i++){
        			$article = new article([
        				"id" => $_POST["id-".$i], 
        				"id_section" => $_POST["id_section-".$i], 
        				"code" => $_POST["code-".$i], 
        				"label" => $_POST["label-".$i], 
        				"sale_mode" => $_POST["sale_mode-".$i], 
        				"unit_buying_price" => $_POST["unit_buying_price-".$i], 
        				"unit_sale_price" => $_POST["unit_sale_price-".$i],
						"counting_unit" => $_POST["counting_unit-".$i], 
        				"whole_buying_price" => $_POST["whole_buying_price-".$i], 
        				"whole_sale_price" => $_POST["whole_sale_price-".$i], 
        				"stock" => $_POST["stock-".$i],
						"minimum_stock" => $_POST["minimum_stock-".$i], 
						"maximum_stock" => $_POST["maximum_stock-".$i]
        			]);
        			$articles_by_label = $articles_manager->get_elements("label = '".$article->get_label()."' AND id_section = ".$article->get_id_section());
					if(count($articles_by_label) < 1 OR  (count($articles_by_label) == 1 AND $articles_by_label[0]->get_id() == $article->get_id())){
						if(!$articles_manager->update($article)){
							$status = 0;
							$articles_failed[] = $article->get_label();
						}	
					}else{
						$status = 0;
						$articles_failed[] = $article->get_label()."(existe déjà)";
					}
		        }
		        if($status == 1){
					$message = "Article(s) modifiées";
				}else{
					$message = "Echec de la modification pour : ".implode(', ', $articles_failed);
				}
        	}else{
				$status = 0;
        		$message = "Le nombre de lignes n'a pas été envoyé - erreur code";
        	}
		}elseif($_GET['action'] == "list"){
			$order = "";
			$condition = "";
			$limit = "";
			if(isset($_GET['order'])) $order = $_GET['order'];
			if(isset($_GET['condition'])) $condition = $_GET['condition'];
			if(isset($_GET['limit'])) $limit = $_GET['limit'];
			$articles_list = $articles_manager->get_elements($condition, $order, $limit);
			$articles = [];
			foreach($articles_list as $article){
				$article_props =  $article->get("id", "id_section", "code", "label", "sale_mode",
						"unit_buying_price", "unit_sale_price",  "counting_unit", "whole_buying_price", "whole_sale_price", "stock", "minimum_stock", "maximum_stock");
				$article_props["name_section"] = $article->get_section()->get_name();
				$articles[] = $article_props;
			}
			$status = 1;
			$nb_lines_table = $articles_manager->count_lines();
		}elseif($_GET['action'] == "delete"){
			if(isset($_GET['ids'])){
				$ids = explode('-', $_GET['ids']);
				$articles_failed = [];
				foreach ($ids as $id) {
					$id = (int) $id;
					if(!$articles_manager->delete($id)){
						$status = 0;
						$articles_failed[] = $articles_manager->get_element(["id" =>$id])->get_label();
					}
				}
				if($status == 1){
					$message = "articles supprimées avec succès";
				}else{
					$message = "Echec de la suppression pour : ".implode(', ', $articles_failed);
				}
			}else{
				$status = 0;
				$message = "Aucun identifiant n'a été fourni";
			}
		}elseif($_GET['action'] == "sold_out"){
			$sold_out = $articles_manager->get_sold_out_articles();
			$status = 1;
		}else{
			$status = 0;
			$message = "Aucun traitement possible demandé";
		}
	}else{
		$status = 0;
		$message = "Aucun traitement demandé";
	}
	$active_actions = $current_user->is_manager() ? 1 : 0;
	$data["status"] = $status;
	$data["message"] = $message;
	if($_GET['action'] == "list"){
		$data["articles"] = $articles;
		$data["active-actions"] = $active_actions;
		$data["nb-lines-table"] = $nb_lines_table;
	}elseif($_GET['action'] == "sold_out"){
		$data["sold_out"] = $sold_out;
	}
	
	echo json_encode($data);

?>