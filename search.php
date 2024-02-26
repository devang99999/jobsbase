<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>Search</title>
    <style>
        .maindiv {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            background-image: url('./imgs/bi1.jpg');
            background-size: cover;
            background-position: center;
            align-content: flex-start;
            /* padding-top: 150px; */
            -webkit-backdrop-filter: brightness(80%);
            backdrop-filter: brightness(80%);
        }

        .bgm {
            background-image: url('./imgs/bi1.jpg');
            background-size: cover;
            background-position: center;
            align-content: flex-start;
            /* padding-top: 150px; */
            -webkit-backdrop-filter: brightness(80%);
            backdrop-filter: brightness(80%);
        }
    </style>
</head>

<body>
    <?php
    @require "config.php";
    session_start();
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
    require "boot.php";
    require "nav.php";
    $se = $_GET["se"];
    ?>

    <?php
    function people()
    {
        // $se = "";
        @require "config.php";
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
        <div class="maindiv">
            <!-- Card -->
            <div class="card">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" style="width:512px;" src="imgs/search.png" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->

                    <form action="" method="post">
                        <label class="form-label" for="search">Search People</label> <br>
                        <div class="input-group">
                            <input id="user" placeholder="Search People" aria-label="Search" aria-describedby="search-addon" class="form-control rounded" type="search" name="sq" id="" value="<?php if (
                                                                                                                                                                                                    !empty($_GET["sq"])
                                                                                                                                                                                                ) {
                                                                                                                                                                                                    echo $_GET["sq"];
                                                                                                                                                                                                } ?>">
                            <button type="submit" class="btn btn-outline-primary">search</button>
                        </div>
                        <!-- <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div> -->
                        <!-- <input class="btn btn-info text-black" type="submit" value="submit"><br> -->

                    </form>
                    <!-- Button -->


                    <!-- Card -->



                </div>

            </div>
        </div>

        <?php
    }
    function people_result()
    {
        $tit2 = $GLOBALS["tit2"];
        $type = $_SESSION['type'];
        $id = $_SESSION['id'];
        if (isset($_POST["sq"])) {
            $search = $_POST["sq"];
            $stmt = "SELECT * FROM individual WHERE (fname like '%$search%' or lname like '%$search%' or uname like '%$search%') and uname != '$tit2' AND status <2";
            
            $result = mysqli_query($GLOBALS["conn"], $stmt);

            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $uname = $row["uname"];
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    

                    $ind = 1;
                    if ($ind == 1) {
                        $selall = "SELECT * FROM individual WHERE uname = '$uname'";
                        $selallres = mysqli_query($GLOBALS["conn"], $selall);
                        while ($row4 = mysqli_fetch_assoc($selallres)) {
                            $uname = $row4["uname"];
                            $bid = $row4["id"];
                            // $business_industry = $row4["business_industry"];
                            // $indust = "SELECT * FROM job_category WHERE id = '$business_industry'";
                            // $industres = mysqli_query($GLOBALS['conn'], $indust);
                            // $industryy = mysqli_fetch_assoc($industres);
                            // $industry = $industryy['job_category'];
                            $fname = $row4["fname"];
                            $lname = $row4["lname"];
                            $email = $row4["email"];
                            $bavatar = $row4["avatarlink"];
                            $followers = $row4["followers"];
                            $following = $row4["following"];
                            $uid_type = $row4["uid_type"];

                            $verification = $row4["verification"];
                            if ($verification == "1") {
                                $verified = "<img src='imgs/verified.png' style='width: 15px; height: 20px;'>";
                            } else {
                                $verified = "";
                            }

                            $ims = "select * from imgs where uname = '$bid' AND uid_type = '$uid_type'";
                            $imsres = mysqli_query($GLOBALS["conn"], $ims);
                            $imsrow = mysqli_fetch_assoc($imsres);
                            $imsnum = mysqli_num_rows($imsres);
                            $vis = "SELECT * FROM videos WHERE uname = '$bid' AND uid_type = '$uid_type'";
                            $visres = mysqli_query($GLOBALS["conn"], $vis);
                            $visrow = mysqli_fetch_assoc($visres);
                            $visnum = mysqli_num_rows($visres);
                            $posts = $imsnum + $visnum;
                            $sq = $_POST["sq"];

                            if ($uname != $tit2) { ?>


                                <div class="bgm">
                                    <section class="" style="margin:auto;padding:0;">
                                        <div class="container py-5 h-100">
                                            <div class="row d-flex justify-content-center align-items-center h-100">
                                                <div class="col col-md-9 col-lg-7 col-xl-5">
                                                    <div class="card" style="border-radius: 15px;">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex text-black">
                                                                <div class="flex-shrink-0">
                                                                    <img src="<?php echo $bavatar; ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <a href="profile_view.php?u=<?php echo $tit2; ?>&type=<?php echo $GLOBALS['type']; ?>&view=<?php echo $bid; ?>&vt=<?php echo $uid_type; ?>&sn=">


                                                                        <h5 class="mb-1"><?php echo $uname . " " . $verified; ?></h5>
                                                                    </a>
                                                                    <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $fname . " " . $lname?></p>

                                                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                                                        <div>
                                                                            <p class="small text-muted mb-1">Posts</p>
                                                                            <p class="mb-0"><?php echo $posts; ?></p>
                                                                        </div>
                                                                        <div class="px-3">
                                                                            <p class="small text-muted mb-1">Followers</p>
                                                                            <p class="mb-0"><?php echo $followers ?></p>
                                                                        </div>
                                                                        <div>
                                                                            <p class="small text-muted mb-1">Following</p>
                                                                            <p class="mb-0"><?php echo  $following ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex pt-1">

                                                                        <a href="message_back?u=<?php echo $GLOBALS["tit2"]; ?>&t=<?php echo $GLOBALS["type"]; ?>&sq=<?php echo $bid; ?>&sqt=<?php echo $uid_type;?>"><button type="button" class="btn btn-outline-primary me-2 flex-grow-1">Chat</button></a>
                                                                        <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $bid; ?>&vt=<?php echo $uid_type; ?>&sn=">
                                                                            <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                <?php }
                        }
                    }
                }
            }
            if ($num <= 0) {
                echo "<center><b><h1>no results found</h1></b></center>";
            }
        } else {
            $ind = 0;
            if (
                $ind == 1
            ) { ?><h1><?php echo "not found"; ?></h1><?php echo $GLOBALS["num"];
                                                    }
                                                }
                                            }
                                                        ?>
    <?php
    function business()
    {
        // $se = "";
        @require "config.php";
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
        <div class="maindiv">
            <!-- Card -->
            <div class="card">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" style="width:512px;" src="imgs/search.png" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->

                    <form action="" method="post">
                        <label class="form-label" for="search">Search Businesses</label> <br>
                        <div class="input-group">
                            <input id="user" placeholder="Search Business" aria-label="Search" aria-describedby="search-addon" class="form-control rounded" type="search" name="sq" id="" value="<?php if (
                                                                                                                                                                                                        !empty($_GET["sq"])
                                                                                                                                                                                                    ) {
                                                                                                                                                                                                        echo $_GET["sq"];
                                                                                                                                                                                                    } ?>">
                            <button type="submit" class="btn btn-outline-primary">search</button>
                        </div>
                        <!-- <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div> -->
                        <!-- <input class="btn btn-info text-black" type="submit" value="submit"><br> -->

                    </form>
                    <!-- Button -->


                    <!-- Card -->

                </div>

            </div>
        </div>

        <?php
    }
    function business_result()
    {
        $tit2 = $GLOBALS["tit2"];
        if (isset($_POST["sq"])) {
            $search = $_POST["sq"];
            $stmt = "SELECT * FROM business WHERE( bname like '%$search%' or oname like '%$search%' or business_industry like '%$search%') and bname != '$tit2' and  status <'2'";
            $result = mysqli_query($GLOBALS["conn"], $stmt);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $bname = $row["bname"];
                    $business_industry = $row["business_industry"];
                    $oname = $row["oname"];
                    $bid = $row["id"];
                    $uid_type  = $row["uid_type"];

                    $ind = 1;
                    if ($ind == 1) {
                        $selall = "SELECT * FROM business WHERE bname = '$bname'";
                        $selallres = mysqli_query($GLOBALS["conn"], $selall);
                        while ($row4 = mysqli_fetch_assoc($selallres)) {
                            $bname = $row4["bname"];
                            $bid = $row4["id"];
                            $business_industry = $row4["business_industry"];
                            $indust = "SELECT * FROM job_category WHERE id = '$business_industry'";
                            $industres = mysqli_query($GLOBALS['conn'], $indust);
                            $industryy = mysqli_fetch_assoc($industres);
                            $industry = $industryy['job_category'];
                            $oname = $row4["oname"];
                            $email = $row4["email"];
                            $bavatar = $row4["avatarlink"];
                            $followers = $row4["followers"];
                            $following = $row4["following"];
                            $vuid = $row4["uid_type"];
                            $verification = $row4["verification"];
                            if ($verification == "1") {
                                $verified = "<img src='imgs/verified.png' style='width: 15px; height: 20px;'>";
                            } else {
                                $verified = "";
                            }

                            $ims = "select * from imgs where uname = '$bname'";
                            $imsres = mysqli_query($GLOBALS["conn"], $ims);
                            $imsrow = mysqli_fetch_assoc($imsres);
                            $imsnum = mysqli_num_rows($imsres);
                            $vis = "SELECT * FROM videos WHERE uname = '$bname'";
                            $visres = mysqli_query($GLOBALS["conn"], $vis);
                            $visrow = mysqli_fetch_assoc($visres);
                            $visnum = mysqli_num_rows($visres);
                            $posts = $imsnum + $visnum;
                            $sq = $_POST["sq"];

                            if ($bname != $tit2) { ?>


                                <div class="bgm">
                                    <section class="" style="margin:auto;padding:0;">
                                        <div class="container py-5 h-100">
                                            <div class="row d-flex justify-content-center align-items-center h-100">
                                                <div class="col col-md-9 col-lg-7 col-xl-5">
                                                    <div class="card" style="border-radius: 15px;">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex text-black">
                                                                <div class="flex-shrink-0">
                                                                    <img src="<?php echo $bavatar; ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <a href="profile_view.php?u=<?php echo $tit2; ?>&type=<?php echo $GLOBALS['type']; ?>&view=<?php echo $bname; ?>&vt=<?php echo $vuid; ?>&sn=">


                                                                        <h5 class="mb-1"><?php echo $bname . " " . $verified; ?></h5>
                                                                    </a>
                                                                    <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $industry ?></p>

                                                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                                                        <div>
                                                                            <p class="small text-muted mb-1">Posts</p>
                                                                            <p class="mb-0"><?php echo $posts; ?></p>
                                                                        </div>
                                                                        <div class="px-3">
                                                                            <p class="small text-muted mb-1">Followers</p>
                                                                            <p class="mb-0"><?php echo $followers ?></p>
                                                                        </div>
                                                                        <div>
                                                                            <p class="small text-muted mb-1">Following</p>
                                                                            <p class="mb-0"><?php echo  $following ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex pt-1">

                                                                        <a href="message_back?u=<?php echo $GLOBALS["tit2"]; ?>&t=<?php echo $GLOBALS["type"]; ?>&sq=<?php echo $bid; ?>&sqt=<?php echo $uid_type;?>"><button type="button" class="btn btn-outline-primary me-2 flex-grow-1">Chat</button></a>
                                                                        <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $bid; ?>&vt=<?php echo $vuid; ?>&sn=">
                                                                            <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                <?php }
                        }
                    }
                }
            }
            if ($num <= 0) {
                echo "<center><b><h1>no results found</h1></b></center>";
            }
        } else {
            $ind = 0;
            if (
                $ind == 1
            ) { ?><h1><?php echo "not found"; ?></h1><?php echo $GLOBALS["num"];
                                                    }
                                                }
                                            }
                                                        ?>

    <?php
    function videos()
    {
        // $se = "";
        @require "config.php";
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
        <div class="maindiv">
            <!-- Card -->
            <div class="card">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" style="width:512px;" src="imgs/search.png" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->

                    <form action="" method="post">
                        <label class="form-label" for="search">Search Videos</label> <br>
                        <div class="input-group">
                            <input id="user" placeholder="Search Videos" aria-label="Search" aria-describedby="search-addon" class="form-control rounded" type="search" name="sq" id="" value="<?php if (
                                                                                                                                                                                                    !empty($_GET["sq"])
                                                                                                                                                                                                ) {
                                                                                                                                                                                                    echo $_GET["sq"];
                                                                                                                                                                                                } ?>">
                            <button type="submit" class="btn btn-outline-primary">search</button>
                        </div>
                        <!-- <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div> -->
                        <!-- <input class="btn btn-info text-black" type="submit" value="submit"><br> -->

                    </form>
                    <!-- Button -->


                    <!-- Card -->


                </div>

            </div>
        </div>

        <?php
    }
    function videos_result()
    {
        $tit2 = $GLOBALS["tit2"];
        if (isset($_POST["sq"])) {
            $search = $_POST["sq"];
            $stmt = "SELECT * FROM videos WHERE( name like '%$search%' or uname like '%$search%' or caption like '%$search%') AND status <'2'";
            $result = mysqli_query($GLOBALS["conn"], $stmt);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row4 = mysqli_fetch_assoc($result)) {

                    $name = $row4["name"];
                    $uname = $row4["uname"];
                    $uid_type = $row4["uid_type"];
                    $uns = "SELECT * FROM $uid_type WHERE id = '$uname'";
                    $unsres = mysqli_query($GLOBALS["conn"], $uns);
                    $unsrow = mysqli_fetch_assoc($unsres);
                    $un = $unsrow["uname"];
                    $caption = $row4["caption"];
                    $link = $row4["link"];
                    $date = $row4["datetime"];
                    $ext = $row4["ext"];
                    $likes = $row4["likes"];
                    $avatar = $row4["avatarlink"];
                    // $views = $row4["views"];
                    $comments = $row4["comments"];

                    $sq = $_POST["sq"]; ?>

                    <div class="bgm">
                        <section class="" style="margin:auto;width:30%;">
                            <!-- Card -->
                            <div class="card">

                                <!-- Card image -->
                                <div class="view overlay">
                                    <a href="vid_view.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&t=<?php echo $GLOBALS['type']; ?>">
                                        <video class="w-100">
                                            <source src="<?php echo $link; ?>" type="video/<?php echo $ext; ?>" />
                                        </video>


                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->

                                    <h4 class="card-title"><?php echo $name; ?></h4>
                                    <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&vt=<?php $uid_type;?>&sn=">
                                        <h4 class="card-title"><?php echo $un; ?></h4>
                                    </a>
                                    <!-- Text -->
                                    <p class="card-text"><?php echo $caption; ?></p>
                                    <p class="text-muted" style="font-size:10px;"><?php echo $date; ?></p>
                                    <b>
                                        <p class="card-text">Likes: <?php echo $likes; ?></p>
                                    </b>
                                    <b>
                                        <p class="card-text">Comments: <?php echo $comments; ?></p>
                                    </b>
                                    <!-- Button -->

                                </div>

                            </div>
                            <!-- Card -->
                        </section>
                    </div>
    <?php }
            }
            if ($num <= 0) {
                echo "<center><b><h1>no results found</h1></b></center>";
            }
        }
    }


    ?>


    <?php
    function jobs()
    {
        // $se = "";
        @require "config.php";
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
        <div class="maindiv">
            <!-- Card -->
            <div style="position:sticky;" class="card">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" style="width:512px;" src="imgs/search.png" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->

                    <form action="" method="post">
                        <label class="form-label" for="search">Search Jobs</label> <br>
                        <div class="input-group">
                            <input id="user" placeholder="Search Jobs" aria-label="Search" aria-describedby="search-addon" class="form-control rounded" type="search" name="sq" id="" value="<?php if (
                                                                                                                                                                                                    !empty($_GET["sq"])
                                                                                                                                                                                                ) {
                                                                                                                                                                                                    echo $_GET["sq"];
                                                                                                                                                                                                } ?>">
                            <button type="submit" class="btn btn-outline-primary">search</button>
                        </div>
                        <!-- <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div> -->
                        <!-- <input class="btn btn-info text-black" type="submit" value="submit"><br> -->

                    </form>
                    <!-- Button -->


                    <!-- Card -->


                </div>

            </div>
        </div>

        <?php
    }
    function jobs_result()
    {
        $tit2 = $GLOBALS["tit2"];
        if (isset($_POST["sq"])) {
            $search = $_POST["sq"];
            $stmt = "SELECT * FROM jobs WHERE( job_name like '%$search%' or job_link like '%$search%' or poster like '%$search%'  or job_type like '%$search%' or job_description like '%$search%' or job_location like '%$search%' or salary like '%$search%') AND status <'2'";
            $result = mysqli_query($GLOBALS["conn"], $stmt);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row4 = mysqli_fetch_assoc($result)) {

                    $jname = $row4["job_name"];
                    $jlink = $row4["job_link"];
                    $jposter = $row4["poster"];
                    $jtype = $row4["job_type"];
                    $jdesc = $row4["job_description"];
                    $jloc = $row4["job_location"];
                    $datetime = $row4["datetime"];
                    $javatar = $row4["avatarlink"];
                    $salary = $row4["salary"];
                    $jops = $row4["no_of_openings"];
                    $jdate = $row4["sdate"];


                    $bsle = "select * from business where id = '$jposter'  ";
                    $bsle2 = mysqli_query($GLOBALS["conn"], $bsle);
                    $bsle3 = mysqli_fetch_assoc($bsle2);
                    // $city = $bsle3["city"];
                    // $state = $bsle3["state"];
                    // $country = $bsle3["country"];
                    $bloc = $bsle3['address'];
                    $email = $bsle3["email"];
                    $phone = $bsle3["phone"];
                    $uplname = $bsle3["bname"];





                    $sq = $_POST["sq"]; ?>

                    <div class="bgm">
                        <section class="" style="margin:auto;width:100%;">
                            <!-- Card -->
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col col-lg-6 mb-4 mb-lg-0">
                                        <div class="card mb-3" style="border-radius: .5rem;">
                                            <div class="row g-0">
                                                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                    <img style="width:100%;" src="<?php echo $javatar; ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                                    <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $jposter; ?>&vt=business&sn=">
                                                        <h5 style="color:blue;"><?php echo $uplname; ?></h5>
                                                    </a>
                                                    <p style="color:#000;"><?php echo $bloc; ?></p>
                                                    <i class="far fa-edit mb-5"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <h3><?php echo $jname; ?></h3>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>Email</h6>
                                                                <p class="text-muted"><?php echo $email; ?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Phone</h6>
                                                                <p class="text-muted"><?php echo $phone; ?></p>
                                                            </div>
                                                        </div>
                                                        <h6>Salary</h6><?php echo $salary; ?>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>Job Type</h6>
                                                                <p class="text-muted"><?php echo $jtype; ?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Job Location</h6>
                                                                <p class="text-muted"><?php echo $jloc; ?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>no of openings</h6>
                                                                <p class="text-muted"><?php echo $jops; ?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Start Date</h6>
                                                                <p class="text-muted"><?php echo $jdate; ?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Job Posted Time</h6>
                                                                <p class="text-muted"><?php echo $datetime; ?></p>
                                                            </div>
                                                        </div>
                                                        <h6>Job Description</h6>
                                                        <div class="d-flex">
                                                            <p class="text-muted"><?php echo $jdesc; ?></p>
                                                        </div>
                                                        <a href="job_apply.php?u=<?php echo $tit2; ?>&t=<?php echo $GLOBALS['type']; ?>&jl=<?php echo $jlink; ?>"><button type="button" class="btn btn-primary btn-rounded">Apply Now</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                        </section>
                    </div>
    <?php }
            }
            if ($num <= 0) {
                echo "<center><b><h1>no results found</h1></b></center>";
            }
        }
    }


    ?>


    <?php if ($_GET["se"] == "people") {
        people();
        people_result();
    } ?>
    <?php if ($_GET["se"] == "business") {
        business();
        business_result();
    } ?>
    <?php if ($_GET["se"] == "videos") {
        videos();
        videos_result();
    } ?>
    <?php if ($_GET["se"] == "jobs") {
        jobs();
        jobs_result();
    }

    // require 'footer.php';
    ?>

    <div id="res"></div>
</body>

</html>