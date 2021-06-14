<?php

namespace Connection;

class EventModel
{

    public $ds;

    function __construct()
    {
        require_once __DIR__ . "/../lib/connection.php";

        $this->ds = new DbConnection();
    }

    public function fetchAllEvnet()
    {

        $query = "SELECT * FROM events";

        $data = mysqli_query($this->ds->connection(), $query);

        return $data;
    }


    public function saveEvent()
    {

        $title = $_POST['title'];
        $description = $_POST['description'];


        $placename = $_POST['place_name'];
        $address = $_POST['event_date'];


        // prepare for image move to directory folder
        if ($_FILES['image']['name']) {

            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "./vendor/images/" . $filename;

            $savefile = "images/" . $_FILES["image"]["name"];
        }

        $event_date = $_POST['event_date'];

        if (!empty($title) && !empty($description) && !empty($placename) && !empty($address) && !empty($event_date)) {
            $query = "INSERT INTO events (title,description,image,place_name,address,event_date) VALUES ('$title','$description','$savefile','$placename','$address','$event_date')";

            $saveevent = mysqli_query($this->ds->connection(), $query);

            move_uploaded_file($tempname, $folder);

            $response = "Event Created Sucessfully";
        }else{
            $response = "Please Fill * Forms";
        }



        return $response;
    }


    public function eventDetails($id)
    {




        $query = "SELECT * FROM events WHERE id='$id'";

        $data = mysqli_query($this->ds->connection(), $query);

        $row = mysqli_fetch_array($data, MYSQLI_ASSOC);

        return $row;
    }
}
