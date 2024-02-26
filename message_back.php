<?php
require_once 'config.php';
session_start();
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
require 'boot.php';
require 'nav.php';



$sq = $_GET['sq'];
$sqt = $_GET['sqt'];



$uidfi = "SELECT * FROM individual WHERE uname = '$tit2'";
$uidfi2 = mysqli_query($conn, $uidfi);
$uidiic = mysqli_num_rows($uidfi2);
$uidfi3 = mysqli_fetch_assoc($uidfi2);
if ($uidiic > 0) {
    $tit2_uid = $uidfi3['uid_type'];
} else {
    $uidfi4 = "";
}
$uidfb = "SELECT * FROM business WHERE bname = '$tit2'";
$uidfb2 = mysqli_query($conn, $uidfb);
$uidfb3 = mysqli_fetch_assoc($uidfb2);
$uidbc = mysqli_num_rows($uidfb2);
if ($uidbc > 0) {
    $tit2_uid = $uidfb3['uid_type'];
} else {
    $uidf4 = "";
}
// echo $tit2_uid;

$uidfi = "SELECT * FROM individual WHERE uname = '$sq'";
$uidfi2 = mysqli_query($conn, $uidfi);
$uidiic = mysqli_num_rows($uidfi2);
$uidfi3 = mysqli_fetch_assoc($uidfi2);
if ($uidiic > 0) {
    $sq_uid = $uidfi3['uid_type'];
} else {
    $uidfi4 = "";
}
$uidfb = "SELECT * FROM business WHERE bname = '$sq'";
$uidfb2 = mysqli_query($conn, $uidfb);
$uidfb3 = mysqli_fetch_assoc($uidfb2);
$uidbc = mysqli_num_rows($uidfb2);
if ($uidbc > 0) {
    $sq_uid = $uidfb3['uid_type'];
} else {
    $uidf4 = "";
}
// echo $sq_uid;




// echo $sq;
$messageid = uniqid('contactid', true) . "." . $tit2 . " " . $sq . " " . date("Y-m-d H:i:s");
// echo $messageid;
// echo $_POST['message'];
// $message = $_POST['message'];
$slech   = "SELECT * FROM message_table WHERE user_1 = '$tit2' AND user_2 = '$sq' OR user_1 = '$sq' AND user_2 = '$tit2'";
// echo $slech;
$slech2 = mysqli_query($conn, $slech);
if (mysqli_num_rows($slech2) > 0) {
    // $chins = "INSERT INTO message_table (contact_id, user_1,user_1_uid,user_2,user_2_uid) VALUES ('$messageid', '$tit2','$tit2_uid', '$sq','$sq_uid')";
    // $chins2 = mysqli_query($conn, $chins);
    // if ($chins2) {
        // echo "message sent";
        ?>
        <script>
            window.location.href = 'chat.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $sq; ?>&sqt=<?php echo $sqt;?>#hang';
        </script>
    <?php
    // } else {
        // echo "message not sent";
    // }
} else {


    $chins = "INSERT INTO message_table (contact_id, user_1, user_1_uid,user_2,user_2_uid) VALUES ('$messageid', '$tit2','$tit2_uid', '$sq','$sq_uid')";
    $chins2 = mysqli_query($conn, $chins);
    if ($chins2) {
        // echo "message sent";
?>
        <script>
            window.location.href = 'chat.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $sq; ?>&sqt=<?php echo $sqt;?>#hang';
        </script>
<?php
    }
     else {
        // echo "message not sent";
    }
}
?>