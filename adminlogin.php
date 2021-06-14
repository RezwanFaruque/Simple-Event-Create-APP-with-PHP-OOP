<?php
 use Connection\AdminModel;

 include __DIR__ . "/layouts/adminheader.php";

if(!empty($_POST['adminlogin-button'])){
    require_once __DIR__ . "/Model/AdminModel.php";

    $login = new AdminModel();

    $response = $login->adminlogin();
}
?>



<?php

if (!empty($response)) {
?>

    <div class=" container alert alert-danger mt-2 mb-2">

        <?php echo $response; ?>

    </div>
<?php
}
?>

<div class="mx-auto" style="display:flex; margin-top: 50px; margin-bottom: 50px;align-items:center; justify-content:center; width: 50%;">
    <div class="container">
        <div class="card-header">
            Admin Login
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="my-input">Email</label>
                    <input required id="my-input" class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for="my-input">Password</label>
                    <input required id="my-input" class="form-control" type="password" name="password">
                </div>

                <input name="adminlogin-button" class="btn btn-primary" type="submit" value="Sign in">
            
            </form>
        </div>
        <div class="card-footer">
           <?php
            if(!empty($response)){

               echo $response;
            }
           
           ?>
        </div>
    </div>
</div>


<?php
 include __DIR__ . "/layouts/adminfooter.php";
?>