<?php
session_start();
require "config.php";


if (!empty($_SESSION["bname"])) {
    @$tit = $_SESSION["oname"];
    @$tit2 = $_SESSION["bname"];
    @$type = "business";
}
if (!empty($_SESSION["uname"])) {
    @$tit = $_SESSION["fname"];
    @$tit2 = $_SESSION["uname"];
    @$type = "individual";
}
?>
<body>


    <?php
    function chat(){
        @require "config.php";


if (!empty($_SESSION["bname"])) {
    @$tit = $_SESSION["oname"];
    @$tit2 = $_SESSION["bname"];
    @$type = "business";
    @$id = $_SESSION["id"];
}
if (!empty($_SESSION["uname"])) {
    @$tit = $_SESSION["fname"];
    @$tit2 = $_SESSION["uname"];
    @$type = "individual";
    @$id = $_SESSION["id"];
}

    $issue = $_POST["issue"];
    // echo $issue."<br>";
    $issue = mysqli_real_escape_string($conn, $issue);
    $chatid = $_POST["chatid"];
    // echo $chatid."<br>";
    $userid = $_GET["sq"];
    // echo $userid."<br>";
    $useruid = $_GET["sqt"];
    // echo $useruid."<br>";


    if($useruid == "individual") {
        # code...
        $cls = "uname";
    }
    if($userid == "business") {
        $cls = "bname";

    }
    $newname = uniqid('report chat', true) . "." . $chatid;

    $sq = $_GET['sq'];
    $sqt  = $_GET['sqt'];
    $idsel = "SELECT * FROM $useruid WHERE $cls = '$userid'";
    $idsel2 = mysqli_query($conn, $idsel);
    $idsel3 = mysqli_fetch_assoc($idsel2);
    $uid = $idsel3["id"];

    $rpins = "INSERT INTO report (report_id,content_id, report_type, reporter_id, reporter_type, user_id,user_type,message) VALUES ('$newname','$chatid','chat','$id','$useruid','$uid','$useruid','$issue')";
    $rpins2 = mysqli_query($conn, $rpins);

    $upd = "UPDATE chat SET status = '1' WHERE chat_id = '$chatid'";
    $upd2 = mysqli_query($conn, $upd);
    $nnid= uniqid('report_notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
    $notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Report','$id','$type',' reported subbmitted for message sent by $sq')";
    $notppd2= mysqli_query($conn, $notppd); 


    ?>
    <script>
    document.location.href = "chat.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $sq; ?>&sqt=<?php echo $sqt;?>#hang";
</script>
    <?php


}

?>

<?php

function comment(){
    @require "config.php";


if (!empty($_SESSION["bname"])) {
@$tit = $_SESSION["oname"];
@$tit2 = $_SESSION["bname"];
@$type = "business";
@$id = $_SESSION["id"];
}
if (!empty($_SESSION["uname"])) {
@$tit = $_SESSION["fname"];
@$tit2 = $_SESSION["uname"];
@$type = "individual";
@$id = $_SESSION["id"];
}

$issue = $_POST["issue"];
// echo $issue."<br>";
$issue = mysqli_real_escape_string($conn, $issue);
$comid = $_POST["comid"];
// echo $chatid."<br>";
$userid = $_GET["sq"];
// echo $userid."<br>";
$useruid = $_GET["sqt"];
// echo $useruid."<br>";


if($useruid == "individual") {
    # code...
    $cls = "uname";
}
if($userid == "business") {
    $cls = "bname";

}
$newname = uniqid('report commnet', true) . "." . $comid;

$sq = $_GET['sq'];
$sqt  = $_GET['sqt'];
$idsel = "SELECT * FROM $useruid WHERE id = '$userid'";
$idsel2 = mysqli_query($conn, $idsel);
$idsel3 = mysqli_fetch_assoc($idsel2);
$uid = $idsel3["id"];

if($useruid == "individual") {
    $unm = $idsel3["uname"];

}
if($userid == "business") {
    $unm = $idsel3["bname"];

}

$rpins = "INSERT INTO report (report_id,content_id, report_type, reporter_id, reporter_type, user_id,user_type,message) VALUES ('$newname','$comid','comment','$id','$useruid','$uid','$useruid','$issue')";
$rpins2 = mysqli_query($conn, $rpins);

$upd = "UPDATE comment_table SET status = '1' WHERE comment_id = '$comid'";
$upd2 = mysqli_query($conn, $upd);
$nnid= uniqid('report_notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
$notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Report','$id','$type',' reported subbmitted for message sent by $unm')";
$notppd2= mysqli_query($conn, $notppd); 


?>
<script>
document.location.href = "videos_view?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $sq; ?>&sqt=<?php echo $sqt;?>#hang";
</script>
<?php


}

?>


<?php

function video(){
    @require "config.php";


if (!empty($_SESSION["bname"])) {
@$tit = $_SESSION["oname"];
@$tit2 = $_SESSION["bname"];
@$type = "business";
@$id = $_SESSION["id"];
}
if (!empty($_SESSION["uname"])) {
@$tit = $_SESSION["fname"];
@$tit2 = $_SESSION["uname"];
@$type = "individual";
@$id = $_SESSION["id"];
}

$issue = $_POST["issue"];
// echo $issue."<br>";
$issue = mysqli_real_escape_string($conn, $issue);
$link = $_POST["link"];
// echo $chatid."<br>";
$userid = $_GET["sq"];
// echo $userid."<br>";
$useruid = $_GET["sqt"];
// echo $useruid."<br>";


if($useruid == "individual") {
    # code...
    $cls = "uname";
}
if($userid == "business") {
    $cls = "bname";

}
$newname = uniqid('report commnet', true) . "." . $link;

$sq = $_GET['sq'];
$sqt  = $_GET['sqt'];
$idsel = "SELECT * FROM $useruid WHERE id = '$userid'";
$idsel2 = mysqli_query($conn, $idsel);
$idsel3 = mysqli_fetch_assoc($idsel2);
$uid = $idsel3["id"];

if($useruid == "individual") {
    $unm = $idsel3["uname"];

}
if($userid == "business") {
    $unm = $idsel3["bname"];

}

$rpins = "INSERT INTO report (report_id,content_id, report_type, reporter_id, reporter_type, user_id,user_type,message) VALUES ('$newname','$link','video','$id','$type','$uid','$useruid','$issue')";
$rpins2 = mysqli_query($conn, $rpins);

$upd = "UPDATE videos SET status = '1' WHERE link = '$link'";
$upd2 = mysqli_query($conn, $upd);
$nnid= uniqid('report_notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
$notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Report','$id','$type',' reported subbmitted for video posted by $unm')";
$notppd2= mysqli_query($conn, $notppd); 


?>
<script>
document.location.href = "vid_view.php?u=<?php echo $id;?>&link=<?php echo $link;?>&t=<?php echo $type;?>";
</script>
<?php


}

?>

<?php

function user(){
    @require "config.php";


if (!empty($_SESSION["bname"])) {
@$tit = $_SESSION["oname"];
@$tit2 = $_SESSION["bname"];
@$type = "business";
@$id = $_SESSION["id"];
}
if (!empty($_SESSION["uname"])) {
@$tit = $_SESSION["fname"];
@$tit2 = $_SESSION["uname"];
@$type = "individual";
@$id = $_SESSION["id"];
}

$issue = $_POST["issue"];
// echo $issue."<br>";
$issue = mysqli_real_escape_string($conn, $issue);
// $link = $_POST["link"];
// echo $chatid."<br>";
$userid = $_GET["sq"];
// echo $userid."<br>";
$useruid = $_GET["sqt"];
// echo $useruid."<br>";


if($useruid == "individual") {
    # code...
    $cls = "uname";
}
if($userid == "business") {
    $cls = "bname";

}
$newname = uniqid('report user', true) . "." . $userid;

$sq = $_GET['sq'];
$sqt  = $_GET['sqt'];
$idsel = "SELECT * FROM $useruid WHERE id = '$userid'";
$idsel2 = mysqli_query($conn, $idsel);
$idsel3 = mysqli_fetch_assoc($idsel2);
$uid = $idsel3["id"];

if($useruid == "individual") {
    $unm = $idsel3["uname"];

}
if($userid == "business") {
    $unm = $idsel3["bname"];

}

$rpins = "INSERT INTO report (report_id,content_id, report_type, reporter_id, reporter_type, user_id,user_type,message) VALUES ('$newname','N/A','user','$id','$type','$uid','$useruid','$issue')";
$rpins2 = mysqli_query($conn, $rpins);

$upd = "UPDATE $useruid SET status = '1' WHERE id = '$userid'";

$upd2 = mysqli_query($conn, $upd);
$nnid= uniqid('report_notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
$notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Report','$id','$type',' reported subbmitted against $unm')";
$notppd2= mysqli_query($conn, $notppd); 


?>
<script>
document.location.href = "profile_view.php?u=<?php echo $tit2;?>&t=<?php echo $type;?>&view=<?php echo $userid;?>&vt=<?php echo $useruid;?>&sn=";
</script>
<?php


}

?>


<?php

function course(){
    @require "config.php";


if (!empty($_SESSION["bname"])) {
@$tit = $_SESSION["oname"];
@$tit2 = $_SESSION["bname"];
@$type = "business";
@$id = $_SESSION["id"];
}
if (!empty($_SESSION["uname"])) {
@$tit = $_SESSION["fname"];
@$tit2 = $_SESSION["uname"];
@$type = "individual";
@$id = $_SESSION["id"];
}

$issue = $_POST["issue"];
// echo $issue."<br>";
$issue = mysqli_real_escape_string($conn, $issue);
$link = $_POST["link"];
// echo $chatid."<br>";
$userid = $_GET["sq"];
// echo $userid."<br>";
$useruid = $_GET["sqt"];
// echo $useruid."<br>";


if($useruid == "individual") {
    # code...
    $cls = "uname";
}
if($userid == "business") {
    $cls = "bname";

}
$newname = uniqid('report course', true) . "." . $userid;

$sq = $_GET['sq'];
$sqt  = $_GET['sqt'];
$idsel = "SELECT * FROM $useruid WHERE id = '$userid'";
$idsel2 = mysqli_query($conn, $idsel);
$idsel3 = mysqli_fetch_assoc($idsel2);
$uid = $idsel3["id"];

if($useruid == "individual") {
    $unm = $idsel3["uname"];

}
if($userid == "business") {
    $unm = $idsel3["bname"];

}

$rpins = "INSERT INTO report (report_id,content_id, report_type, reporter_id, reporter_type, user_id,user_type,message) VALUES ('$newname','$link','user','$id','$type','$uid','$useruid','$issue')";
$rpins2 = mysqli_query($conn, $rpins);

$upd = "UPDATE course SET status = '1' WHERE course_id = '$cid'";

$upd2 = mysqli_query($conn, $upd);
$nnid= uniqid('report_notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
$notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Report','$id','$type',' reported subbmitted against course uploaded by $unm')";
$notppd2= mysqli_query($conn, $notppd); 


?>
<script>
document.location.href = "view_course?u=<?php echo $tit2;?>&type=<?php echo $type;?>&cid=course6459e31732e9a1.63392133.web.devang&sn=";
</script>
<?php


}

?>


<?php 
function img(){
    @require "config.php";


if (!empty($_SESSION["bname"])) {
@$tit = $_SESSION["oname"];
@$tit2 = $_SESSION["bname"];
@$type = "business";
@$id = $_SESSION["id"];
}
if (!empty($_SESSION["uname"])) {
@$tit = $_SESSION["fname"];
@$tit2 = $_SESSION["uname"];
@$type = "individual";
@$id = $_SESSION["id"];
}

$issue = $_POST["issue"];
// echo $issue."<br>";
$issue = mysqli_real_escape_string($conn, $issue);
$link = $_POST["link"];
// echo $chatid."<br>";
$userid = $_GET["sq"];
// echo $userid."<br>";
$useruid = $_GET["sqt"];
// echo $useruid."<br>";


if($useruid == "individual") {
    # code...
    $cls = "uname";
}
if($userid == "business") {
    $cls = "bname";

}
$newname = uniqid('report commnet', true) . "." . $link;

$sq = $_GET['sq'];
$sqt  = $_GET['sqt'];
$idsel = "SELECT * FROM $useruid WHERE id = '$userid'";
$idsel2 = mysqli_query($conn, $idsel);
$idsel3 = mysqli_fetch_assoc($idsel2);
$uid = $idsel3["id"];

if($useruid == "individual") {
    $unm = $idsel3["uname"];

}
if($userid == "business") {
    $unm = $idsel3["bname"];

}

$rpins = "INSERT INTO report (report_id,content_id, report_type, reporter_id, reporter_type, user_id,user_type,message) VALUES ('$newname','$link','image','$id','$type','$uid','$useruid','$issue')";
$rpins2 = mysqli_query($conn, $rpins);

$upd = "UPDATE imgs SET status = '1' WHERE link = '$link'";
$upd2 = mysqli_query($conn, $upd);
$nnid= uniqid('report_notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
$notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Report','$id','$type',' reported subbmitted for image posted by $unm')";
$notppd2= mysqli_query($conn, $notppd); 


?>
<script>
document.location.href = "img_view.php?u=<?php echo $id;?>&link=<?php echo $link;?>&t=<?php echo $type;?>";
</script>
<?php


}


?>

<?php

    if($_GET['rep'] == "chat")
    {
        chat();
    }
    else if($_GET['rep'] == "comment")
    {
        comment();
    }

    else if($_GET['rep'] == "video")
    {
        video();
    }
   else if($_GET['rep'] == "user")
    {
        user();
    }
    else if($_GET['rep'] == "course")
    {
        course();
    }

    else if($_GET['rep'] == "img")
    {
        img();
    }


    
   ?>