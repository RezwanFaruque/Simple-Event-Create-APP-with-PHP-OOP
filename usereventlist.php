<?php

use Connection\EventModel;

session_start();

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  session_write_close();
} else {

  session_unset();
  session_write_close();
  $url = "./index.php";
  header("Location: $url");
}
?>

<?php

include __DIR__ . "/layouts/header.php";

require_once __DIR__ . "/Model/EventModel.php";

$events = new EventModel();

$results = $events->fetchAllEvnet();

?>

<div class="page-title mt-5  text-center font-weight-bold">
  All Event List

</div>
<hr>

<div class="container">
  <div class="row mb-2">
    <?php

    while ($row = $results->fetch_assoc()) {
    ?>
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card">
          <div class="card-header">
            <?php echo $row['title'] ?>
          </div>
          <div class="card-body">
            <div class="image">
              <img src="./vendor<?php echo '/' . $row['image'] ?>" alt="" srcset="">
            </div>
            <div class="description">
              <?php echo $row['description'] ?>
            </div>

          </div>
          <div class="card-footer">
            <div class="status-pl d-flex">
              <div class="place-name">
                <?php echo $row['place_name'] ?>
              </div>
              <div class="status">
                <?php echo $row['status'] ?>
              </div>
            </div>

            <input type="hidden" id="user_name" value="<?php echo $_SESSION['username']; ?>">

            <div class="pl-date d-flex">

              <div class="event-date">
                <?php echo $row['event_date'] ?>
              </div>
              <div class="register-button">
                <button class="btn btn-primary register_event" value="<?php echo $row['id']; ?>" type="submit">Register</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

    ?>
  </div>
</div>
<?php

include __DIR__ . "/layouts/footer.php";

?>

<script type="text/javascript">
  $(".register_event").on('click', function() {

    var id = $(this).val();
    var user_name = $("#user_name").val();
    console.log(id);



    $.ajax({
      type: "POST",
      url: "./Model/Eventregister.php",
      data: {
        id,
        user_name,
      },
      dataType: "JSON",
      success: function(response) {
        if (response.statusCode == 200) {
          Swal.fire({
            title: 'Success!',
            text: 'Your registration successfull',
            icon: 'success',
            confirmButtonText: 'OK'
          })
        }
      }
    });

  })
</script>