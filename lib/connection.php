<?php

namespace Connection;

use mysqli;

class DbConnection{

    const host = "localhost";
    const user = "root";
    const password = "";
    const databasename = "sjinnovation";

    public $conn;


    function __construct()
    {
         $this->conn = $this->connection();   
    }


    public function connection(){

        $conn = new mysqli(self::host , self::user , self::password , self::databasename);

        if(mysqli_connect_errno()){
            echo " Problem connection with Database";
        }

        $conn->set_charset("utf8");
        return $conn;
    
    }





}

