<?php
session_start();
if ($_SESSION['adminlogin'] != true ) {
  header("location: ../admin_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <style>
    .maindiv{
      width: 100%;
      display: flex;
    }
    .md1{
      width: 16%;
      height: 100vh;
      background-color: #f1f1f1;
      margin: auto;
      overflow-y:auto;
      overflow-x:hidden;
    }
    .md2{
      width: 82%;
      height: 100vh;
      background-color: #f1f1f1;
      margin: auto;
    }
  </style>
</head>
<body>
  <?php
  @require  "config.php";
  ?>
  <?php require "hnav.php"?>
  <div class="maindiv">
    <div class="md1">
  <?php require "adnav.php";?>
    </div>
    <div class="md2">
 <?php require "tdisp.php";?>
    </div>
  </div>
</body>
</html>