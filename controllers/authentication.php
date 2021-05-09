<?php

    function load_class($class_name){
        require_once("../model/classes/".$class_name.".class.php");
    }
    spl_autoload_register("load_class");
    $status = 0;
    $message = "";
    if(isset($_GET['action'])){
        $users_manager = new UsersManager;
        if($_GET['action'] == "initialization"){
            if(isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['confirm-password']) AND isset($_POST['phone-number']) AND isset($_POST['email'])){
                $user = new User([
                    "username" => $_POST['username'], "password" => md5($_POST['password']), "type" => User::MANAGER_TYPE, "phone_number" => $_POST['phone-number'], "email" => $_POST['email']
                ]);
                if($users_manager->add($user)){
                    $status = 1;
                    $message = "Enregistrement effectué";
                }else{
                    $message = "Erreur lors de l'enregistrement";
                }
            }else{
               $message = "Certains champs nécessaires n'existent pas.";
            }
        }elseif($_GET['action'] == "authentication"){
            if($users_manager->element_exist(['username'=>$_POST['username']])){
                $user = $users_manager->get_element(['username'=>$_POST['username']]);
                if($user->get_password() == md5($_POST['password'])){
                    session_start();
                    $_SESSION['id-user'] = $user->get_id();
                    $status = 1;
                    $message = "Utilisateur authentifié";
                }else{
                    $message = "Mot de passe incorrect";
                }
            }else{
                $message = "Utilisateur inexistant";
            }   
        }else{
            $message = "Aucun traitement possible demandé";
        }
    }else{
        $message = "Aucun traitement demandé";
    }

    echo json_encode(["status"=>$status, "message"=>$message]);
?>
