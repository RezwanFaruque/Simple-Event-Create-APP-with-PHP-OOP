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

require_once __DIR__ . "/Model/EventModel.php";

$events = new EventModel();

$results = $events->fetchAllEvnet();

?>

<div class="page-title mt-5  text-center font-weight-bold">
  All Event List

</div>
<hr>

<div class="event-list mt-5 mb-5 ml-5 mr-5">

  <div class="card">
    <table class="table">
      <thead>
        <tr>

          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Place Name</th>
          <th scope="col">Place Name</th>
          <th scope="col">Event Date</th>
          <th scope="col">Event Image</th>
          <th scope="col">Status</th>

        </tr>
      </thead>
      <tbody>
        <?php

        while ($row = $results->fetch_assoc()) {
        ?>
          <tr>
            <td>
              <a href="admineventdetails.php?details=<?php echo $row['id'];?>"><?php echo $row['title'] ?></a>
            </td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['place_name'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['event_date'] ?></td>
            <td><img class="img-fluid" style="width: 100px;height: 50px;" src="<?php echo "./vendor/" . $row['image']; ?>" alt="" srcset=""></td>
            <td><?php echo $row['status'] ?></td>

          </tr>
        <?php
        }

        ?>
      </tbody>
    </table>
  </div>
</div>
<?php

include __DIR__ . "/layouts/adminfooter.php";

?>