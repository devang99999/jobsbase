<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>SEARCH COURSE</title>
    <style>
        body {
            font-family: 'ubuntu', sans-serif !important;
            background-color: #f5f5f5;
        }

        .maindiv {
            height: 100%;
            width: 100%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            align-content: center;
            /* padding-top: 160px; */
            padding-bottom: 100px;
            background-image: url('./imgs/bi1.jpg');
            background-size: cover;
            background-position: center;

        }
        
        .fomdiv1 {
            width: 350px;
            display: block;

        }

        .login {
            position: relative;
            top: 50%;
            width: 100%;
            display: flex;
            margin: -150px auto 0 auto;
            background: #fff;
            border-radius: 4px;
            flex-direction: column;
            flex-wrap: wrap;
            align-content: center;
            align-items: stretch;
            justify-content: center;
        }

        .legend {
            position: relative;
            width: 100%;
            display: block;
            background: #0a58ca;
            padding: 15px;
            color: #fff;
            font-size: 20px;
            text-align: center !important;
        }

        .input {
            position: relative;
            width: 90%;
            margin: 15px auto;
        }

        .input span {
            position: absolute;
            display: block;
            color: darken(#ededed, 10%);
            left: 10px;
            top: 8px;
            font-size: 20px;
        }

        .input button {
            position: absolute;
            display: block;
            color: darken(#ededed, 10%);
            left: 250px;
            top: 10px;
            font-size: 20px;
            padding: 0 0 1px 1px;
            background-color: transparent !important;
            border: 0px !important;


        }

        input {
            width: 100%;
            padding: 10px 5px 10px 40px;
            display: block;
            border: 1px solid #ededed;
            border-radius: 4px;
            transition: 0.2s ease-out;
            color: darken(#ededed, 30%);

        }

        .submit {
            width: 20% !important;
            height: 45px;
            padding: 20px;
            display: block;
            margin: 0 auto -15px auto;
            background: #fff;
            border-radius: 100%;
            border: 1px solid #0a58ca;
            color: #0a58ca;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0px 0px 0px 7px #fff;
            transition: 0.2s ease-out;
        }

        .feedback {
            position: absolute;
            bottom: -70px;
            width: 100%;
            text-align: center;
            color: #fff;
            background: #2ecc71;
            padding: 10px 0;
            font-size: 12px;
            display: none;
            opacity: 0;
        }

        .fordiv {
            width: 100%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            align-content: center;
            position: relative;
            top: 200px;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 48
        }
        
    </style>

</head>

<body>



    <?php
    @session_start();
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





    ?>

    <center style=" margin-left:auto;margin-right:auto;" class="maindiv">
        <form style="width:50%; border:1.5px solid black; margin-bottom:50px!important;background:#fff;margin-top:140px" action="search_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&st=name" method="POST">
            <div style="padding-top:20px;" class="form-outline">
                <input style="margin-top:20px;" type="search" name="sq" id="form1" class="form-control" placeholder="Search Courses" aria-label="Search" />
                <div class="input">
                    <label for="sub_category">Select a course category:</label>
                    <select required style="width:100%;" id="sub_category" onchange="dropChange()" name="sub_category">
                        <option value="0">Choose a category</option>
                        <?php
                        // Retrieve the course categories from the database
                        $sql = "SELECT * FROM course_category	 ";

                        $result = mysqli_query($conn, $sql);

                        // Generate the dropdown options
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option  value='" . $row['id'] . "'>" . $row['course_category'] . "</option>";
                            }
                        }
                        ?>
                    </select>

                </div>

            </div>
            <input style="width:20%!important;margin-bottom:20px!important;" type="submit" value="Search" class="btn btn-primary" />
        </form>
    </center>
<div class="maindiv">
    <?php

    if (isset($_POST["sq"])) {
        if ($_POST["sq"] == "") {
            $search = " ";
        } else {
            $search = $_POST["sq"];
        }


        $scs = $_POST["sub_category"];
        $stmt = "select * from course where (course_name like '%$search%' or course_category_id like '%$scs%') AND status <'2' ";
        $result = mysqli_query($GLOBALS["conn"], $stmt);
        $num = mysqli_num_rows($result);

        if ($num == 0) {

            echo "<center><h1 style='margin-top:50px;'>No Courses Found</h1></center>";
        } else if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $couname = $row["course_name"];
                $course_description = $row["course_description"];

                $cname = $row['course_name'];
                $ccatid = $row['course_category_id'];
                $cacatid = $row['course_sub_category_id'];
                $cid = $row['course_id'];
                $uploader = $row['uploader'];
                $uploader_type = $row['uploader_type'];


                $no_of_videos = $row['no_of_videos'];
                $no_of_joiners = $row['no_of_joiners'];
                $date = $row['datetime'];
                $cdate = date('Y-m-d', strtotime($date));

                $cosatsle = "SELECT * FROM course_category WHERE id = '$ccatid'";
                $cosatres = mysqli_query($conn, $cosatsle);
                while ($cosatrow = mysqli_fetch_assoc($cosatres)) {
                    $ccat = $cosatrow['course_category'];


                    $cossatsle = "SELECT * FROM course_sub_catogary WHERE id = '$cacatid'";
                    $cossatres = mysqli_query($conn, $cossatsle);
                    while ($cossatrow = mysqli_fetch_assoc($cossatres)) {
                        $cscat = $cossatrow['course_sub_category'];

                        $upsel = "SELECT * FROM $uploader_type  WHERE id = '$uploader'";
                        $upres = mysqli_query($conn, $upsel);
                        while ($upselrow = mysqli_fetch_assoc($upres)) {

                            @$un = $upselrow['uname'];
                            @$bn = $upselrow['bname'];
                            @$avl = $upselrow['avatarlink'];
                            @$avi = "<img src='$avl' style='width:40px;border-radius:50%;'>";


    ?>
                            <div style="width:100%;margin:auto;margin-top:30px" class="bind ">
                                <div class="card " style="width: 50%; margin:auto;margin-top:30px;">
                                    <h5 class="card-header">Course Name <b><?php echo $cname; ?></b></h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Uploaded By <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&view=<?php if ($uploader_type == "individual") {
                                                                                                                                                            echo $un;
                                                                                                                                                        } else {
                                                                                                                                                            echo $bn;
                                                                                                                                                        } ?>&vt=<?php echo $uploader_type; ?>&sn=">
                                                <?php if ($uploader_type == "individual") {
                                                    echo $un . " " . $avi;
                                                } else {
                                                    echo $bn . " " . $avi;
                                                } ?>
                                            </a>
                                        </h5>
                                        <p class="card-text">Course Category:<b> <?php echo $ccat; ?></b></p>
                                        <p class="card-text">Course Sub Category:<b> <?php echo $cscat; ?></b></p>
                                        <p class="card-text">No of Videos:<b> <?php echo $no_of_videos; ?></b></p>
                                        <p class="card-text">No of Joiners :<b> <?php echo $no_of_joiners; ?></b></p>
                                        <p class="card-text">Uploaded on :<b> <?php echo $cdate; ?></b></p>
                                        <a href="view_course?u=<?php echo $tit2; ?>&type=<?php echo $type; ?>&cid=<?php echo $cid; ?>">
                                            <button type="button" class="btn btn-success ">Details</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <?php
                        }
                    }
                }
            }
        }
    }
    
    ?>
        </div>
    <script>
        <?php
        if (isset($_GET["mes"])  && $_GET["cid"]) {
            $mes = $_GET["mes"];
            $cid  = $_GET["cid"];
        ?>

alert("<?php echo $mes; ?>");

        <?php
        }
        
        require 'footer.php';
        ?>
    </script>

</body>

</html>