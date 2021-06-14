<?php

use Connection\EventModel;

session_start();
if (isset($_SESSION['adminuser'])) {
    $username = $_SESSION['adminuser'];
    session_write_close();
} else {

    session_unset();
    session_write_close();
    $url = "./adminlogin.php";
    header("Location: $url");
}
?>

<?php
include __DIR__ . "/layouts/adminheader.php";

if (!empty($_POST['save-event'])) {

    require_once __DIR__ . "/Model/EventModel.php";
    $event = new EventModel();

    $response = $event->saveEvent();
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

<div class="mx-auto" style="display:flex; margin-top: 50px; margin-bottom: 50px; align-items:center; justify-content:center; width: 50%;">
    <div class="container">
        <div class="card-header">
            Add Event
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="loginvalidation()">
                <div class="form-group">
                    <label for="my-input">Title <span style="color: red;">*</span></label>
                    <input id="title" class="form-control" type="text" name="title">
                    <span id="error-t"></span>
                </div>
                <div class="form-group">
                    <label for="my-input">Description <span style="color: red;">*</span></label>
                    <textarea name="description" class="form-control" id="description" cols="20" rows="5"></textarea>
                    <span id="error-d"></span>
                </div>
                <div class="form-group">
                    <label for="my-input">Image</label>
                    <input id="my-input" class="form-control" type="file" name="image">

                </div>

                <div class="form-group">
                    <label for="my-input">Place Name <span style="color: red;">*</span></label>
                    <input id="place_name" class="form-control" type="text" name="place_name">
                    <span id="error-p"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Address <span style="color: red;">*</span></label>
                    <input id="address" class="form-control" type="text" name="address">
                    <span id="error-a"></span>
                </div>

                <div class="form-group">
                    <label for="my-input">Event Date <span style="color: red;">*</span></label>
                    <input id="event_date" class="form-control" type="text" name="event_date">
                    <span id="error-e"></span>
                </div>

                <input class="btn btn-primary" type="submit" name="save-event" id="signup-btn" value="Submit">
               
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>


<?php
include __DIR__ . "/layouts/adminfooter.php";
?>

<script type="text/javascript">
    function loginvalidation() {
        console.log("function testing");
        let valid = true;
        var title = $("#title").val();
        var description = $("#description").val();
        var place_name = $("#place_name").val();
        var address = $("#address").val();
        var event_date = $("#event_date").val();

        if (title.trim() == "") {
            $("#error-t").html("This field is required");
            let valid = false;
        }

        if (description.trim() == "") {
            $("#error-d").html("This field is required");
            let valid = false;

        }

        if (place_name.trim() == "") {
            $("#error-p").html("This field is required");
            let valid = false;

        }

        if (address.trim() == "") {
            $("#error-a").html("This field is required");
            let valid = false;

        }

        if (event_date.trim() == "") {
            $("#error-e").html("This field is required");
            let valid = false;

        }

        if (valid == false) {
            event.preventDefault();
        }

    }
</script>