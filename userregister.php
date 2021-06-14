<?php

 use Connection\UserModel;
 include __DIR__ ."/layouts/header.php";

 if(!empty($_POST['signup-btn'])){

    require_once __DIR__ . "/Model/UserModel.php";
    $user = new UserModel();
   
    $registermember =  $user->register();
 }

?>

<?php

if (!empty($registermember)) {
?>

    <div class=" container alert alert-danger mt-2 mb-2">

        <?php echo $registermember; ?>

    </div>
<?php
}
?>


<div class="mx-auto" style="display:flex; margin-top: 50px; margin-bottom: 50px; align-items:center; justify-content:center; width: 50%;">
    <div class="container">
        <div class="card-header">
            Register as a User
        </div>
        <div class="card-body">
            <form action="" method="post" onsubmit="registerValidation()">
                <div class="form-group">
                    <label for="my-input">First Name <span style="color: red;">*</span></label>
                    <input  id="first_name" class="form-control" type="text" name="firstname">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <label for="my-input">Last Name <span style="color: red;">*</span></label>
                    <input id="last_name"  class="form-control" type="text" name="lastname">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <label for="my-input">Email <span style="color: red;">*</span></label>
                    <input id="email"  class="form-control" type="text" name="email">
                    <span class="error"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Password <span style="color: red;">*</span></label>
                    <input id="password"  class="form-control" type="password" name="password">
                    <span class="error"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Date Of Birth <span style="color: red;">*</span></label>
                    <input id="dob"  class="form-control" type="text" name="dob">
                    <span class="error"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Address <span style="color: red;">*</span></label>
                    <input id="address"  class="form-control" type="text" name="address">
                    <span class="error"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Contact Number <span style="color: red;">*</span></label>
                    <input id="contactnumber"  class="form-control" type="text" name="contactnumber">
                    <span class="error"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Date Joined <span style="color: red;">*</span></label>
                    <input id="datejoined"  class="form-control" type="text" name="datejoined">
                    <span class="error"></span>
                </div>

                <input class="btn btn-primary" type="submit" name="signup-btn" id="signup-btn" value="Sign up">
            
            </form>
        </div>
        <div class="card-footer">
          
        </div>
    </div>
</div>




<?php
 include __DIR__ ."/layouts/footer.php"; 
?>

<script type="text/javascript">
    function registerValidation() {
        
        let valid = true;
        var firstname = $("#first_name").val();
        var lastname = $("#last_name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var dob = $("#dob").val();
        var address = $("#address").val();
        var contactnumber = $("#contactnumber").val();
        var datejoined = $("#datejoined").val();



        if (firstname.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;
        }

        if (lastname.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (email.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (password.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (dob.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (address.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (contactnumber.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (datejoined.trim() == "") {
            $(".error").html("This field is required");
            let valid = false;

        }

        if (valid == false) {
            event.preventDefault();
        }

    }
</script>