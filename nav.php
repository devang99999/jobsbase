<?php
    @session_start();
    @require 'config.php';
    require 'boot.php';
    // $profilelink ="profile.php?u=";
    if (!empty($_SESSION['bname'])) {
        @$tit = $_SESSION['oname'];
        @$tit2 = $_SESSION['bname'];
        @$type = "business";
        $av = $_SESSION['avatar'];
        @$avatar =
            " <img src='$av ' style ='width:40px;' class='img-fluid rounded-circle' alt=''>";
        $id = $_SESSION['id'];
    }
    if (!empty($_SESSION['uname'])) {
        @$tit = $_SESSION['fname'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
        $av = $_SESSION['avatar'];
        $avatar =
            " <img src='$av ' style='width:40px;'class='img-fluid rounded-circle' alt=''>";
        $id = $_SESSION['id'];
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        .sibtn {
            --bs-btn-padding-x: 4px !important;
            --bs-btn-padding-y: 5px !important;
            --bs-btn-border-radius: 3px !important;
            --bs-btn-font-size: 15px !important;
            margin: -10px auto;

        }

        a {
            text-decoration: none !important;
        }

        .burd {
            display: none;
        }

        .menu {
            display: none;
        }

        @media only screen and (max-width: 1000px) {

            .conn {
                visibility: hidden;
            }

            .menubar {
                position: fixed;
                top: 10px;
                right: 35px;
                display: block;
            }

            .nv2 {
                display: none;
            }

            .burd {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
                width: 100%;
                align-items: center;
                background-color: #106eea;
                position: fixed;
                top: 0.1px;
                z-index: 999;


            }

            .burd1 {
                width: 80%;

            }

            .menubar {
                position: fixed;
                top: 10px;
                right: 35px;
                display: block;
            }

            .menuspan {
                width: 35px;
                height: 5px;
                background-color: turquoise;
                margin: 6px 0;
                transition: 0.5s;
            }

            .menu {
                /* position: absolute; */
                /* top: 100px; */
                background-color: #f55c47;
                width: 100%;
                height: 100%;
                margin-left: 0.5%;
                margin-right: 0.5%;
                display: none;
                transition: 1s ease;
                position: fixed;
                right: -5000px;
                transition: 5s ease;position: fixed;
                top: 10px;
            }

            .menudisp {
                display: block;
                position: fixed;
                top: 0.1px;
                left: 0.1px;
                padding-top: 30px;
                margin: 0;
                transition: 1s;
                color:#000;
                background-color: #106eea;
                z-index: 999;
            }

            .menuul {
                display: flex;
                flex-direction: column;
                /* align-content: space-between; */
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                /* text-align: center; */
                transition: 5s ease;
            }

            .menuli {

                list-style: none;
                height: 50px;
                /* border: 3px solid #ffebcd; */
                width: 99%;
                margin: auto;
                /* text-align: center; */
                display: flex;
                align-items: center;
                justify-content: center;
                transition: 5s ease;
            }

            .menuaf {
                text-decoration: none;
                color: #fff;
                padding-top: 10px;
                padding-left: 5px;
                position: relative;
                /* top: 5px; */
                font-size: 20px;
                text-align: center;
                transition: 0.5s;
            }
            .cross1{
            transform:translateY(11px) rotate(-45deg);
            transition: 0.5s ease;
            background-color: red;
        }

        .cross2 {
            opacity: 0;
            transition: 0.5s ease;
        }

        .cross3 {
            transform: translateY(-10px) rotate(45deg);
            transition: 0.5s ease;
            background-color: red;
        }

        #mn1 #mn2 #mn3 {
            transition: 0.5s ease;

        }

        }
    </style>
</head>

<body>
   
    <div class="nv2">
        <div style="position: fixed!important;top: 0px;z-index: 999;">
            <section id="topbar" class="d-flex align-items-center">
                <div class="container d-flex justify-content-center justify-content-md-between">
                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></i>
                        <i class="bi bi-phone d-flex align-items-center ms-4"><span><a href="tel:<?php echo $_SESSION['phone']; ?>"><?php echo $_SESSION['phone']; ?> </a></span></i>
                    </div>
                    <div class="social-links d-none d-md-flex align-items-center">
                        <a href="social" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="social" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="social" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="social" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                    </div>
                </div>
            </section>
        </div>

        <div class="conn">
            <div style="position: fixed;top: 0px;z-index: 999; width:100%">
                <section id="topbar" class="d-flex align-items-center">
                    <div class="container d-flex justify-content-center justify-content-md-between">
                        <div class="contact-info d-flex align-items-center">
                            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></i>
                            <i class="bi bi-phone d-flex align-items-center ms-4"><span><a href="tel:<?php echo $_SESSION['phone']; ?>"><?php echo $_SESSION['phone']; ?> </a></span></i>
                        </div>
                        <div class="social-links d-none d-md-flex align-items-center">

                            <!-- <a class="nav-link" href="logout.php">Logout</a> -->
                            <a href="social" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="social" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="social" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="social" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                        </div>
                    </div>
                </section>
                <!-- ======= Header ======= -->
                <header id="header" class="d-flex align-items-center">
                    <div class="container d-flex align-items-center justify-content-between">

                        <h1 class="logo"><a href="feed?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Jobsbase.</span><sub><span class="btn btn-outline-secondary" style="padding:0;color:#000;font-weight:900; border: 3px solid turquoise;padding: 3px;border-radius: 9px;">Alpha</span></sup><span></sub></a></h1>
                        <!-- Uncomment below if you prefer to use an image logo -->
                        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
                        <nav id="navbar" class="navbar conn">
                            <ul>
                                <li><a class="nav-link scrollto" aria-current="page" href="feed?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Home</a></li>
                                <li><a class="nav-link scrollto" href="jobs?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Jobs</a></li>
                                <!-- <li><a class="nav-link scrollto" href="#services">Contact</a></li> -->
                                <li class="dropdown"><a href="#"><span>Courses</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="upload_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Upload Course</a></li>
                                        <li><a href="search_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Search Couses</a></li>
                                        <li><a href="joined_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Courser You Joined</a></li>
                                        <!-- <li><a href="your_certi.php?u=<?php // echo $tit2; ?>&t=<?php // echo $type; ?>">Your Certificate</a></li> -->
                                        <li><a href="explore_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Explore Courses</a></li>
                                        
                                    </ul>
                                </li>
                                <!-- <li><a class="nav-link scrollto" href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&sq=">Search</a></li> -->
                                <li class="dropdown"><a href="#"><span>VIEW</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="upload?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Upload Videos</a></li>
                                        <li><a href="videos_view?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Watch Videos</a></li>
                                        <!-- <li><a href="#">Videos With certification</a></li>
                                        <li><a href="#">Your Certificate</a></li> -->
                                    </ul>
                                </li>
                                <!-- <li><a class="nav-link scrollto"href="<?php // echo'search.php?u='.$tit;
                                                                            ?>"><h2><i style="font-size:28px;margin-left-20px" class="fa-solid fa-magnifying-glass"></i></h2></a></li> -->

                                <li class="dropdown"><a href="#"><span>SEARCH</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=people">Search People</a></li>
                                        <li><a href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=business">Search Business</a></li>
                                        <li><a href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=videos">Search Videos</a></li>
                                        <li><a href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=jobs">Search Jobs</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a class="nav-link scrollto"href="<?php //echo'search.php?u='.$tit;
                                                                            ?>"><h2><i style="font-size:28px;margin-left-20px" class="fa-solid fa-magnifying-glass"></i></h2></a></li> -->
                                <li class="dropdown"><a href="#"><span>Hello <?php echo $tit  . "  " . $avatar; ?></span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <?php
                                        $sql = "SELECT * FROM notifications WHERE user_id = '$id' AND user_type = '$type' AND is_read = '0'";
                                        $result = mysqli_query($conn, $sql);
                                        $num = mysqli_num_rows($result);


                                        ?>
                                        <li><a href="<?php echo  'profile?u=' . $tit2; ?>&t=<?php echo $type; ?>&sn=images">Profile</a></li>
                                        <li><a href="<?php echo  'message?u=' . $tit2; ?>&t=<?php echo $type; ?>&sq=">Chat</a></li>
                                        <li><a href="<?php echo  'notification?u=' . $tit2; ?>&t=<?php echo $type; ?>&sq=">notification <span style="background:red;color:#fff;border-radius:45%;padding:5px;"> <?php echo $num ?></span></a></li>
                                        <li><a href="<?php echo  'logout'; ?>">Logout</a></li>

                                        <!-- <li><a href="#">Videos With certification</a></li>
              <li><a href="#">Your Certificate</a></li> -->


                                    </ul>
                                </li>
                            </ul>
                            <i class="bi mobile-nav-toggle bi-list"></i>
                        </nav><!-- .navbar -->

                    </div>
                </header><!-- End Header -->
            </div>
        </div>
    </div>
    <div id="menu" class="menu" style="overflow-y:scroll;">
    
    
    <ul class="menuul">
                                <li class="menuli"><a class="menuaf" class="nav-link scrollto" aria-current="page" href="feed?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Home</a></li>
                                <li class="menuli"><a class="menuaf" class="nav-link scrollto" href="jobs?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Jobs</a></li>
                                <li class="menuli"><a class="menuaf" class="nav-link scrollto" href="#services">Contact</a></li>                            
                                <li class="menuli"><a class="menuaf" href="upload_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Upload Course</a></li>
                                <li class="menuli"><a class="menuaf" href="search_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Search Couses</a></li>
                                <li class="menuli"><a class="menuaf" href="joined_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Courser You Joined</a></li>
                                <li class="menuli"><a class="menuaf" href="#">Your Certificate</a></li>
                                <li class="menuli"><a class="menuaf" href="explore_course?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Explore Courses</a></li>
                                <li class="menuli"><a class="menuaf" href="upload?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Upload Videos</a></li>
                                <li class="menuli"><a class="menuaf" href="videos_view?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Watch Videos</a></li>
                                <!-- <li class="menuli"><a class="menuaf" href="#">Videos With certification</a></li>
                                <li class="menuli"><a class="menuaf" href="#">Your Certificate</a></li> -->
                                <li class="menuli"><a class="menuaf" href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=people">Search People</a></li>
                                <li class="menuli"><a class="menuaf" href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=business">Search Business</a></li>
                                <li class="menuli"><a class="menuaf" href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=videos">Search Videos</a></li>
                                <li class="menuli"><a class="menuaf" href="<?php echo  'search?u=' . $tit2; ?>&t=<?php echo $type; ?>&se=jobs">Search Jobs</a></li>
                                <?php
                                        $sql = "SELECT * FROM notifications WHERE user_id = '$id' AND user_type = '$type' AND is_read = '0'";
                                        $result = mysqli_query($conn, $sql);
                                        $num = mysqli_num_rows($result);


                                        ?>
                                        <li class="menuli"><a class="menuaf" href="<?php echo  'profile?u=' . $tit2; ?>&t=<?php echo $type; ?>&sn=images">Profile</a></li>
                                        <li class="menuli"><a class="menuaf" href="<?php echo  'message?u=' . $tit2; ?>&t=<?php echo $type; ?>&sq=">Chat</a></li>
                                        <li class="menuli"><a class="menuaf" href="<?php echo  'notification?u=' . $tit2; ?>&t=<?php echo $type; ?>&sq=">notification <span style="background:red;color:#fff;border-radius:45%;padding:5px;"> <?php echo $num ?></span></a></li>
                                        <li class="menuli"><a class="menuaf" href="<?php echo  'logout'; ?>">Logout</a></li>
                                  
    </ul>

    </div>
    <div class="burd">
        <div class="burd1">
            <h1  style="z-index:999; color:#fff;" class="logo"><a style="color:#fff;" href="feed?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">Jobsbase.</span><sub><span class="btn btn-outline-secondary" style="padding:0;color:#fff;border: 3px solid turquoise;padding: 3px;border-radius: 9px;">Alpha</span></sup><span></sub></a></h1>
        </div>

        <div id="menubar" onclick="myFunction3()" class="menubar">
            <div id="mn1" class="menuspan"></div>
            <div id="mn2" class="menuspan"></div>
            <div id="mn3" class="menuspan"></div>
        </div>



    </div>
    <script>
        function myFunction3() {
            document.getElementById("mn1").classList.toggle("cross1")
            document.getElementById("mn2").classList.toggle("cross2")
            document.getElementById("mn3").classList.toggle("cross3")
            document.getElementById("menu").classList.toggle("menudisp")
            // document.getElementById("rsl").classList.toggle("menu")
        }
    </script>
</body>

</html>