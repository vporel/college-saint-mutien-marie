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
	if(isset($_GET['action'])){
		$sections_manager = new SectionsManager;
		if($_GET['action'] == "add"){
			if(isset($_POST['nb-lines'])){
        		$sections_failed = [];
        		$nb_lines = (int) $_POST['nb-lines'];
        		for($i = 1;$i<= $nb_lines;$i++){
        			$section = new Section([
        				"name" => $_POST["name-".$i],
        				"description" => $_POST["description-".$i]
        			]);
        			if(!$sections_manager->element_exist(["name"=>$section->get_name()])){
						if(!$sections_manager->add($section)){
							$status = 0;
							$sections_failed[] = $section->get_name();
						}
					}else{
						$status = 0;
						$sections_failed[] = $section->get_name()."(existe déjà)";
					}	
		        }
		        if($status == 1){
					$message = "Section(s) enregistrée(s)";
				}else{
					$message = "Echec de l'ajout pour : ".implode(', ', $sections_failed);
				}
        	}else{
				$status = 0;
        		$message = "Le nombre de lignes n'a pas été envoyé - erreur code";
        	}
		}elseif($_GET['action'] == "update"){
			if(isset($_POST['nb-lines'])){
        		$sections_failed = [];
        		$nb_lines = (int) $_POST['nb-lines'];
        		for($i = 1;$i<= $nb_lines;$i++){
        			$section = new Section([
        				"id" => (int) $_POST['id-'.$i],
        				"name" => $_POST["name-".$i],
        				"description" => $_POST["description-".$i]
        			]);
        			$sections_by_name = $sections_manager->get_elements("name = '".$section->get_name()."'");
					if(count($sections_by_name) < 1 OR  (count($sections_by_name) == 1 AND $sections_by_name[0]->get_id() == $section->get_id())){
						if(!$sections_manager->update($section)){
							$status = 0;
							$sections_failed[] = $section->get_name();
						}	
					}else{
						$status = 0;
						$sections_failed[] = $section->get_name()."(existe déjà)";
					}
		        }
		        if($status == 1){
					$message = "Section(s) modifiées";
				}else{
					$message = "Echec de la modification pour : ".implode(', ', $sections_failed);
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
			$sections_list = $sections_manager->get_elements($condition, $order, $limit);
			$sections = [];
			foreach($sections_list as $section){
				$sections[] = $section->get("id", "name", "description");
			}
			$status = 1;
			$nb_lines_table = $sections_manager->count_lines();
		}elseif($_GET['action'] == "delete"){
			if(isset($_GET['ids'])){
				$ids = explode('-', $_GET['ids']);
				$sections_failed = [];
				foreach ($ids as $id) {
					$id = (int) $id;
					if(!$sections_manager->delete($id)){
						$status = 0;
						$sections_failed[] = $sections_manager->get_element(["id"=>$id])->get_name();
					}
				}
				if($status == 1){
					$message = "Sections supprimées avec succès";
				}else{
					$message = "Echec de la suppression pour : ".implode(', ', $sections_failed);
				}
			}else{
				$status = 0;
				$message = "Aucun identifiant n'a été fourni";
			}
		}else{
			$status = 0;
			$message = "Aucun traitement possible demandé";
		}
	}else{
		$status = 0;
		$message = "Aucun traitement demandé";
	}
	$active_actions = $current_user->is_manager() ? 1 : 0;
	if($_GET['action'] == "list")
		echo json_encode(["status"=>$status, "message"=>$message, "sections" => $sections, "active-actions"=> $active_actions, "nb-lines-table"=> $nb_lines_table]);
	else
		echo json_encode(["status"=>$status, "message"=>$message]);

?>