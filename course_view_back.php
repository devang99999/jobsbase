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

    $vid = $_GET['vid'];
    $cid = $_GET['cid'];
    $joid = $_GET['joid'];

 $check = "SELECT * FROM  completion_table WHERE joiner_id = '$joid'  AND course_id = '$cid' AND video_id ='$vid'";
 $chres = mysqli_query($conn,$check);
 $checknum  = mysqli_num_rows($chres);
 if ($checknum >0) {
    header("location:course_view.php?u=$tit2&t=$type&cid=$cid");
 }
 else{

    $upty ="SELECT * FROM course WHERE course_id ='$cid'";    
    $upres = mysqli_query($conn,$upty);
    $uptyrow=mysqli_fetch_assoc($upres);

    $upid = $uptyrow['uploader'];
    $uploader_type = $uptyrow['uploader_type'];

    $upunm = "SELECT * FROM $uploader_type WHERE id = '$upid'";    
    $upunmres = mysqli_query($conn,$upunm);
    $upunmrow = mysqli_fetch_assoc($upunmres);

  
        $uploader_uname = $upunmrow['id'];
   

    $ins = "INSERT INTO `completion_table`( `joiner_id`, `course_id`,`video_id` ,`joiner_uname`, `joiner_type`,`uploader_uname`,`uploader_type`,`status`) VALUES ('$joid','$cid','$vid','$id','$type','$uploader_uname','$uploader_type','1')";
    $res = mysqli_query($conn, $ins);

    $upd = "UPDATE `joiner_table` SET `completion_count`= completion_count + 1 WHERE course_id = '$cid' AND joiner_id = '$joid'";
    $res2 = mysqli_query($conn, $upd); 

    header("location:course_view.php?u=$tit2&t=$type&cid=$cid");

 }

   ?>