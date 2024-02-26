<?php
  session_start();

  if ($_SESSION['loggedin'] != true) {
    header("location: login.php");
  }
  require 'config.php';
  require 'boot.php';
  require 'nav.php';

  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$id= $_SESSION['id'];
    @$type = "business";
}
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id= $_SESSION['id'];

  }

function uplv()
{
  $conn = $GLOBALS['conn'];
  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$id= $_SESSION['id'];
    @$type = "business";
}
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id= $_SESSION['id'];

  }

$vid = $_GET['vid'];
$cid =  $_GET['cid'];
$uplid = $id;
$upltype = $type;

$vidch = "SELECT * FROM course_videos WHERE video_id = '$vid' AND course_id = '$cid' AND uploader_id = '$uplid' AND uploader_uid = '$upltype'";
$vidres = mysqli_query($conn,$vidch);
$vidno = mysqli_num_rows($vidres);
if($vidno == 0)
{
  $viins= "INSERT INTO course_videos (video_id,course_id,uploader_id,uploader_uid,completion_no) VALUES ('$vid','$cid','$uplid','$upltype',0)";
  $viinsres = mysqli_query($conn,$viins);
  $novidupd = "UPDATE course SET no_of_videos = no_of_videos + 1 WHERE course_id = '$cid'";
  $novidupdres = mysqli_query($conn,$novidupd);
  $err = "Video added successfully";
  ?>
  <script>
    window.location.href = 'add_videos.php?u=<?php echo $tit2;?>&type=<?php echo $type  ?>&cid=<?php echo $cid; ?>&err=<?php echo $err; ?>';
  </script>
  <?php
}
else{
  $err = "Video already added";
  ?>

  <script>
    window.location.href = 'add_videos.php?u=<?php echo $tit2;?>&type=<?php echo $type  ?>&cid=<?php echo $cid; ?>&err=<?php echo $err; ?>';
  </script>
  <?php

}
}
function delv (){
  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$id= $_SESSION['id'];
    @$type = "business";
}
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id= $_SESSION['id'];

  }


  $vid = $_GET['vid'];
  $cid =  $_GET['cid'];
  $uplid = $id;
  $upltype = $type;
  $conn = mysqli_connect("localhost", "root", "", "project");
  $viddel = "DELETE FROM course_videos WHERE video_id = '$vid' AND course_id = '$cid' AND uploader_id = '$uplid' AND uploader_uid = '$upltype'";
  $viddelres = mysqli_query($conn,$viddel);
  $novidupd = "UPDATE course SET no_of_videos = no_of_videos - 1 WHERE course_id = '$cid'";
  $novidupdres = mysqli_query($conn,$novidupd);
  $err = "Video deleted successfully";
  ?>
  <script>
    window.location.href = 'course_details.php?u=<?php echo $tit2;?>&type=<?php echo $type  ?>&cid=<?php echo $cid; ?>&err=<?php echo $err; ?>';
  </script>
  <?php

}
  

if($_GET['act'] == "upl")
{
  uplv();

}
else if($_GET['act'] == "del")
{
  delv();
}
  ?>
