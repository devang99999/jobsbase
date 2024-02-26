<?php
require 'config.php';

@$title = $_GET['link'];
@$titl = "SELECT * FROM videos WHERE link = '$title'";
@$titl2 = mysqli_query($conn, $titl);
@$titl3 = mysqli_fetch_assoc($titl2);
@$titl4 = $titl3['name'];
@$slink = $titl3['link'];
@$uname = $titl3['uname'];
session_start();
//   require 'config.php';
require 'boot.php';
require 'nav.php';
if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$type = "business";
    @$id = $_SESSION['id'];
}
if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id = $_SESSION['id'];
}
function video()
{
    @$title = $_GET['link'];
    @$titl = "SELECT * FROM videos WHERE link = '$title'";
    @$titl2 = mysqli_query($GLOBALS['conn'], $titl);
    @$titl3 = mysqli_fetch_assoc($titl2);
    @$titl4 = $titl3['name'];
    @$slink = $titl3['link'];
    @$uname = $titl3['uname'];
    @$uuid = $titl3['uid_type'];
    if (!empty($_SESSION['bname'])) {
        @$tit = $_SESSION['oname'];
        @$tit2 = $_SESSION['bname'];
        @$type = "business";
        @$av = "bname";
        @$id = $_SESSION['id'];
    }
    if (!empty($_SESSION['uname'])) {
        @$tit = $_SESSION['fname'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
        @$av = "uname";
        @$id = $_SESSION['id'];
    }
    # code...

    $link =  $_GET['link'];
    $commenter = $id;
    $commenter_type = $type;
    $comment = $_POST["comment"];
    $ac = $_GET['ac'];

    $avs = "SELECT avatarlink FROM $type WHERE $av = '$tit2'";
    
    // echo $avs;
    $avs2 = mysqli_query($GLOBALS['conn'], $avs);
    $avs3 = mysqli_fetch_assoc($avs2);
    $avatar = $avs3['avatarlink'];




    $sql = "SELECT * FROM videos WHERE link = '$link'";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $result2 = mysqli_fetch_assoc($result);
    $like = $result2['likes'];



    $commentid = uniqid('commentid', true) . "." . $commenter . " " . date("Y-m-d H:i:s");
    // echo $commentid;
    $image_id = mysqli_real_escape_string($GLOBALS['conn'], $link);
    // echo $image_id;
    // Check if user has already liked the image
    if ($_GET['ac'] == 'comment') {

        $query = "SELECT * FROM comment_table WHERE commenter = '$commenter' AND content_link = '$link'";
        //       echo $query;
        $result = mysqli_query($GLOBALS['conn'], $query);


        $upd = "UPDATE videos SET comments = comments + 1 WHERE link = '$link'";
        $upd2 = mysqli_query($GLOBALS['conn'], $upd);
        // Insert a record into the likes table to record the user's like
        
        $ins = "INSERT INTO comment_table (comment_id,comment, commenter_type, content_link, commenter, cavatarlink, content_poster,content_poster_type,status) VALUES ('$commentid','$comment','$commenter_type','$link','$commenter','$avatar','$uname','$uuid','0')";
        mysqli_query($GLOBALS['conn'], $ins);
        // echo "Thanks for liking this image!";


?>
        <script>
            window.location.href = 'vid_view.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&t=<?php echo $type; ?>';
        </script>
<?php











    }
}

?>
<?php
function image()
{
    @$title = $_GET['link'];
    @$titl = "SELECT * FROM imgs WHERE link = '$title'";
    @$titl2 = mysqli_query($GLOBALS['conn'], $titl);
    @$titl3 = mysqli_fetch_assoc($titl2);
    @$titl4 = $titl3['name'];
    @$slink = $titl3['link'];
    @$uname = $titl3['uname'];
    @$uuid = $titl3['uid_type'];
    if (!empty($_SESSION['bname'])) {
        @$tit = $_SESSION['oname'];
        @$tit2 = $_SESSION['bname'];
        @$type = "business";
        @$av = "bname";
        @$id = $_SESSION['id'];
    }
    if (!empty($_SESSION['uname'])) {
        @$tit = $_SESSION['fname'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
        @$av = "uname";
        @$id = $_SESSION['id'];
    }
    # code...

    $link =  $_GET['link'];
    $commenter = $id;
    $commenter_type = $type;
    $comment = $_POST["comment"];
    $ac = $_GET['ac'];

    $avs = "SELECT avatarlink FROM $type WHERE $av = '$tit2'";
    
    // echo $avs;
    $avs2 = mysqli_query($GLOBALS['conn'], $avs);
    $avs3 = mysqli_fetch_assoc($avs2);
    $avatar = $avs3['avatarlink'];




    $sql = "SELECT * FROM imgs WHERE link = '$link'";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $result2 = mysqli_fetch_assoc($result);
    $like = $result2['likes'];



    $commentid = uniqid('commentid', true) . "." . $commenter . " " . date("Y-m-d H:i:s");
    // echo $commentid;
    $image_id = mysqli_real_escape_string($GLOBALS['conn'], $link);
    // echo $image_id;
    // Check if user has already liked the image
    if ($_GET['ac'] == 'comment') {

        $query = "SELECT * FROM comment_table WHERE commenter = '$commenter' AND content_link = '$link'";
        //       echo $query;
        $result = mysqli_query($GLOBALS['conn'], $query);


        $upd = "UPDATE videos SET comments = comments + 1 WHERE link = '$link'";
        $upd2 = mysqli_query($GLOBALS['conn'], $upd);
        // Insert a record into the likes table to record the user's like
        
        
        $ins = "INSERT INTO comment_table (comment_id,comment, commenter_type, content_link, commenter, cavatarlink, content_poster,content_poster_type,status) VALUES ('$commentid','$comment','$commenter_type','$link','$commenter','$avatar','$uname','$uuid','0')";
        mysqli_query($GLOBALS['conn'], $ins);
        // echo "Thanks for liking this image!";


?>
        <script>
            window.location.href = 'img_view.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&t=<?php echo $type; ?>';
        </script>
<?php











    }
}

?>
<?php
if ($_GET['ct'] == "video") {
    video();
}
if ($_GET['ct'] == "image") {
    image();
}

?>