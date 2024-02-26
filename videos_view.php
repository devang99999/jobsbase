<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
  <title>explore videos</title>
  <style>
    .alb {
      width: 100%;
      height: 100%;
      /* border: 1px solid black; */
      margin: 10px;
      padding: 10px; 
      /* text-align: center; */
      word-wrap: break-word;
    }

    .content {
      border-radius: 25px !important;
      width: 100% !important;
      height: 100% !important;
      border: transparent !important;
    }

    .maindiv {
        /*display: grid; */
    /* grid-template-columns: repeat(3, 2fr); */
    /* grid-gap: 10px; */
    padding: 30px;
    margin-top: 120px;
    background-image: url(./imgs/bi1.jpg);
    background-size: cover;
    background-position: center;
    align-content: flex-start;
    /* padding-top: 150px; */
    -webkit-backdrop-filter: brightness(80%);
    backdrop-filter: brightness(80%);
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;



    }

    .post {
      max-width: 500px;
      margin: auto;
      background-color: #fff;
      border: 1px solid #d3d3d3;
      margin-bottom: 45px;
      padding: 20px;
      border-radius: 15px;
    }

    .post__image {
      width: 100%;
      object-fit: contain;
      border-top: 1px solid #d3d3d3;
      border-bottom: 1px solid #d3d3d3;
      border-radius: 15px;
      height: 300px;

    }

    .post__text {
      font-weight: normal;
      padding: 20px;
    }

    .post__avatar {
      /* height: 40px; */
      width: 50px;
      border-radius: 50%;
      padding: 10px;
      /* margin-bottom: 10px; */

    }

    .post__avatarimg {
      height: 100%;
      width: 100%;
      border-radius: 50%;
      object-fit: contain;
    }

    .post__header {
      display: flex;
      flex-direction: row;
      flex-wrap: nowrap;
      justify-content: flex-start;
      align-items: center;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  require 'config.php';
  require 'boot.php';
  require 'nav.php';


  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    // echo $tit2;
    @$type = "business";
    @$id = $_SESSION['id'];
    @$sel = "bname";
  }
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    // echo $tit2;
    @$type = "individual";
    @$id = $_SESSION['id'];
    @$sel = "uname";
  }
  ?>
  <?php
  function videos()
  {
    if (!empty($_SESSION['bname'])) {
      @$tit = $_SESSION['oname'];
      @$tit2 = $_SESSION['bname'];
      // echo $tit2;
      @$type = "business";
      @$id = $_SESSION['id'];
      @$sel = "bname";
    }
    if (!empty($_SESSION['uname'])) {
      @$tit = $_SESSION['fname'];
      @$tit2 = $_SESSION['uname'];
      // echo $tit2;
      @$type = "individual";
      @$id = $_SESSION['id'];
      @$sel = "uname";
    }
    echo "<div class='maindiv'>";
    if ($_SESSION['verification'] == 1) {
      $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
    } else {
      $validate = "";
    }
    // $tit2 = $GLOBALS['tit2'];
    $sql2 = "SELECT * FROM videos WHERE status <'2' ORDER BY RAND()";
    $result2 = mysqli_query($GLOBALS['conn'], $sql2);
    while ($row =  mysqli_fetch_assoc($result2)) {
      $link = $row['link'];
      $id = $row['id'];
      // $uname = $row['uname'];
      $ext = $row['ext'];
      $name = $row['name'];
      $date = $row['datetime'];
      $ndate = date('d-m-Y', strtotime($date));
      $likes = $row['likes'];
      $comments = $row['comments'];
      $uploader_avatar = $row['avatarlink'];
      $uname = $row['uname'];
      $caption = $row['caption'];
      $uid_type = $row['uid_type'];
      $avatarlink = $row['avatarlink'];

      $indns = "SELECT * FROM $uid_type WHERE id='$uname'";
      $indn = mysqli_query($GLOBALS['conn'], $indns);
      while ($row = mysqli_fetch_assoc($indn)) {
        if (@$row['uname'] != "") {
          $un = $row['uname'];
        }
        if (@$row['bname'] != "") {
          $un = $row['bname'];
        }
        $val =  $row['verification'];
        if ($val == 1) {
          $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
        } else {
          $validate = "";
        }



        if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {



  ?>


          <div class="post">
            <div class="post__header">
              <div class="post__avatar">
                <img class="post__avatarimg" src="<?php echo $avatarlink; ?>">
              </div>
              <?php
              echo "<h3> <a style='color:#000; text-decoration:none;' href='profile.php?u=$uname&t=$uid_type'>$un $validate</a></h3>";
              ?>
            </div>
            <h3></h3>

            <div style="border:none!important;" class="card content">
              <div style="border:transparent!important;" class="bg-image hover-overlay ripple content" data-mdb-ripple-color="light">
                <a href="vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">
                  <video style="height:400px!important;width:400px!important;margin:auto!important;" class='img-fluid content' preload='metadata'>
                    <source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
                  </video>

                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <a style="padding-bottom:20px;" href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&vt=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&sn=">
                  <h6 class="card-text text-dark"><?php echo "<b>" . "@" . $uname . "</b>" . " " . $caption; ?></h6>
                </a>

                <h6 style="margin-top:20px;">Uploaded on: <?php echo $ndate; ?></h6>
                <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>




              </div>
            </div>
          </div>
          <!-- </div> -->
  <?php
        }
      }
    }
  }

  ?>
  <?php
  function images()
  {
    $sql2 = "SELECT * FROM imgs WHERE uname = '$GLOBALS[tit2]' ";
    $result2 = mysqli_query($GLOBALS['conn'], $sql2);
    while ($row =  mysqli_fetch_assoc($result2)) {
      $link = $row['link'];
      $id = $row['id'];
      // $uname = $row['uname'];
      $ext = $row['ext'];
      $name = $row['name'];
      $date = $row['datetime'];
      $ndate = date('d-m-Y', strtotime($date));
      $caption = $row['caption'];
      $likes = $row['likes'];
      $comments = $row['comments'];
      $uploader_avatar = $row['avatarlink'];
      $uname = $row['uname'];




      if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {

        $query = "SELECT * FROM like_table WHERE liker = '$GLOBALS[tit2]' AND content_link = '$link'";
        // echo $query;
        $resullt = mysqli_query($GLOBALS['conn'], $query);
        if (mysqli_num_rows($resullt) > 0) {
          // User has already liked the image
          // echo "You have already liked this image.";

          $lv = "unlike";
        } else {
          // User has not liked the image
          // echo "You have not liked this image.";
          $lv = "like";
        } ?>
        <div class="maindiv">
          <div class="card content">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <a href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">
                <img src="<?php echo $link ?>" class="img-fluid content  " />

                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $name; ?></h5>
              <ul class="list-group list-group-light list-group-small">
                <li class="list-group-item px-4">
                  <h6 class="card-text"><?php echo $caption; ?></h6>
                </li>
                <li class="list-group-item px-4">
                  <h6>Uploaded on: <?php echo $ndate; ?></h6>
                </li>
                <li class="list-group-item px-4">
                  <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                </li>
                <li class="list-group-item px-4">
                  <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>
                </li>
              </ul>
              <div class="card-body">
                <a class="btn btn-primary" href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">More Details</a>
                <form method="POST" action="like_back_img.php?u=<?php echo $GLOBALS['tit2']; ?>&link=<?php echo $link; ?>&ac=<?php echo $lv; ?>">
                  <input type="hidden" name="link" value="<?php echo $link; ?>">
                  <!-- <input class="btn btn-purple" type="submit" name="like" value="<?php echo $lv; ?>"> -->
                  <button style="background-color:purple;color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-purple"> <i class="fas fa-heart pr-2" aria-hidden="true"></i> <?php echo $lv; ?></button>

                </form>
                <!-- <a class="btn btn-primary" href='delcon.php?link=<?php echo $link; ?>'>Delete</a> -->
              </div>
            </div>
          </div>
        </div>


  <?php
      }
    }
  }
  ?>
  </div>

  <center>

    <!-- <div class="alb"> -->
    <?php videos(); ?>
    <!-- </div> -->
  </center>
  <?php

  require 'footer.php';
  ?>
</body>

</html>
<!-- 



 -->