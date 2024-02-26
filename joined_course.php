<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>JOINED COURSES</title>
    <style>
      .maindiv {
            height: 100vh;
            width: 100%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            align-content: center;
            /* padding-top: 160px; */
            background-image: url('./imgs/bi1.jpg');
            background-size: cover;
            background-position: center;
            align-content: flex-start;
            padding-top: 150px;
            

        }
    </style>
</head>
<body>
<?php 
session_start();
require 'config.php';
require 'boot.php';
require "nav.php";

if (!empty($_SESSION['bname'])) {
    $tit = $_SESSION['oname'];
    $tit2 = $_SESSION['bname'];
    $type = "business";
    $id = $_SESSION['id'];
}
if (!empty($_SESSION['uname'])) {
    $tit = $_SESSION['fname'];
    $tit2 = $_SESSION['uname'];
    $type = "individual";
    $id = $_SESSION['id'];
}


$joisel = "SELECT * FROM joiner_table WHERE joiner_uname = '$id' AND joiner_type = '$type'";
$joisel2 = mysqli_query($conn, $joisel);
$joisel3 = mysqli_num_rows($joisel2);
if($joisel3 <= 0){
    echo "<center><h1>Sorry, you are not a joiner</h1></center>";
   
}
else{
    while($jorow = mysqli_fetch_assoc($joisel2))
    {
        $jid= $jorow['joiner_id'];
        $cid = $jorow['course_id'];
        $cer_id = $jorow['certificate_id'];
        $juname = $jorow['joiner_uname'];
        $jotype = $jorow['joiner_type'];
        $uuname = $jorow['uploader_uname'];
        $uutype = $jorow['uploader_type'];  
        $video = $jorow['video_count'];
        $completion_count = $jorow['completion_count'];
        $date = $jorow['datetime'];


        $cconame = "SELECT * FROM course WHERE course_id = '$cid'";
        $cconame2 = mysqli_query($conn, $cconame);
        $cconame3 = mysqli_num_rows($cconame2);
        $cconame4 = mysqli_fetch_assoc($cconame2);
        @$coname = $cconame4['course_name'];

        $ccename = "SELECT * FROM certificate WHERE certificate_id = '$cer_id' AND course_id = '$cid' AND joiner_id = '$jid'";
        $ccename2 = mysqli_query($conn, $ccename);
        $ccename3 = mysqli_num_rows($ccename2);
        $ccename4 = mysqli_fetch_assoc($ccename2);
        @$comtime = $ccename4['datetime'];

        $uunfet = "SELECT * FROM $uutype WHERE id= '$uuname'";
        $uunfet2 = mysqli_query($conn, $uunfet);
        $uunfet3 = mysqli_num_rows($uunfet2);
        $uunfet4 = mysqli_fetch_assoc($uunfet2);
       
        if($uutype == "business"){
            $upluname = $uunfet4['bname'];
        }
        if($uutype == "individual"){
            $upluname = $uunfet4['uname'];
        }

        if ($video == $completion_count) {
          $com = "Completed";
          $but = "<a href='claim_certificate.php?cid=$cid&joid=$jid'><button type='button' class='btn btn-success'>See Certificate</button></a>";
        }
        else{
          $com = "Not Completed";
          $but = "<a href='course_view.php?u=$tit2&t=$type&cid=$cid'><button type='button' class='btn btn-primary'>Complete Course</button></a>";
        }


        ?>  
          <div class="maindiv">
        <div style="width:50%;margin:auto; display:flex;flex-direction:row;flex-wrap:wrap;">
        <div style="margin:auto!important;background-color:#ffffff;" class=" card  border border-primary shadow-0 ">
  <div style="background-color:#ffffff;" class="card-header"><?php echo $coname?></div>
  <div style="background-color:#ffffff;" class="card-body">
    <h5 class="card-title">Uploader BY : <?php echo $upluname;?></h5>
    <p class="card-text">
      YOU HAVE WATCHED <b><?php echo $completion_count;?></b> VIDEOS OUT OF <b><?php echo $video;?></b> VIDEOS
    </p>
    
    <?php echo $but;?>
    
  </div>
  <div style="background-color:#ffffff;" class="card-footer">You Have <?php echo $com;?> This Course</div>
</div>
        </div>
          </div>
        <?php
    }
}


?>



   
</body>
</html>