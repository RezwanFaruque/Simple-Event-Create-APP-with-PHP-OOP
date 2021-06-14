<?php

namespace Connection;

use Connection\DbConnection;


// calling database connection in OOP way

class Eventregister
{

    public $ds;

    function __construct()
    {
        require_once __DIR__ . "/../lib/connection.php";

        $this->ds = new DbConnection();
        $this->connectforajax();
    }


    public function connectforajax()
    {
        return $this->ds->connection();
       
    }
}




// ajax request for POST method for saving register event table;

$id = $_POST['id'];
$username = $_POST['user_name'];

$ds;

if ($id) {
 
    $ds = new Eventregister();

    $evet_query = "SELECT * FROM events WHERE id='$id' LIMIT 1";

    


    $result_event = mysqli_query($ds->connectforajax(), $evet_query);

    $row = mysqli_fetch_array($result_event, MYSQLI_ASSOC);

    

    if ($row['id'] != null) {


        $event_name = $row['title'];

        $event_date = $row['event_date'];

        $save_register_event_query = $query = "INSERT INTO registered_users (user_name,event_name,event_date) VALUES ('$username', '$event_name', '$event_date')";

        $save_register_event = mysqli_query($ds->connectforajax(), $save_register_event_query);

        echo json_encode(array("statusCode"=>200));
    }
}
