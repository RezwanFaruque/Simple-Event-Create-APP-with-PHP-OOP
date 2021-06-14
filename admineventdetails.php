<?php

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

use Connection\EventModel;

include __DIR__ . "/layouts/adminheader.php";
require_once __DIR__ . "/Model/EventModel.php";

$event = new EventModel();

$response = $event->eventDetails($_GET['details']);

?>

<div class="container" style="width: 60%;">
  <div class="page-title mt-3 mb-3 text-center">
    Event Details Page
  </div>
  <hr>

  <div class="jumbotron">

    <div class="section">

      <div class="post-title">Event Title</div>
      <p class="lead"><?php echo $response['title'] ?></p>
    </div>



    <div class="section">
      <div class="post-des">Event Description</div>
      <p class="lead"><?php echo $response['description'] ?></p>
    </div>


    <div class="section">
      <div class="post-img">Event Image</div>

      <?php
      if ($response['image'] == null) {
      ?>
        <div class="image-null">
          Image Not Available
        </div>

      <?php
      } else {
      ?>
        <div class="image">
          <img class="img-fluid" src="<?php echo "./vendor/" . $response['image']; ?>" alt="" srcset="">
        </div>

      <?php
      }
      ?>
    </div>


    <div class="section">
      <div class="post-des">Event Place</div>
      <p class="lead"><?php echo $response['place_name'] ?></p>
    </div>

    <div class="section">
      <div class="post-des">Event Full Address</div>
      <p class="lead"><?php echo $response['address'] ?></p>
    </div>



    <div class="section">

      <div class="post-des">Event Date</div>
      <p class="lead"><?php echo $response['event_date'] ?></p>
    </div>


  </div>

</div>

<?php
include __DIR__ . "/layouts/adminfooter.php";
?>