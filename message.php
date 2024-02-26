<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="refresh" content="2"> -->
  <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">  
  <title>YOUR CONNECTIONS</title>
  <style>
    .maindiv {
      background-image: url('./imgs/bi1.jpg');
      background-size: cover;
      background-position: center;
      align-content: flex-start;
      /* padding-top: 150px; */
      -webkit-backdrop-filter: brightness(80%);
      backdrop-filter: brightness(80%);
    }
  </style>
</head>

<body>
  <?php
  require 'config.php';
  session_start();
  require 'boot.php';
  require 'nav.php';
  $sq =  $_GET['sq'];
  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$type = "business";
  }
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
  }
  // $tit2 = "james";
  $shocon = "SELECT * FROM message_table WHERE user_1 = '$tit2'OR user_2 = '$tit2' order by datetime desc";
  $shocon2 = mysqli_query($conn, $shocon);
  $shocon3 = mysqli_fetch_assoc($shocon2);
  ?>

  <div style="height:100vh;width:100%; border:1px grey solid;margin:auto;padding-top:140px;padding-bottom: 20px;" class="maindiv">
    <?php
    if (mysqli_num_rows($shocon2) > 0) {
      echo "<center>YOU HAVE CONNNECTIONS <br>";
    ?>


      <table class="table align-middle mb-0 bg-white " style="width:50%;">
        <thead class="bg-light">
          <tr>
            <th>Connections</th>
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
      while (
        $shocon3 = mysqli_fetch_assoc($shocon2)
      ) {

        if (mysqli_num_rows($shocon2) > 0) {

          $us1 = $shocon3['user_1'];
          $u1_uid = $shocon3['user_1_uid'];
          $us2 = $shocon3['user_2'];
          $u2_uid = $shocon3['user_2_uid'];
          $mes_id = $shocon3['contact_id'];
          $date = $shocon3['datetime'];
          $status = $shocon3['status'];


          $chslele = "SELECT * FROM chat WHERE sender = '$tit2' or receiver = '$tit2' order by datetime desc ";
          $chslele2 = mysqli_query($conn, $chslele);
          $chslele3 = mysqli_fetch_assoc($chslele2);
          $chslele4 = mysqli_num_rows($chslele2);
          if ($u2_uid == "business") {
            $avs = "SELECT * FROM business WHERE bname = '$us2'";
            $avs2 = mysqli_query($conn, $avs);
            while (
              $avs3 = mysqli_fetch_assoc($avs2)
            ) {
              // $avlink = $avs3['avatarlink'];
              $avuname = $avs3['bname'];
              $avemail = $avs3['email'];
            }
          }
          if ($u2_uid == "individual") {
            $avs = "SELECT * FROM individual WHERE uname = '$us2'";
            $avs2 = mysqli_query($conn, $avs);
            while (
              $avs3 = mysqli_fetch_assoc($avs2)
            ) {
              // $avlink = $avs3['avatarlink'];
              $avuname = $avs3['uname'];
              $avemail = $avs3['email'];
              $avlink = $avs3['avatarlink'];
            }
          }
          if ($tit2 == $us1) {
            $fig = "$us2";
            $figt = "$u2_uid";
            $avsel = "SELECT * FROM business WHERE bname = '$fig'";
            $avsel2 = mysqli_query($conn, $avsel);
            while (
              $avsel3 = mysqli_fetch_assoc($avsel2)
            ) {
              $avlink = $avsel3['avatarlink'];
              $avuname = $avsel3['bname'];
              $avemail = $avsel3['email'];
              // echo $avemail;
            }
          }

          if ($tit2 == $us2) {
            $fig = "$us1";
            $figt = "$u1_uid";
            $avsel = "SELECT * FROM individual WHERE uname = '$fig'";
            // echo $avsel;
            $avsel2 = mysqli_query($conn, $avsel);
            while (
              $avsel3 = mysqli_fetch_assoc($avsel2)
            ) {
              $avlink = $avsel3['avatarlink'];
              // echo $avlink;
              $avuname = $avsel3['uname'];
              $avemail = $avsel3['email'];
              // echo $fig;
              // echo $avlink;
              // echo $avemail;
            }
          }
        ?>
          <tbody>
            <tr>
              <td>
                <a href="message_back.php?u=<?php echo $tit2 ?>&t=<?php echo $type; ?>&sq=<?php echo $fig; ?>&sqt=<?php echo $figt ?>">
                  <div class="d-flex align-items-center">
                    <img style="width:50px;" src="<?php echo $avlink; ?>" />
                    <div class="ms-3">
                      <p class="fw-bold mb-1"><?php echo $fig; ?></p>
                      <p class="text-muted mb-0"><?php echo $avemail; ?></p>
                    </div>
                  </div>
                </a>
              </td>
            </tr>

          </tbody>


      <?php

        }
      }
      ?>
      </table>




  </div>
  <?php

  require 'footer.php'; ?>
</body>

</html>