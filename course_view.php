<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .maindiv{
            width: 60%;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-top: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php
    session_start();
    @require 'config.php';
    require 'boot.php';
    // require 'nav.php';

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
    $che = "SELECT * FROM `joiner_table` WHERE `joiner_uname`='$id' AND `course_id`='$cid'";
    $che2 = mysqli_query($conn, $che);
    while($row = mysqli_fetch_assoc($che2)){
        $cid = $_GET['cid'];
        $joiner_id = $row['joiner_id'];
        
    
    
        $stmt = "select * from course where course_id = '$cid'";
        $result = mysqli_query($GLOBALS["conn"], $stmt);
        $row = mysqli_fetch_assoc($result);
        $couname = $row["course_name"];
        $course_description = $row["course_description"];
        $uploader = $row['uploader'];
        $uploader_type = $row['uploader_type'];
        $no_of_videos = $row['no_of_videos']; 
        

         

        
        $csel = "SELECT * FROM `course_videos` WHERE `course_id`='$cid'";
        // echo $csel;
        $csel2 = mysqli_query($conn, $csel);
        $num = mysqli_num_rows($csel2);
        
        while($cselrow = mysqli_fetch_assoc($csel2))
        {
            $vid = $cselrow['video_id'];

            
            $vsel = "SELECT * FROM `videos` WHERE `link`='$vid'";
            
            $vsel2 = mysqli_query($conn, $vsel);
            $vselrow = mysqli_fetch_assoc($vsel2);
            $video_name = $vselrow['name'];
            $video_description = $vselrow['caption'];
            $link = $vselrow['link'];
            $ext = $vselrow['ext'];
            $status = $vselrow['status'];

            
            $check = "SELECT * FROM  completion_table WHERE joiner_id = '$joiner_id'  AND course_id = '$cid' AND video_id ='$link'";
            $chres = mysqli_query($conn,$check);
            while($chrow = mysqli_fetch_assoc($chres)){
                $status = $chrow['status'];
            }
            if($status == 1){
                $status = "<p class='btn btn-danger'>COMPLETED</p>";
            }
            else{
                $status = "<a href='course_view_back?u=$tit2&t=$type&cid=$cid&joid=$joiner_id&vid=$link'><button class='btn btn-success'>MARK AS COMPLETED</button></a>";
            }
            
?>
<div class="maindiv">
        <h1><?php echo "Video:"." ".$video_name; ?></h1>
        <div>
            <video id="<?php echo $vin++;?>" class='img-fluid content' preload='metadata' controlList="nodownload "controls>
            <source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
        </video>
        </div>
        <?php echo $status; ?> 
</div>
<?php

        }
    
      
    }
    

    $checkcer = "SELECT * FROM `joiner_table` WHERE `joiner_id`='$joiner_id' AND `course_id`='$cid'";
    $checkcerres = mysqli_query($conn,$checkcer);
    $checkcerrow = mysqli_num_rows($checkcerres);
    if ($checkcerrow >=1) {
        while($checkcerrow = mysqli_fetch_assoc($checkcerres))
        {
            $vidc = $checkcerrow['video_count'];
            $completion_count = $checkcerrow['completion_count'];

            if ($vidc == $completion_count) {
                ?>
                
                <center>
      <h4>
        BY CLAIMING AND SOWCASEING THIS CERTIFICATE YOU ACCEPT THAT YOU HAVE COMPLETED AND WATCHED EACH AND EVERY VIDEO IN THIS COURSE </a>
      </h4>
    </center>
                <center>

                    <a href="claim_certificate_back?u=<?php echo $tit2;?>&t=<?php echo $type?>&cid=<?php echo $cid;?>&joid=<?php echo $joiner_id?>"><button style="padding:25px!important;font-size:20px;margin-bottom:20px;" type="button" class="btn btn-success">CLAIM CERTIFICATE</button></a>
                </center>
                
                <?php
            }
        }
    }

?>


</body>
</html>