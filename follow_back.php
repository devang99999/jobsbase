<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>


  <?php
  require_once 'config.php';
  session_start();
  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$type = "business";
    @$csl = "bname";
    $id= $_SESSION['id'];
  }
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$csl = "uname";
    $id= $_SESSION['id'];
  }
//   $view = $_GET['view'];
  // echo $view;
  require 'boot.php';
  require 'nav.php';

  $ft = $_GET ['ft'];
  $fl = $_GET ['fl'];
  if($ft == "individual"){
      $csl2 = "uname";
  }
  if($ft == "business"){
      $csl2 = "bname";
  }
  //   unique follow id
  $followid = uniqid('followid', true) . "." . $fl . " " . date("Y-m-d H:i:s");

  // check if already following
    $flch = "SELECT * FROM follower WHERE follower = '$id'AND follower_uid = '$type' AND following_uid  = '$ft' AND following = '$fl'";
  
    $flch2 = mysqli_query($conn, $flch);
    $flch3 = mysqli_num_rows($flch2);
    if ($flch3 > 0) {
      $flch4 = "DELETE FROM follower WHERE follower = '$id' AND follower_uid = '$type' AND following_uid  = '$ft' AND following = '$fl'";
      $flch5 = mysqli_query($conn, $flch4);
      $upd = "UPDATE $type SET following = following - 1 WHERE id = '$id' AND uid_type = '$type'";
      $upd2 = mysqli_query($conn, $upd);
      $upd3 = "UPDATE $ft SET followers = followers - 1 WHERE id = '$fl' AND uid_type = '$ft'";
      $upd4 = mysqli_query($conn, $upd3);
        // header("location:profile_view.php?u=$tit2&t=$type&view=$fl&vt=$ft&sn=")
        ?>
    <script>
        window.location.href = 'profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type;?>&view=<?php echo $fl;?>&vt=<?php echo $ft;?>&sn=';
    </script>
<?php
    } else {
      $flch6 = "INSERT INTO follower (follow_id,follower,follower_uid, following,following_uid) VALUES ('$followid','$id','$type', '$fl','$ft')";
      $flch7 = mysqli_query($conn, $flch6);
    //   $fli = "INSERT INTO notification (notification_id,uid_type,uid,notification_type,notification) VALUES ('$followid','$type','$tit2','follow','$fl')";
    $upd = "UPDATE $type SET following = following + 1 WHERE id = '$id' AND uid_type = '$type'";
    
    $upd2 = mysqli_query($conn, $upd);
    $upd3 = "UPDATE $ft SET followers = followers + 1 WHERE id = '$fl' AND uid_type = '$ft'";
    
    $upd4 = mysqli_query($conn, $upd3);
    $nnid= uniqid('notification', true) . "." . $tit2 . " " . $tit2 . " " . date("Y-m-d H:i:s");
    $notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Follow','$fl','$ft','$tit2 Started Following You')";
    $notppd2= mysqli_query($conn, $notppd); 
    //   header("location:profile_view.php?u=$tit2&t=$type&view=$fl&vt=$ft&sn=")
    ?>
     <script>
       window.location.href = 'profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type;?>&view=<?php echo $fl;?>&vt=<?php echo $ft;?>&sn=';
    </script>
    <?php
    }
    ?>
</body> 
</html>