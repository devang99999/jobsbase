<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/core.css">
  <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
  <title>feed</title>
  <style>
    .vadj {
        background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;
       background-size: cover;
      /* position: relative; */
      backdrop-filter: brightness(50%);
      
      z-index: -10 !important;

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
      position: absolute;

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

    .vadj {
      width: 100%;
      margin: auto;
      /* border:1px solid red; */
      height: max-content;
      display: flex;
      /* height: 100vh; */
    }

    .div1 {
      justify-content: end;
      width: 50%;
      display: flex;
      flex-direction: column;
      align-content: flex-end;
      align-items: flex-end;
      margin-left: 20%;
      margin-top: 150px;
    }

    .div2 {
      width: 30%;
      margin-top: 180px;
      margin-right: 20px;

    }
    @media only screen and (max-width: 1000px) {
      .bgdiv{
      visibility: hidden;  
      }
      .div2{
        display:none;
      }
      .div1 {
      justify-content: end;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-content: flex-end;
      align-items: flex-end;
      margin-left: auto;
      margin-top: 18px;
    }
    }
    .fres{
      display: flex;
    flex-direction: column;
    align-items: center;
    flex-wrap: wrap;
    align-content: center;

    }
    </style>
</head>

<body>


  <?php

  session_start();
  if ($_SESSION['loggedin'] != true) {
    header("location: login.php");
  }
  if ($_SESSION['verification'] == 1) {
    $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
  } else {
    $validate = "";
  }
  require "nav.php";
  @require "config.php";
  require "boot.php";


  if (!empty($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    $tit2 = $_SESSION['uname'];
    $type = "individual";
    $id = $_SESSION['id'];
  }
  if (!empty($_SESSION['bname'])) {
    $uname = $_SESSION['bname'];
    $tit2 = $_SESSION['bname'];
    $type = "business";
    $id = $_SESSION['id'];
    $ts = "SELECT lastlogin FROM business WHERE bname = '$uname'";
    $resultts = mysqli_query($conn, $ts);
    $rowts = mysqli_fetch_assoc($resultts);
    $lastlogin = $rowts['lastlogin'];
    $sqlts = "UPDATE business SET lastlogin = CURRENT_TIMESTAMP WHERE bname = '$uname'";
    $resultsqlts = mysqli_query($conn, $sqlts);
    // echo $lastlogin;
  }



  ?>

  <!-- <center>
    <h1>Uploaded Videos</h1>
  </center> -->
  
   <div class="vadj">
    <div class="div1">
      <?php


      $folse = "SELECT * FROM follower WHERE follower = '$id' AND follower_uid = '$type'";

      $resul = mysqli_query($conn, $folse);
      $fol = mysqli_num_rows($resul);
      if ($fol > 0) {
        while ($row = mysqli_fetch_assoc($resul)) {

          $view = $row['following'];
          $view_uid = $row['following_uid'];

          $tes = "SELECT * FROM videos WHERE( uname = '$view') AND uid_type = '$view_uid' AND status <'2' ";
          $resullt = mysqli_query($conn, $tes);
          while ($row = mysqli_fetch_assoc($resullt)) {

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
                $ver = $row['verification'];

                if ($ver == 1) {
                  $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
                } else {
                  $validate = "";
                }
              }

              if (@$row['bname'] != "") {
                $un = $row['bname'];
                $ver = $row['verification'];

                if ($ver == 1) {
                  $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
                } else {
                  $validate = "";
                }
              }

              if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {


      ?>

                <div class="post">
                  <div class="post__header">
                    <div class="post__avatar">
                      <img class="post__avatarimg" src="<?php echo $avatarlink; ?>">
                    </div>
                    <?php
                    echo "<h3> <a style='color:#000; text-decoration:none;' href='profile_view.php?u=$tit2&t=$uid_type'>$un $validate</a></h3>";
                    ?>
                  </div>
                  <h3></h3>

                  <div style="border:none!important;" class="card content">
                    <div style="border:transparent!important;" class="bg-image hover-overlay ripple content" data-mdb-ripple-color="light">
                      <a href="vid_view.php?u=<?php echo $un; ?>&link=<?php echo $link; ?>&t=individual">
                        <video class='img-fluid content' preload='metadata'>
                          <source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
                        </video>

                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $name; ?></h5>
                      <a style="padding-bottom:20px;" href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&vt=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&sn=">
                        <h6 class="card-text text-dark"><?php echo "<b>" . "@" . $un . "</b>" . " " . $caption; ?></h6>
                      </a>

                      <h6 style="margin-top:20px;">Uploaded on: <?php echo $ndate; ?></h6>
                      <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                      <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>




                    </div>
                  </div>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="delvid">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">VIDEO DELETION CONFIRMATION</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <p>ARE YOU SURE YOU WANT TO DELETE THIS VIDEO</p>
                        <form method="POST" action="delcon.php?u=<?php echo $GLOBALS['tit2']; ?>&link=<?php echo $link; ?>&ac=<?php echo "delvid"; ?>">
                          <input type="hidden" name="link" value="<?php echo $link; ?>">
                          <button style="color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-danger"> <i class="fa-solid fa-trash" aria-hidden="true"></i> DELETE VIDEO</button>

                        </form>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>

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
<div class="div2">
      <?php
      $shocon = "SELECT * FROM message_table WHERE user_1 = '$tit2'OR user_2 = '$tit2' order by datetime desc";
      $shocon2 = mysqli_query($conn, $shocon);
      $shocon3 = mysqli_fetch_assoc($shocon2);
      ?>
      <div style=" border:1px grey solid; background:#fff;" class="maindiv">
        <?php
        if (mysqli_num_rows($shocon2) > 0) {
          echo "<center><span  style='background:#fff;'>YOU HAVE CONNNECTIONS </span><br></center>";
        ?>


          <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th><a href="message?u=<?php echo $tit2 ?>&t=<?php echo $type ?>&sq=">Connections</a></th>
                <!-- <th>Title</th>
        <th>Status</th>
        <th>Position</th>
        <th>Actions</th> -->
              </tr>
            </thead>
            <?php
          }
          if (mysqli_num_rows($shocon2) <= 0) {
            echo "<center>YOU HAVE NO CONNNECTIONS <br>";
            echo "SEARCH<a href='search.php?u=$tit2&t=$type&se=people'> PEOPLE </a> or <a href='search.php?u=$tit2&t=$type&se=business'>BUSINESS</a>";

            echo "</center>";
          }
          $shocon = "SELECT * FROM message_table WHERE user_1 = '$tit2' or user_2 = '$tit2' order by datetime desc";
          $shocon2 = mysqli_query($conn, $shocon);
          for ($i = 0; $i < 5; $i++) {
            if ($shocon3 = mysqli_fetch_assoc($shocon2)) {
                if (mysqli_num_rows($shocon2) > 0) {
                    $us1 = $shocon3['user_1'];
                    $u1_uid = $shocon3['user_1_uid'];
                    $us2 = $shocon3['user_2'];
                    $u2_uid = $shocon3['user_2_uid'];
                    $mes_id = $shocon3['contact_id'];
                    $date = $shocon3['datetime'];
                    $status = $shocon3['status'];
        
                    $chslele = "SELECT * FROM chat WHERE sender = '$tit2' OR receiver = '$tit2' ORDER BY datetime DESC";
                    $chslele2 = mysqli_query($conn, $chslele);
                    $chslele3 = mysqli_fetch_assoc($chslele2);
                    $chslele4 = mysqli_num_rows($chslele2);
        
                    if ($u2_uid == "business") {
                        $avs = "SELECT * FROM business WHERE bname = '$us2'";
                        $avs2 = mysqli_query($conn, $avs);
                        while ($avs3 = mysqli_fetch_assoc($avs2)) {
                            $avuname = $avs3['bname'];
                            $avemail = $avs3['email'];
                            $verify = $avs3['verification'];
        
                            if ($verify == 1) {
                                $bt = '<img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png"';
                            } else {
                                $bt = "";
                            }
                        }
                    }
        
                    if ($u2_uid == "individual") {
                        $avs = "SELECT * FROM individual WHERE uname = '$us2'";
                        $avs2 = mysqli_query($conn, $avs);
                        while ($avs3 = mysqli_fetch_assoc($avs2)) {
                            $avuname = $avs3['uname'];
                            $avemail = $avs3['email'];
                            $avlink = $avs3['avatarlink'];
                            $verify = $avs3['verification'];
        
                            if ($verify == 1) {
                                $bt = '<img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png"';
                            } else {
                                $bt = "";
                            }
                        }
                    }
        
                    if ($tit2 == $us1) {
                        $fig = "$us2";
                        $avsel = "SELECT * FROM business WHERE bname = '$fig'";
                        $avsel2 = mysqli_query($conn, $avsel);
                        while ($avsel3 = mysqli_fetch_assoc($avsel2)) {
                            $avlink = $avsel3['avatarlink'];
                            $avuname = $avsel3['bname'];
                            $avemail = $avsel3['email'];
                        }
                    }
        
                    if ($tit2 == $us2) {
                        $fig = "$us1";
                        $avsel = "SELECT * FROM individual WHERE uname = '$fig'";
                        $avsel2 = mysqli_query($conn, $avsel);
                        while ($avsel3 = mysqli_fetch_assoc($avsel2)) {
                            $avlink = $avsel3['avatarlink'];
                            $avuname = $avsel3['uname'];
                            $avemail = $avsel3['email'];
                        }
                    }
                    ?>
                    <tbody>
                        <tr>
                            <td style="width:80%!important;">
                                <a href="message_back.php?u=<?php echo $tit2 ?>&t=<?php echo $type; ?>&sq=<?php echo $fig; ?>">
                                    <div style="width:80%!important;" class="d-flex align-items-center">
                                        <img style="width:20%;" src="<?php echo $avlink; ?>" />
                                        <div style="width:80%!important;word-wrap:break-word" class="ms-3">
                                            <p style="width:80%!important;word-wrap:break-word" class="fw-bold mb-1"><?php echo $fig . " &nbsp" . $bt; ?></p>
                                            <!-- <p style="width:80%!important;"class="text-muted mb-0"><?php echo $avemail; ?></p> -->
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                }
            }
        }
        
          ?>
          </table>




      </div>

</div>
   </div>   
  <div style="position:absolute;width:100%" class="food">
  <?php
  require "footer.php";

  ?>
  </div>



  <div class="bgdiv my-container"> </div>
  
</body>

</html>