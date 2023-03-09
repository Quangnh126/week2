<?php
session_start();

define('limit_post_per_page', 8);

require_once ('Controller/Controller.php');

define('app_path', __DIR__);
define('base_path', "http://localhost/Tina_Demo/Week2/");

$controller = new Controller();

// print_r(app_path);

if(isset($_GET['action'])){

    $action = $_GET['action'];

    if($action == 'login'){
        $controller->loginAction();        
    }
    
    if($action == 'homeAdmin'){
        if(!isset($_SESSION['auth'])){
            $controller->loginAction();  
        }else{
            $controller->getAllUser(); 
        }
             
    }

    if($action == 'logout'){
        $controller->logoutAction();
    }

    if($action == 'addUser'){
        
        if(isset($_POST['username'])){
            $controller->addUser();
            // include "View/adminAddUser.php";
        }else{
            return include "View/adminAddUser.php";
        }
       
        
    }

    if($action == 'editUser'){
        // if(isset($_POST)){
        //     $controller->editUser();
        //     // include "View/adminEditUser.php";
        // }else{
        //     $controller->editUser();
        //     // include "View/adminEditUser.php";
        // }

        $controller->editUser();
    }

    if($action == 'deleteUser'){
        $controller->deleteUser();
    }


}



?>