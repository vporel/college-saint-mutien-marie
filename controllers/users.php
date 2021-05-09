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
		$users_manager = new usersManager;
		if($_GET['action'] == "add"){
			if(isset($_POST['nb-lines'])){
        		$users_failed = [];
        		$nb_lines = (int) $_POST['nb-lines'];
        		for($i = 1;$i<= $nb_lines;$i++){
        			$user = new User([
        				"username" => $_POST["username-".$i],
        				"password" => md5($_POST["password-".$i]),
        				"type" => $_POST["type-".$i],
        				"phone_number" => $_POST["phone_number-".$i],
        				"email" => $_POST["email-".$i]
        			]);
        			if(!$users_manager->element_exist(["username"=>$user->get_username()])){
						if(!$users_manager->add($user)){
							$status = 0;
							$users_failed[] = $user->get_username();
						}
					}else{
						$status = 0;
						$users_failed[] = $user->get_username()."(existe déjà)";
					}	
		        }
		        if($status == 1){
					$message = "user(s) enregistrée(s)";
				}else{
					$message = "Echec de l'ajout pour : ".implode(', ', $users_failed);
				}
        	}else{
				$status = 0;
        		$message = "Le nombre de lignes n'a pas été envoyé - erreur code";
        	}
		}elseif($_GET['action'] == "update"){
			if(isset($_POST['nb-lines'])){
        		$users_failed = [];
        		$nb_lines = (int) $_POST['nb-lines'];
        		for($i = 1;$i<= $nb_lines;$i++){
        			if($_POST["password-".$i] == ""){
        				$_POST["password-".$i] = $users_manager->get_element(["id"=>$_POST['id-'.$i]])->get_password();
        			}else{
        				$_POST["password-".$i] = md5($_POST["password-".$i]);
        			}
        			$user = new User([
        				"id" => (int) $_POST['id-'.$i],
        				"username" => $_POST["username-".$i],
        				"password" => $_POST["password-".$i],
        				"type" => $_POST["type-".$i],
        				"phone_number" => $_POST["phone_number-".$i],
        				"email" => $_POST["email-".$i]
        			]);
        			$users_by_name = $users_manager->get_elements("username = '".$user->get_username()."'");
					if(count($users_by_name) < 1 OR  (count($users_by_name) == 1 AND $users_by_name[0]->get_id() == $user->get_id())){
						if(!$users_manager->update($user)){
							$status = 0;
							$users_failed[] = $user->get_username();
						}	
					}else{
						$status = 0;
						$users_failed[] = $user->get_username()."(existe déjà)";
					}
		        }
		        if($status == 1){
					$message = "user(s) modifiées";
				}else{
					$message = "Echec de la modification pour : ".implode(', ', $users_failed);
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
			$users_list = $users_manager->get_elements($condition, $order, $limit);
			$users = [];
			foreach($users_list as $user){
				$user_props = $user->get("id", "username", "type", "phone_number", "email");
				$user_props["password"] = "";
				$users[] = $user_props;
			}
			$status = 1;
			$nb_lines_table = $users_manager->count_lines();
		}elseif($_GET['action'] == "delete"){
			if(isset($_GET['ids'])){
				$ids = explode('-', $_GET['ids']);
				$users_failed = [];
				foreach ($ids as $id) {
					$id = (int) $id;
					if(!$users_manager->delete($id)){
						$status = 0;
						$users_failed[] = $users_manager->get_element(["id"=>$id])->get_username();
					}
				}
				if($status == 1){
					$message = "users supprimées avec succès";
				}else{
					$message = "Echec de la suppression pour : ".implode(', ', $users_failed);
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
		echo json_encode(["status"=>$status, "message"=>$message, "users" => $users, "active-actions"=> $active_actions, "nb-lines-table"=> $nb_lines_table]);
	else
		echo json_encode(["status"=>$status, "message"=>$message]);

?>