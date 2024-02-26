<?php
    session_start();
    @require 'config.php';
   
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
$che3 = mysqli_num_rows($che2);
if ($che3 == 0) {
    $cid = $_GET['cid'];
    


    $joiner = uniqid('joiner', true) . "." . $tit2;


    $stmt = "select * from course where course_id = '$cid'";
    
    $result = mysqli_query($GLOBALS["conn"], $stmt);
    $row = mysqli_fetch_assoc($result);
    $couname = $row["course_name"];
    $course_description = $row["course_description"];
    $uploader = $row['uploader'];
    $uploader_type = $row['uploader_type'];
    $no_of_videos = $row['no_of_videos']; 
    

    

    $ins = "INSERT INTO `joiner_table`( `joiner_id`, `course_id`, `joiner_uname`, `joiner_type`,`uploader_uname`,`uploader_type`,`video_count`,`completion_count`) VALUES ('$joiner','$cid','$id','$type','$uploader','$uploader_type','$no_of_videos','0')";
    $res = mysqli_query($conn, $ins);

    $upd = "UPDATE `course` SET `no_of_joiners`= no_of_joiners + 1 WHERE course_id = '$cid'";
    $res2 = mysqli_query($conn, $upd);

    $nnid= uniqid('notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
    $notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Course Joined','$uploader','$uploader_type','$tit2 Has Joined Your Course')";
    $notppd2= mysqli_query($conn, $notppd); 

    
    
    header("Location: joined_course?u=$tit2&t=$type&cid=$cid&mes=" . urlencode("Course Joined Successfully"));
} else {
    header("Location: search_course?u=$tit2&t=$type&cid=$cid&mes=" . urlencode("You have already joined this course"));
}
    ?>