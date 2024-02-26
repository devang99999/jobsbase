<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

  <link href="../assets/css/style.css" rel="stylesheet">
  
    <style>
      .sibtn{
        --bs-btn-padding-x: 4px!important;
        --bs-btn-padding-y: 5px!important;
        --bs-btn-border-radius:3px!important;
        --bs-btn-font-size: 15px!important;
        margin: -10px auto;
      
}
a{
  text-decoration: none!important;
}
    </style>
</head>
<body>
<?php
@require 'config.php';
require '../boot.php';
      if(!empty($_SESSION['auname'])){
        @$tit= $_SESSION['name'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
    }

  ?>
       <div style="position: sticky;top: 0px;z-index: 999;">
       <section id="topbar" class="d-flex align-items-center" >
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?php echo $_SESSION['email'];?>"><?php echo $_SESSION['email'];?></a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span><a href="tel:<?php echo $_SESSION['phone'];?>"><?php echo $_SESSION['phone'];?> </a></span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <!--  -->
<!-- 
<a class="nav-link active" href="upload.php?u=<?php echo $tit;?>">Upload</a>
<a class="nav-link active" href="#">Your Applications</a>
<a class="nav-link" href="logout.php">Logout</a> -->
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

      <h1 class="logo"><a href="feed?u=<?php echo $tit2;?>&t=<?php echo $type ;?>">Jobsbase<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar" style="border:none!important;">
        <ul>
          
          <!-- <li><a class="nav-link scrollto"href="<?php //echo'search.php?u='.$tit;?>"><h2><i style="font-size:28px;margin-left-20px" class="fa-solid fa-magnifying-glass"></i></h2></a></li> -->
          <!-- <li><a href="<?php echo  '../logout';?>">Logout</a></li> -->
          <li><a href="<?php echo  '../logout';?>">Logout</a></li>
          <li class="dropdown"><a href="#"><span>Hello <?php echo $tit;?></span> <i class="bi bi-chevron-down"></i></a>
          </li>
        </ul>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i>
        <a id="prolink" style="color:#000;" class="nav-link" href="<?php //echo  'profile.php?u='.$tit.'link=';?>"> <i class="fa-regular fa-user"></i>
        <i class="bi bi-list mobile-nav-toggle"></i>
<?php
              //  echo "Hello &nbsp". $tit ;

              
               ?>!</a> -->
               <i class="bi mobile-nav-toggle bi-list"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  </div>
</body>
</html>