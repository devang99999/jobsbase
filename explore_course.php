<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
  <title>EXPLORE COURSES</title>
  <style>
    .maindiv {
      background-image: url('./imgs/bi1.jpg');
      background-size: cover;
      background-position: center;
      padding-bottom: 50px ;

    }
  </style>
</head>

<body>
<div class="maindiv">
  <?php
  session_start();
  @require 'config.php';
  require 'boot.php';
  require 'nav.php';

  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$id = $_SESSION['id'];
    @$type = "business";
  }
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id = $_SESSION['id'];
  }

  $cid = $_GET['cid'];
  $stmt = "SELECT * FROM course   WHERE  status <'2' ORDER BY id DESC";
  $result = mysqli_query($GLOBALS["conn"], $stmt);
  $num = mysqli_num_rows($result);

  if ($num == 0) {

    echo "<center><h1 style='margin-top:50px;'>No Courses Found</h1></center>";
    echo $stmt;
  } else if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      $couname = $row["course_name"];
      $course_description = $row["course_description"];

      $cname = $row['course_name'];
      $ccatid = $row['course_category_id'];
      $cacatid = $row['course_sub_category_id'];
      $cid = $row['course_id'];
      $uploader = $row['uploader'];
      $uploader_type = $row['uploader_type'];


      $no_of_videos = $row['no_of_videos'];
      $no_of_joiners = $row['no_of_joiners'];
      $date = $row['datetime'];
      $cdate = date('Y-m-d', strtotime($date));

      $cosatsle = "SELECT * FROM course_category WHERE id = '$ccatid'";
      $cosatres = mysqli_query($conn, $cosatsle);
      while ($cosatrow = mysqli_fetch_assoc($cosatres)) {
        $ccat = $cosatrow['course_category'];


        $cossatsle = "SELECT * FROM course_sub_catogary WHERE id = '$cacatid'";
        $cossatres = mysqli_query($conn, $cossatsle);
        while ($cossatrow = mysqli_fetch_assoc($cossatres)) {
          $cscat = $cossatrow['course_sub_category'];

          $upsel = "SELECT * FROM $uploader_type  WHERE id = '$uploader'";
          $upres = mysqli_query($conn, $upsel);
          while ($upselrow = mysqli_fetch_assoc($upres)) {

            @$un = $upselrow['uname'];
            @$bn = $upselrow['bname'];
            @$avl = $upselrow['avatarlink'];
            @$avi = "<img src='$avl' style='width:40px;border-radius:50%;'>";

            $che = "SELECT * FROM `joiner_table` WHERE `joiner_uname`='$id' AND `course_id`='$cid'";
            $che2 = mysqli_query($conn, $che);
            $che3 = mysqli_num_rows($che2);
            if ($uploader == $id && $uploader_type == $type) {
              $butt = "<h3>You are the owner of this course</h3>";
            } else  if ($che3 > 0) {
              $butt = "<a href='course_view.php?u=$tit2&t=$type&cid=$cid'>
    <button type='button' class='btn btn-success'>Go To Course</button>
</a>";
            } else {
              $butt = "<a href='view_course_back?u=$tit2&type=$type&cid=$cid'>
    <button type='button' class='btn btn-success'>Join Course</button>
</a>";
            }
  ?>
  
            <div style="width:50%;margin:auto;margin-top:150px" class="bind">
              <div class="card">
                <h5 class="card-header">Course Name <b><?php echo $cname; ?></b></h5>
                <div class="card-body">
                  <h5 class="card-title">Uploaded By <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&view=<?php if ($uploader_type == "individual") {
                                                                                                                                    echo $un;
                                                                                                                                  } else {
                                                                                                                                    echo $bn;
                                                                                                                                  } ?>&vt=<?php echo $uploader_type; ?>&sn=">
                      <?php if ($uploader_type == "individual") {
                        echo $un . " " . $avi;
                      } else {
                        echo $bn . " " . $avi;
                      } ?>
                    </a>
                  </h5>
                  <p class="card-text">Course Category:<b> <?php echo $ccat; ?></b></p>
                  <p class="card-text">Course Sub Category:<b> <?php echo $cscat; ?></b></p>
                  <p class="card-text">No of Videos:<b> <?php echo $no_of_videos; ?></b></p>
                  <p class="card-text">No of Joiners :<b> <?php echo $no_of_joiners; ?></b></p>
                  <p class="card-text">Uploaded on :<b> <?php echo $cdate; ?></b></p>
                  <p class="card-text">Course Description :<b> <?php echo $course_description; ?></b></p>
                  <?php echo $butt;   ?>
                  <a class="btn btn-dark" href="report?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $uploader; ?>&sqt=<?php echo $uploader_type; ?>&rep=course&link=<?php echo $cid; ?>">REPORT COURSE</a>
                </div>
              </div>
            </div>
            
            <?php
          }
        }
      }
    }
  }

  
  ?>
  </div>





</body>

</html>