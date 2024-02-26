<?php
require 'config.php';

$title = $_GET['link'];
$titl = "SELECT * FROM videos WHERE link = '$title'";
$titl2 = mysqli_query($conn, $titl);
$titl3 = mysqli_fetch_assoc($titl2);
$titl4 = $titl3['name'];
$slink = $titl3['link'];
$uname = $titl3['uname'];
session_start();
//   require 'config.php';
require 'boot.php';
require 'nav.php';

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

$link =  $_GET['link'];
$liker = $_GET['u'];
// echo $liker;
$ac = $_GET['ac'];
// echo $ac;

// echo $link;
$sql = "SELECT * FROM videos WHERE link = '$link'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_assoc($result);
$like = $result2['likes'];
$uname = $result2['uname'];
$uuid = $result2['uid_type'];
// echo $like . "<br>";

// $row = mysqli_fetch_assoc($upd2);
// $ulike= $row['likes'];
// echo $likeid;



$likeid = uniqid('likeid', true) . "." . $liker . " " . date("Y-m-d H:i:s");
// echo $likeid;
$image_id = mysqli_real_escape_string($conn, $link);
// echo $image_id;
// Check if user has already liked the image
if($_GET['ac'] == 'like'){
   
$query = "SELECT * FROM like_table WHERE liker = '$liker' AND content_link = '$link'";
// echo $query;
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // User has already liked the image
    // echo "You have already liked this image.";
?>
    <script>
        window.location.href = 'vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual';
    </script>
<?php
} else {
    // Increment the number of likes for this image
    $upd = "UPDATE videos SET likes = likes + 1 WHERE link = '$link'";
    $upd2 = mysqli_query($conn, $upd);
    $nnid= uniqid('notification', true) . "." . $sq . " " . $tit2 . " " . date("Y-m-d H:i:s");
    $notppd= "INSERT INTO notifications (notification_id,notification_type,user_id,user_type,message) VALUES ('$nnid','Like','$uname','$uuid','$tit2 Liked your video')";
    $notppd2= mysqli_query($conn, $notppd); 
    // Insert a record into the likes table to record the user's like
    $query = "INSERT INTO like_table (like_id,content_link, liker,content_poster) VALUES ('$likeid', '$link', '$liker','$uname')";
    mysqli_query($conn, $query);
    // echo "Thanks for liking this image!";
?>
    <script>
        window.location.href = 'vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual';
    </script>
<?php

}
}

if($_GET['ac'] == "unlike")
{
    $query = "DELETE FROM like_table WHERE liker = '$liker' AND content_link = '$link'";
    mysqli_query($conn, $query);
    $upd = "UPDATE videos SET likes = likes - 1 WHERE link = '$link'";
    $upd2 = mysqli_query($conn, $upd);
    ?>
    <script>
        window.location.href = 'vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual';
    </script>
    <?php
}
else{
    ?>
    <script>
        window.location.href = 'vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual';
    </script>
    <?php
}



// }


// "create a like and unlike feature in php and mysql?"








?>