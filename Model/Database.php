<?php

class Database{

    private $connect = null;

    public function getConnect() {
        if($this->connect == null){
            $this->openConnect();
        }

        return $this->connect;
    }

    public function openConnect() {
        $connect = mysqli_connect('localhost', 'root', '') or die("Connect to database fail !!");

        mysqli_select_db($connect, 'tina_demo') or die("Connect to table in database fail !!");

        mysqli_set_charset($connect,'utf8');

        $this->connect = $connect;
    }

    public function excuteQuery($sql){
        $connect = $this->getConnect();

        $res = mysqli_query($connect, $sql);
        if(mysqli_errno($connect) != 0){
            return "Query error: " .mysqli_error($connect);
        }
    }

    public function excuteQueryLoad($sql){
        $connect = $this->getConnect();

        $res = mysqli_query($connect,$sql);

        if(mysqli_errno($connect) != 0){
            return "Query error: " .mysqli_error($connect);
        }

        $dataRes = [];

        while($row = mysqli_fetch_assoc($res)){
            $obj = new stdClass;
            foreach($row as $field_name => $field_value){
                $obj->$field_name = $field_value;
            }
            $dataRes[] = $obj;
        }

        return $dataRes;

    }

    public function __destruct(){
        if($this->connect != null){
            mysqli_close($this->connect);
        }
    }

}

$db = new Database();

$db->getConnect();


?>