<?php

class UserModel extends Database {

    const key_hmac = 'sdrwe#$%^&fđg!hfdj478FHsdjfsjfhekjsdmfn7347#$%#&^&*^F%&*&(_F';

    public function login($username, $password){

        $password = hash_hmac('sha256', $password, self::key_hmac);

        $sql = "SELECT * FROM `user` WHERE username = '{$username}' AND `password` = '{$password}'";

        $result = $this->excuteQueryLoad($sql);
        if(!empty($result)){
            return reset($result);
            
        }
        return [];
    }

    public function checkUser($username){
        $sql = "SELECT * FROM `user` WHERE username = '{$username}'";

        $result = $this->excuteQueryLoad($sql);
        return $result;
    }


    public function register($account){

        $password = hash_hmac('sha256', $account->password, self::key_hmac);

        $sql = "INSERT INTO `user` (`username`, `password`, `name`, `gender`, `telephone`, `address`) 
        VALUES ('{$account->username}', '{$password}', '{$account->name}', '{$account->gender}', '{$account->telephone}', '{$account->address}')";

        $result = $this->excuteQuery($sql);

        return $result;

    }

    public function getAllUserInfo(){
        $sql = "SELECT * FROM `user`";

        $result = $this->excuteQueryLoad($sql);
        return $result;
    }

    public function getInfo($id){
        $sql = "SELECT * FROM `user` WHERE `entity_id` = '{$id}'";

        $result = $this->excuteQuery($sql);

        if($result){
            return mysqli_insert_id($this->getConnect());
        }else {
            return 'Có quá trình lỗi trong lúc thêm color.';
        }
    }

    public function getUserById($id){

        $sql = "SELECT * FROM `user` WHERE `entity_id` = '{$id}'";

        $result = $this->excuteQueryLoad($sql);

        return $result;

    }

    public function updateUser($account, $id){

        $stringEdit = "name='{$account->name}', gender='{$account->gender}', telephone='{$account->telephone}', address='{$account->address}'";

        $sql = "UPDATE `user` SET {$stringEdit} WHERE `entity_id` = '{$id}'";

        $res = $this->excuteQuery($sql);
        return $res;
    }

    public function deleteUser($id){

        $sql = "DELETE FROM `user` WHERE entity_id = {$id}";

        $res = $this->excuteQuery($sql);

        return $res;

    }

}



?>