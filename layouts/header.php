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
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php">EVENT MANAGEMENT</a>
  <?php
  if(isset($_SESSION['username'])){
    ?>
    <a class="navbar-brand" href="logout.php">Logout</a>
    
  <?php }
  ?>
</nav>


<body>
