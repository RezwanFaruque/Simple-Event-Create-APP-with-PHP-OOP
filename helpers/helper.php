<?php
namespace Connection;


class Helper{


    public $ds;

    public function __construct()
    {
        
    }


    public function inputCheck($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);


        return $data;

    }



}