<?php 
require 'config.php';
require 'boot.php';
session_start();

if (!empty($_SESSION['bname'])) {
    $tit = $_SESSION['oname'];
    $tit2 = $_SESSION['bname'];
    $type = "business";
}
if (!empty($_SESSION['uname'])) {
    $tit = $_SESSION['fname'];
    $tit2 = $_SESSION['uname'];
    $type = "individual";
}

if(isset($_POST['user'])){
    $sq = mysqli_real_escape_string($conn, $_POST['user']);
    // $query =  "SELECT * FROM `videos` WHERE `name` LIKE '%$sq%' OR `uname` LIKE '%$sq%' OR `caption` LIKE '%$sq%' OR `link` LIKE '%$sq%' OR `uid_type` LIKE '%$sq%' ";
    $query =  "SELECT * FROM `individual` WHERE `uname` LIKE '%$sq%' OR `uname` LIKE '%$sq%' OR `fname` LIKE '%$sq%' OR `course` LIKE '%$sq%' OR `uid_type` LIKE '%$sq%' ";

    $result = mysqli_query($conn, $query);
    if ($result) {
        while($row = mysqli_fetch_assoc($result)){
            $name = htmlspecialchars($row['name']);
            $uname = htmlspecialchars($row['uname']);
            $caption = htmlspecialchars($row['caption']);
            $link = htmlspecialchars($row['link']);
            $uid_type = htmlspecialchars($row['uid_type']);
            $uname = htmlspecialchars($row['uname']);
            echo "$name $uname $caption $link $uid_type";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
