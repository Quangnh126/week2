<?php 

include "Model/AdminModel.php";
include "Model/UserModel.php";

class Controller {

    public $view;

    public function __construct(){
        $this->view = new stdClass();
    }

    public function loginAction(){

        if(!isset($_SESSION['auth'])){

            require_once('View/login.php');

            if(isset($_POST['username'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                // echo "Username: " . $username ." Password: " .$password . "<br>"; 
    
                $adminModel = new AdminModel();
                $admin = $adminModel->login($username, $password);
    
                // print_r($admin);
    
                if(!empty($admin)){
                    $_SESSION['auth'] = $admin;
                    header('Location:'. '?action=homeAdmin');
    
                }else{
                    echo "Sai tai khoan hoac mat khau";
                }
            }
        }else{
            header('Location:'. '?action=homeAdmin');
        }
        
        

    }

    public function logoutAction(){
        unset($_SESSION['auth']);
        header('Location:'. '?action=login');
    }

    public function registerAction(){

        
    }

    public function getAllUser(){
        $userModel = new UserModel();
        $res = $userModel->getAllUserInfo();

        if(!empty($res)){
            require_once('View/adminHome.php');
        }

    }

    public function getUser(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $userModel = new UserModel();
            $res = $userModel->getInfo($id);

            if(!empty($res)){
                require_once('View/adminHome.php');
            }
        }
    }

    public function addUser(){

        $this->view->error = [];
        $this->view->success = [];
        

        if(isset($_POST['username'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $name = $_POST['name'];
            $telephone = $_POST['telephone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];

            // print_r($gender);

            if($password == $confirm_password){
                $account = new stdClass;

                $account->username = $username;
                $account->password = $password;
                $account->name = $name;
                $account->telephone = $telephone;
                $account->address = $address;
                $account->gender = $gender;

                $userModel = new UserModel();

                $checkUser = $userModel->checkUser($account->username);

                // print_r($checkUser);
                // var_dump($checkUser);

                if(empty($checkUser)){
                    $res = $userModel->register($account);

                    if(empty($res)){
                        $this->view->success[] = "Th??m ta??i khoa??n '{$username}' th??nh c??ng...";
                        
                        header('Location: '.'?action=homeAdmin');
                        echo "Th??m ta??i khoa??n '{$username}' th??nh c??ng...";
                    }else{
                        $this->view->error[] = "??a?? co?? l????i trong qua?? tri??nh x???? li?? va??o db !!!";
                        // print_r($this->view->error);
                        // die();
                        // echo "tai khoan da ton tai";
                        $message = $this->view->error;
                        // print_r($message);
                        require_once 'View/adminAddUser.php';
                        // header('Location: '.'?action=addUser');
                    }
                }else{
                    $this->view->error[] = "Ta??i khoa??n ??a?? t????n ta??i";

                    $message = $this->view->error;
                    // print_r($this->view->error);
                    // die();
                    // echo "Ta??i khoa??n ??a?? t????n ta??i";
                    require_once 'View/adminAddUser.php';

                }

                

            }else{
                $this->view->error[] = "M????t kh????u kh??ng tru??ng kh????p !!!!";
                // echo "M????t kh????u kh??ng tru??ng kh????p !!!!";
                $message = $this->view->error;
                include 'View/adminAddUser.php';
            }

            
            
            
        }

        // require_once('View/adminAddUser.php');

    }

    public function editUser(){
        $this->view->error = [];
        $this->view->success = [];

        $id = $_GET['id'];
        // print_r($_GET['id']);

        $userModel = new UserModel();
        // var_dump($user);

        // $$this->view->res = new stdClass();

        $this->view->res = $userModel->getUserById($id);

        $result = $this->view->res;
        // print_r($this->view->res);

        if(isset($_POST['telephone']) || isset($_POST['address']) || isset($_POST['name']) || isset($_POST['gender'])){
            $account = new stdClass();
            $account->telephone = $_POST['telephone'];
            $account->address = $_POST['address'];
            $account->name = $_POST['name'];
            $account->gender = $_POST['gender'];
            
            // die($_POST['gender']);

            $res = $userModel->updateUser($account, $id);

            if(!empty($res)){
               echo "??a?? co?? l????i xa??y ra trong qua?? tri??nh s????a d???? li????u !!!!"; 
            }else{
                header('Location: ' . '?action=homeAdmin');
            }

        }else{
            require_once "View/adminEditUser.php";
        }

        // require_once "View/adminEditUser.php";
    }

    public function deleteUser(){
        $id = $_GET['id'];

        $userModel = new UserModel();

        $res = $userModel->deleteUser($id);

        if(empty($res)){
            header('Location:'. '?action=homeAdmin');
        }
    }


}

?>