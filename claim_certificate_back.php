
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
   $joid = $_GET['joid'];

   $cerval = "SELECT * FROM `certificate` WHERE `joiner_id`='$joid' and `course_id`='$cid'";
    $cerval2 = mysqli_query($conn, $cerval);
    $cerval3 = mysqli_num_rows($cerval2);

    if ($cerval3 > 0) {
        echo "<script>window.location.href='claim_certificate.php?cid=$cid&joid=$joid'</script>";
    }
    else{

   $certi_id = uniqid('certificate', true) . "." . $tit2;

   $sle = "SELECT * FROM `joiner_table` WHERE `joiner_id`='$joid' and `course_id`='$cid'";
    $sle2 = mysqli_query($conn, $sle);
    $sle3 = mysqli_fetch_assoc($sle2);
    $joid = $sle3['joiner_id'];
    $cid = $sle3['course_id'];
    $juname = $sle3['joiner_uname'];
    $joiner_type = $sle3['joiner_type'];

   $sleun = "SELECT * FROM $joiner_type where id = '$juname'";
    $sleun2 = mysqli_query($conn, $sleun);
    $sleun3 = mysqli_fetch_assoc($sleun2);
    if ($joiner_type == "individual") {
        $uname = $sleun3['uname'];
    }
    $fname = $sleun3['fname'];
    $lname = $sleun3['lname'];
    $email = $sleun3['email'];
    $phone = $sleun3['phone'];


    $cins = "INSERT INTO `certificate`(`certificate_id`, `joiner_id`, `course_id`,`status`) VALUES ('$certi_id','$joid','$cid','0')";
    $cins2 = mysqli_query($conn, $cins);


    $upd = "UPDATE `joiner_table` SET `certificate_id`='$certi_id' WHERE `joiner_id`='$joid' and `course_id`='$cid'";
    $upd2 = mysqli_query($conn, $upd);


    $upd3 = "UPDATE `individual` SET `certificate`=`certificate`+1 WHERE `id`='$juname'";
    $upd4 = mysqli_query($conn, $upd3);

    header("location:claim_certificate.php?cid=$cid&joid=$joid");
}
?>