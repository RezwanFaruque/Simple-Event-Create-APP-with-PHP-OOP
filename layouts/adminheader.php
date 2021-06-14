<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SJINNOVATION TASK</title>

  <link rel="stylesheet" href="vendor/Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">


</head>
<!-- As a heading -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admineventlist.php">ADMIN DASHBOARD EVENT MANAGEMENT</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php
      if (isset($_SESSION['adminuser'])) {
      ?>
        <li class="nav-item">
          <a class="nav-link"  href="adminaddevent.php">Add Event</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="admineventlist.php">All Event</a>
        </li>

        <li class="nav-item">
          <a class="navbar-brand" href="logout.php">Logout</a>
        </li>
      <?php }
      ?>
    </ul>

  </div>






</nav>


<body>