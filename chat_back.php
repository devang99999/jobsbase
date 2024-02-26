<?php
require_once 'config.php';
session_start();
if ($_SESSION['loggedin'] != true) {
    header("location: login.php");
  }
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
$sq = $_GET['sq'];
if ($_POST['message'] == "") {
    ?>

   <script>
    document.location.href = "chat.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $sq; ?>&sqt=<?php echo $sqt;?>#hang";
</script>
    
    <?php
}



$bsuids = "SELECT * FROM business WHERE bname = '$sq'";
$bsuids2 = mysqli_query($conn, $bsuids);
$bsuids3 = mysqli_fetch_assoc($bsuids2);
$bsuids4 = mysqli_num_rows($bsuids2);
if ($bsuids4 > 0) {
    $ruid = $bsuids3['uid_type'];
    $sqid = $bsuids3['id'];
}
$isuids = "SELECT * FROM individual WHERE uname = '$sq'";
$isuids2 = mysqli_query($conn, $isuids);
$isuids3 = mysqli_fetch_assoc($isuids2);
$isuids4 = mysqli_num_rows($isuids2);
if ($isuids4 > 0) {
    $ruid = $isuids3['uid_type'];
    $sqid = $isuids3['id'];
}


$cids = "SELECT * FROM message_table WHERE user_1 = '$tit2' AND user_2 = '$sq' OR user_1 = '$sq' AND user_2 = '$tit2'";
$cids2 = mysqli_query($conn, $cids);
$cids3 = mysqli_fetch_assoc($cids2);
$cids4 = mysqli_num_rows($cids2);
if ($cids4 > 0) {
    $cid = $cids3['contact_id'];
} else {
    $cid = "";
}
echo $cid;
echo $sq;
$chatid = uniqid('chatid', true) . "." . $tit2 . " " . $sq . " " . date("Y-m-d H:i:s");
echo $chatid;
echo $_POST['message'];
// $message =  $_POST['message'];
$message = mysqli_real_escape_string($conn, $_POST['message']);
$slech   = "SELECT * FROM chat WHERE sender = '$tit2' AND receiver = '$sq' OR sender = '$sq' AND receiver = '$tit2'";
$slech2 = mysqli_query($conn, $slech);
if (mysqli_num_rows($slech2) > 0) {
    $chins = "INSERT INTO chat(chat_id,contact_id,sender, receiver, message,suid_type,ruid_type,status) VALUES ('$chatid','$cid' ,'$tit2', '$sq', '$message','$type','$ruid','0')";
    $chins2 = mysqli_query($conn, $chins);
    if ($chins2) {
        $nnid= uniqid('notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
            $notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','message','$sqid','$ruid','$tit2 sent you a message')";
            $notppd2= mysqli_query($conn, $notppd); 
        echo "message sent";
        header("location: chat.php?u=$tit2&t=$type&sq=$sq&sqt=$_GET[sqt]#hang");
    } else {
        echo "message not sent";
    }
} else {
    if ($message != "") {


        $chins = "INSERT INTO chat (chat_id,contact_id,sender, receiver, message,suid_type,ruid_type,status) VALUES ('$chatid','$cid' ,'$tit2', '$sq', '$message','$type','$ruid','0')";
        $chins2 = mysqli_query($conn, $chins);
        // $chins2 = mysqli_query($conn, $chins);
        if ($chins2) {
            $nnid= uniqid('notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
            $notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','message','$sqid','$ruid','$tit2 sent you a message')";
            $notppd2= mysqli_query($conn, $notppd); 
            echo "message sent";
            header("location: chat.php?u=$tit2&t=$type&sq=$sq&sqt=$_GET[sqt]#hang");
        } else {
            echo "message not sent";
        }
//     } else {
// ?>
    <script>
            window.location.href = 'message.php?u=web.devang&t=individual&sq=';
//         </script>

<?php
    }
}

?>