    <?php

    session_start();
    include 'boot.php';
    include 'nav.php';
    require_once 'config.php';
    if (!empty($_SESSION['uname'])) {

        $uname = $_SESSION['uname'];
        $uid_type = "individual";
        // $update = "UPDATE videos SET avatarlink = (SELECT avatarlink FROM individual WHERE individual.uname = videos.uname) WHERE videos.uname = '$uname'";
        $update = "SELECT avatarlink FROM individual WHERE uname = '$uname'";
        $result = mysqli_query($conn, $update);
        // $select = "SELECT avatarlink FROM videos WHERE uname = '$uname'";
        // $result = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($result);
        @$uploader_avatar = $row['avatarlink'];
        // echo $uploader_avatar;

    }
    if (!empty($_SESSION['bname'])) {
        $uname = $_SESSION['bname'];
        $uid_type = "Business";

        $update = "SELECT avatarlink FROM business WHERE bname ='$uname'";
        $result = mysqli_query($conn, $update);

        $row = mysqli_fetch_assoc($result);
        $uploader_avatar = $row['avatarlink'];
    }
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

    $likes = 0;
    $comments = 0;
    $caption = $_POST['caption'];

   if($_POST['caption'] == ""){
        $caption = "No caption";
    }
    if($_POST['title'] == ""){
       $tilerr="title can not be empty";
       ?>
       <script>
              window.location.href = 'upload.php?u=<?php echo $tit2; ?>&t=<?php echo $type?>&err=<?php echo $tilerr?>';
       </script>
       <?php
    }
    else{
        $title = $_POST['title'];
    }

    $name = $_FILES['file']['name'];
    // echo $name;
    $tmp_name = $_FILES['file']['tmp_name'];
    $position = strpos($name, ".");
    

    // $fileextension= substr($name, $position + 1);
    $fileextension = pathinfo($name, PATHINFO_EXTENSION);
    // echo $fileextension;
    $fileextension = strtolower($fileextension);
    // echo $fileextension;
    // echo $tmp_name;


    if (isset($name)) {

        $newname = uniqid('project', true) . "." . $fileextension;
        $path = 'uploads/';
        $link = $path . $newname;
        if (empty($name)) {
            echo "Please choose a file";
        } else if (!empty($name)) {
            if (($fileextension == "mp4") && ($fileextension == "mkv") && ($fileextension == "jpg")  && ($fileextension == "jpeg") && ($fileextension == "jpg") && ($fileextension == "png") && ($fileextension == "gif")) 
            {
                echo "The file extension must be .mp4, .jpg, or .webm in order to be uploaded";
            } 
            else if (($fileextension == "mp4") || ($fileextension == "mkv") || ($fileextension == "jpg")  || ($fileextension == "jpeg") || ($fileextension == "jpg") || ($fileextension == "png") || ($fileextension == "gif")) {
                if (move_uploaded_file($tmp_name, $link))
                 {
                    // echo 'Uploaded!';
    ?>
                    <script>
                        window.location.href = 'videos_view.php?u=<?php echo $tit2; ?>&t=individual';
                    </script>
        <?php
                }
            }
        }
    }

    if (($fileextension == "jpeg") || ($fileextension == "jpg") || ($fileextension == "png")) {

        $sql = "INSERT INTO imgs (link,avatarlink, name,ext,uname,uid_type,caption,likes,comments,status) VALUES ('$link','$uploader_avatar','$name','$fileextension','$id','$uid_type','$caption','$likes','$comments','0')";
        $stmt = mysqli_query($conn, $sql);


        ?>
        <script>
            window.location.href = 'videos_view.php?u=<?php echo $tit2; ?>&t=individual';
        </script>
    <?php
    } elseif (($fileextension == "mp4") || ($fileextension == "mkv")) {
        
        $sql = "INSERT INTO videos (link,avatarlink, name,ext,uname,uid_type,caption,likes,comments,status) VALUES ('$link','$uploader_avatar','$title','$fileextension','$id','$uid_type','$caption','$likes','$comments','0')";
        $stmt = mysqli_query($conn, $sql);
        // echo $uploader_avatar;
    ?>
        <script>
            window.location.href = 'videos_view.php?u=<?php echo $tit2; ?>&t=individual';
        </script>
    <?php
    }

    //  echo $name . $fileextension . $tmp_name ."<br>". $link;
    ?>
    <br>