<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>NOTIFICATIONNS</title>
</head>
<body>
    
<?php
session_start();
require 'config.php';
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
// Connect to the database

// Function to get unread notifications for a user
function getUnreadNotifications($id)
{
    if (!empty($_SESSION['bname'])) {
        @$tit = $_SESSION['oname'];
        @$tit2 = $_SESSION['bname'];
        @$type = "business";
    }
    if (!empty($_SESSION['uname'])) {
        @$tit = $_SESSION['fname'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
        $id = $_SESSION['id'];
    }
    global $conn;

    $sql = "SELECT * FROM notifications WHERE user_id = '$id' AND user_type = '$type' order by datetime desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
?>
<div class="bord">
        <center>

            <div style="width :40%;margin:auto;border:2px solid dodgerblue;margin-top:150px;">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $message = $row['message'];
                    $notification_id = $row['notification_id'];
                    $date = $row['datetime'];
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    $fdate = $date->format('d-m-y H:i:s');

                ?>

                    <div style="padding-top:10px!important;" class="card">

                        <div class="card-body">
                            <h5 style="margin-top:10px;" class="card-title"><?php
                                                                            echo $message; ?></h5>
                            <p style="text-align:right"><?php echo $fdate; ?></p>


                        </div>
                    </div>

                <?php
                    global $conn;
                    $sql = "UPDATE notifications SET is_read = 1 WHERE notification_id = '$notification_id'";
                    mysqli_query($conn, $sql);
                }
                ?>

            </div>
        </center>
        </div>
<?php

    }

    return $message;

    // echo $notifications;

}

// Function to mark a notification as read



// Example usage
$user_id = $_SESSION['id'];

// Get unread notifications
$unreadNotifications = getUnreadNotifications($user_id);
require 'footer.php' ;
?>