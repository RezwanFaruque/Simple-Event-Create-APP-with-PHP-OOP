<?php

namespace Connection;

class AdminModel
{

    public $ds;


    function __construct()
    {
        require_once __DIR__ . "/../lib/connection.php";

        $this->ds = new DbConnection();
    }


    public function adminlogin()
    {


        $email = $_POST['email'];
        $password = $_POST['password'];


        if (!empty($email)) {
            $fetchemail = "SELECT * FROM admins WHERE email = '$email' LIMIT 1";

            $result = mysqli_query($this->ds->connection(), $fetchemail);

            if (mysqli_num_rows($result) != null) {

                $result_arr = mysqli_fetch_assoc($result);

                $fetchpass = $result_arr['password'];

                if (password_verify($password, $fetchpass)) {
                    session_start();
                    $_SESSION["adminuser"] = "AdminUser";
                    session_write_close();
                    $url = "./admineventlist.php";
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
