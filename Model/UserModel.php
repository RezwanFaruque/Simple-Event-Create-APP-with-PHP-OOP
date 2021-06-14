<?php

namespace Connection;



class UserModel
{


    public $ds;
    public $helpers;

    function __construct()
    {

        // establishing the connection in database
        require_once __DIR__ . "/../lib/connection.php";
        $this->ds = new DbConnection();

        require_once __DIR__ . "/../helpers/helper.php";
        $this->helpers = new Helper();
    }


    public function register()
    {



        $firstname = $this->helpers->inputCheck($_POST['firstname']);
        $lastname = $this->helpers->inputCheck($_POST['lastname']);
        $email = $this->helpers->inputCheck($_POST['email']);



        $exit_email = "SELECT * FROM users WHERE email='$email' LIMIT 1";

        $restult_email = mysqli_query($this->ds->connection(), $exit_email);

        $count = 0;
        if (mysqli_num_rows($restult_email) != null) {
            $count  = 1;
        } else {
            $count = 0;
        }

        $password = $this->helpers->inputCheck($_POST['password']);
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);



        $dob = $this->helpers->inputCheck($_POST['dob']);
        $address = $this->helpers->inputCheck($_POST['address']);
        $contactnumber = $this->helpers->inputCheck($_POST['contactnumber']);
        $datejoined = $this->helpers->inputCheck($_POST['datejoined']);

        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($dob) && !empty($address) && !empty($contactnumber) && !empty($datejoined)) {


            if (preg_match('|^[A-Z0-9._%+-]+@gmail\.com$|i', $email)) {
                if ($count == 0) {
                    $query = "INSERT INTO users (firstname,lastname,email,password,dob,address,contactnumber,datejoined) VALUES ('$firstname', '$lastname', '$email','$hashpassword','$dob','$address','$contactnumber','$datejoined')";


                    $insert_data = mysqli_query($this->ds->connection(), $query);

                    $response = "User Created Successfully";
                } else {

                    $response = "This email Already Taken ";
                }

                
            } else {
                $response = "Email is not valid";
            }
        } else {

            $response = "Please Fill * Input Fields";
        }


        return $response;
    }



    public function login()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];


        if (!empty($email)) {
            $fetchemail = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

            $result = mysqli_query($this->ds->connection(), $fetchemail);

            if (mysqli_num_rows($result) != null) {

                $result_arr = mysqli_fetch_assoc($result);

                $fetchpass = $result_arr['password'];

                if (password_verify($password, $fetchpass)) {
                    session_start();
                    $_SESSION["username"] = $result_arr['firstname'] . $result_arr['lastname'];
                    session_write_close();
                    $url = "./usereventlist.php";
                    header("Location: $url");
                } else {

                    $response = "Email and Password Does not match";

                    return $response;
                }
            } else {
                $response = "Email Not  Found";

                return $response;
            }
        }
    }
}
