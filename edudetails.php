<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>EDUCATION DETAILS</title>
</head>

<body>
    <?php
    session_start();
    @require 'config.php';
    require 'boot.php';
    require 'nav.php';

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
$view = $_GET['view'];
$vt = $_GET['vt'];
    @$edid = $_GET['edid'];
    $stmt = "SELECT * from education WHERE user_id  = '$view' AND user_type = '$vt' OR education_id = '$edid'";
    
    $result = mysqli_query($GLOBALS["conn"], $stmt);
    $num = mysqli_num_rows($result);

    if ($num == 0) {

        echo "<center><h1 style='margin-top:150px;'>No educationn details  Found</h1></center>";
    } else if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $user_id = $row["user_id"];
            $education_id = $row["education_id"];
            $user_type = $row["user_type"];
            $cname = $row['college_name'];
            $dname = $row['degree_name'];
            $cgpa = $row['cgpa'];
            $cdate = $row['completion_date'];
            $ccdate = strtotime($cdate);
            $cccdate = date("d/m/Y", $ccdate);
            // $cdesc  = $row['description'];
            $edid = $row['education_id'];



            $cosatsle = "SELECT * FROM $user_type WHERE id = '$user_id'";
            $cosatres = mysqli_query($conn, $cosatsle);
            while ($cosatrow = mysqli_fetch_assoc($cosatres)) {
                $uname = $cosatrow['uname'];


                $avlink = $cosatrow['avatarlink'];
                $avatarlink = "<img src='$avlink' style='width:50px;height:50px;border-radius:50px;'>";
                
            }
    ?>
            <div style="width:50%;margin:auto;margin-top:150px" class="bind">
                <div class="card">
                    <h5 class="card-header">EDUCATION DETAILS </h5>
                    <div class="card-body">
                        <h5 class="card-title">EDUCATION DETAILS OF <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&view=<?php echo $user_id ?>&vt=<?php echo $user_type; ?>&sn=">
                                <?php
                                echo $uname . " " . $avatarlink;
                                ?>
                            </a>
                        </h5>
                        <p class="card-text">COLLEGE NAME:<b> <?php echo $cname; ?></b></p>
                        <p class="card-text">DEGREE:<b> <?php echo $dname; ?></b></p>
                        <p class="card-text">CGPA OUT OF 10:<b> <?php echo $cgpa; ?></b></p>
                        <p class="card-text"> COMPLETION DATE :<b> <?php echo $cccdate; ?></b></p>
                        <!-- <p class="card-text">Course Description :<b> <?php echo $cdesc; ?></b></p> -->
                        <p class="card-text">EDUCATION_ID :<b> <?php echo $edid; ?></b></p>
                        <?php
                        
                        if($id == $user_id && $type == $user_type){
                            ?>
                            <a class="btn btn-danger" href="edudetails?u=<?php echo $tit2;?>&t=<?php echo $type;?>&view=<?php echo $view?>&vt=<?php echo $vt;?>&sn=ed&eid=<?php echo $edid;?>">DELETE</a>
                            <a class="btn btn-success" style="color:#fff;" href="education?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">ADD EDUCATION</a></p>
                            <br>
                            
                            <?php
                        }
                        
                        ?>
                        <a class="btn btn-primary" href="profile_view?u=<?php echo $id; ?>&t=<?php echo $type; ?>&view=<?php echo $user_id; ?>&vt=<?php echo $user_type; ?>&sn=">GO BACK TO PROFILE</a>
                    </div>
                </div>
            </div>

    <?php
        }
    }





if(!empty($_GET['sn'])){

    @$edid = $_GET['eid'];

    $edel = "DELETE FROM education WHERE education_id = '$edid'";
    $edelres = mysqli_query($conn,$edel);
    ?>
    
    <script>
    window.location.href = "profile_view?u=<?php echo $id; ?>&t=<?php echo $type; ?>&view=<?php echo $view; ?>&vt=<?php echo $vt; ?>&sn=";
    </script>
    
    
    <?php
}
    ?>





</body>

</html>