<?php

include "Database.php";

class AdminModel extends Database {

    public function login($username, $password){
        $sql = "SELECT * FROM `admins` WHERE username = '{$username}' AND `password` = '{$password}'";

        $result = $this->excuteQueryLoad($sql);
        if(!empty($result)){
            return reset($result);
            
        }
        return [];
    }

    public function register($account){

    }

}

?>