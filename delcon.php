<?php
require 'config.php';
session_start();
//   require 'config.php';
require 'boot.php';
// require 'nav.php';

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




if($_GET['ac'] == "delvid")
{
  $link = $_GET['link'];

if (file_exists($link)) {
  if (unlink($link)) {
    echo 'File deleted successfully.';
  } else {
    echo 'Unable to delete the file.';
  }
} else {
  echo 'File does not exist.';
}

    $query = "DELETE FROM videos WHERE link = '$link'";
    mysqli_query($conn, $query);
    
    ?>
    <script>
        window.location.href = 'profile.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&t=individual&sn=videos#cont';
    </script>
    <?php
}
else if($_GET['ac'] == "delimg")
{

  $link = $_GET['link'];
    if (file_exists($link)) {
    if (unlink($link)) {
      echo 'File deleted successfully.';
    } else {
      echo 'Unable to delete the file.';
    }
  } else {
    echo 'File does not exist.';
  }
    $query = "DELETE FROM imgs WHERE link = '$link'";
    mysqli_query($conn, $query);
    ?>
    <script>
        window.location.href = 'profile.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&t=individual&sn=images#cont';
    </script>
    <?php
}
else if($_GET['ac'] == "delcom_i")
{

  $link = $_GET['link'];
    $query = "DELETE FROM comment_table WHERE content_link = '$link'";
    mysqli_query($conn, $query);
    $upd = "UPDATE imgs SET comments = comments - 1 WHERE link = '$link'";
    $upd2 = mysqli_query($conn, $upd);
    
    ?>
    <script>
        window.location.href = 'img_view.php?u=<?php echo $tit2; ?>&link=<?php echo $$link; ?>&t=individial';
    </script>
    <?php
}
else if($_GET['ac'] == "delcom_v")
{
  $link = $_GET['link'];
  $coid = $_GET['comid'];
    $query = "DELETE FROM comment_table WHERE content_link = '$link' AND comment_id = '$coid'";
    mysqli_query($conn, $query);
    $upd = "UPDATE videos SET comments = comments - 1 WHERE link = '$link'";
    $upd2 = mysqli_query($conn, $upd);
    ?>
    <script>
       window.location.href = 'vid_view.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&t=individial';
    </script>
    <?php
}


// }


// "create a like and unlike feature in php and mysql?"








?>