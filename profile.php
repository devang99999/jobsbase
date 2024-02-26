<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
  <title>profile</title>
  <style>
    .alb {
      width: 100%;
      height: 100%;
      /* border: 1px solid black; */
      margin: 10px;
      padding: 10px;
      /* text-align: center; */
      word-wrap: break-word;
    }

    .content {
      border-radius: 25px !important;
      width: 100% !important;
      height: 100% !important;
      border: transparent !important;
    }


    .navli {
      list-style: none;
      display: inline-block;
      margin-right: 20px;
      margin-left: 20px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .nava {
      text-decoration: none;
      color: #000;
      font-weight: 600;
      font-size: 16px;
    }

    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      border-bottom: 1px solid grey;
      padding-bottom: 20px;
    }

    .bord {
      background-image: url('./imgs/bi1.jpg');
      background-size: cover;
      background-position: center;
      width: 100%;
    }
  </style>
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
    @$id = $_SESSION['id'];
  }
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id = $_SESSION['id'];
  }
  function individual()
  {
  ?> <div class="bord"><?php
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
                        $uname = $GLOBALS['tit2'];
                        $sql = "SELECT * FROM individual WHERE id = '$id' AND uid_type = '$GLOBALS[type]'";
                        $result = mysqli_query($GLOBALS['conn'], $sql);
                        $row = mysqli_fetch_assoc($result);
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $uname = $row['uname'];
                        $avatar = $row['avatarlink'];
                        $email = $row['email'];
                        $desc = $row['description'];
                        $verification = $row['verification'];
                        $phone = $row['phone'];
                        $city = $row['city'];
                        $state = $row['state'];
                        $country = $row['country'];
                        $followers = $row['followers'];
                        $following = $row['following'];
                        $bdate = $row['bdate'];
                        $location = $city . ", " . $state . ", " . $country;
                        if ($verification == 1) {
                          $verified = "<i class='fas fa-check-circle' style='color:blue;background:#fff;border-radius:50%;' aria-hidden='true'></i>";
                        } else {
                          $verified = "";
                        }
                        $name = $fname . " " . $lname;

                        $img_nums = "SELECT * FROM imgs WHERE uname = '$id' AND uid_type = '$GLOBALS[type]'";
                        $result = mysqli_query($GLOBALS['conn'], $img_nums);
                        $img_num = mysqli_num_rows($result);

                        // $followers = "SELECT * FROM followers WHERE uname = '$tit'";

                        // $following = "SELECT * FROM followers WHERE follower = '$tit'";
                        $vid_nums = "SELECT * FROM videos WHERE uname = '$id'";
                        $result = mysqli_query($GLOBALS['conn'], $vid_nums);
                        $vid_num = mysqli_num_rows($result);

                        $posts = $img_num + $vid_num;
                        $type = "individual";
                        $jt = "Your Applied Jobs";

                        $age = date_diff(date_create($bdate), date_create('today'))->y;
                        ?>
      <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
              <div class="card">
                <div class="rounded-top text-white d-flex flex-row" style=" background-image: url('./imgs/ban.jpg');background-size: cover;background-position: center; height:200px;">
                  <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <img src="<?php echo $avatar; ?>" alt="avatar" class="rounded-circle" style=" width: 100%; height: 100%;">
                    <a href="edit_profile?u=<?php echo $_SESSION['uname']; ?>&t=<?php echo $_SESSION['type'] ?>&err=" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1; margin-top:20px;">
                      Edit profile
                    </a>
                  </div>
                  <div class="ms-3" style="margin-top: 130px;">
                    <h5 style="color:rgba(5,5,5,0.9);font-weight:900;background:rgba(255,255,255,0.3); padding:5px;font-faamily:ubuntu;backdrop"> <?php echo $uname . " " . $verified ?></h5>
                    <p style="color:rgba(5,5,5,0.9);font-weight:900;background:rgba(255,255,255,0.3); padding:5px;font-faamily:ubuntu;backdrop"><?php echo $location; ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-end text-center py-1">
                  <div>
                    <p class="mb-1 h5"><?php echo $posts; ?></p>
                    <p class="small text-muted mb-0">Posts</p>
                  </div>
                  <div class="px-3">
                    <p class="mb-1 h5"><?php echo $followers ?></p>
                    <button type="button" class="mb-0 text-muted" data-bs-toggle="modal" data-bs-target="#followers" style="border: transparent;padding: 0;font-size: 14px;background: #fff;font-weight:600;">
                      Followers
                    </button>
                  </div>
                  <div>
                    <p class="mb-1 h5"><?php echo $following ?></p>
                    <button type="button" class="mb-0 text-muted" data-bs-toggle="modal" data-bs-target="#following" style="border: transparent;padding: 0;font-size: 14px;background: #fff;font-weight:600;">
                      Following
                    </button>
                  </div>
                </div>

                <div class="card-body p-4 text-black">
                  <div class="mb-5">
                    <!-- <p class="lead fw-normal mb-1">About</p> -->
                    <div class="p-4" style="background-color: #f8f9fa;">
                      <p class="font-italic mb-1"><b> <?php echo $name; ?> </b></p>
                      <p class="font-italic mb-1">Based in:<b> <?php echo strtoupper($location); ?></b></p>
                      <p class="font-italic mb-0"> <b> <?php echo $desc; ?></b></p>
                      <p class="font-italic mb-1">Email: <b> <?php echo $email; ?></b></p>
                      <p class="font-italic mb-0">Phone: <b> <?php echo $phone; ?></b></p>
                      <p class="font-italic mb-0">Age: <b> <?php echo $age; ?></b></p>

                      <p><a href="education?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>">ADD EDUCATION</a></p>
                      <a href="edudetails?u=<?php echo $tit2;?>&t=<?php echo $type;?>&view=<?php echo $id?>&vt=<?php echo $type;?>&sn="><p class="font-italic mb-0">SEE OR DELETE ADDED EDUCATION DETAILS</p> </a>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- <p class="lead fw-normal mb-0">Recent photos</p> -->
                    <!-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> -->
                  </div>
                  <?php
                  echo "
                  <div class='d-flex justify-content-between align-items-center mb-4'>";
                  // <p class='lead fw-normal mb-0'>Recent photos</p>";
                  // echo 
                  // <!-- <p class='mb-0'><a href='#!' class='text-muted'>Show all</a></p> -->
                  echo "
                </div>
                
                  <ul class='nav' id='cont'>
                    <li class='navli'><a class='nava' aria-current='page' href='?u=$uname&t=$type&sn=images#cont'>images</a></li>
                    <li class='navli'><a class='nava ' href='?u=$uname&t=$type&sn=videos#cont'>Videos</a></li>
                    <li class='navli'><a class='nava' href='?u=$uname&t=$type&sn=jobs#cont'>$jt</a></li>
                    <li class='navli'><a class='nava' href='?u=$uname&t=$type&sn=your_coursesi#cont'>Your Courses</a></li>
                    <li class='navli'><a class='nava' href='?u=$uname&t=$type&sn=certi#cont'>Your Certificates</a></li>

                  </ul>
                
                </div>
                ";

                  function individual_img()
                  {
                    $q = $_GET['sn'];
                    if ($q == "images"); {
                      $sql2 = "SELECT * FROM imgs WHERE uname = '$GLOBALS[id]' AND uid_type = '$GLOBALS[type]' ";
                      $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                      while ($row =  mysqli_fetch_assoc($result2)) {
                        $link = $row['link'];
                        $id = $row['id'];
                        // $uname = $row['uname'];
                        $ext = $row['ext'];
                        $name = $row['name'];
                        $date = $row['datetime'];
                        $ndate = date('d-m-Y', strtotime($date));
                        $caption = $row['caption'];
                        $likes = $row['likes'];
                        $comments = $row['comments'];
                        $uploader_avatar = $row['avatarlink'];
                        $uname = $row['uname'];




                        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {

                  ?>
                          <div class="card content">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                              <a href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">
                                <img src="<?php echo $link ?>" class="img-fluid content  " />

                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                              </a>
                            </div>
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $name; ?></h5>
                              <h6>Uploaded on: <?php echo $ndate; ?></h6>
                              <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                              <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>
                              <h6 class="card-text"><?php echo $caption; ?></h6>
                              <a class="btn btn-primary" href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">More Details</a>
                              <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delimg">Delete</a>
                            </div>
                          </div>
                          <!-- The Modal -->
                          <div class="modal fade" id="delimg">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">IMAGE DELETION CONFIRMATION</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                  <p>ARE YOU SURE YOU WANT TO DELETE THIS IMAGE</p>
                                  <form method="POST" action="delcon.php?u=<?php echo $GLOBALS['tit2']; ?>&link=<?php echo $link; ?>&ac=<?php echo "delimg"; ?>">
                                    <input type="hidden" name="link" value="<?php echo $link; ?>">
                                    <button style="color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-danger"> <i class="fa-solid fa-trash" aria-hidden="true"></i> DELETE IMAGE</button>

                                  </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                              </div>
                            </div>
                          </div>
                        <?php
                        }
                      }
                    }
                  }
                  function individual_vids()
                  {


                    $q = $_GET['sn'];
                    if ($q == "videos"); {
                      $sql2 = "SELECT * FROM videos WHERE uname = '$GLOBALS[id]'  AND uid_type = '$GLOBALS[type]' ";

                      $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                      while ($row =  mysqli_fetch_assoc($result2)) {
                        $link = $row['link'];
                        $id = $row['id'];
                        // $uname = $row['uname'];
                        $ext = $row['ext'];
                        $name = $row['name'];
                        $date = $row['datetime'];
                        $ndate = date('d-m-Y', strtotime($date));
                        $likes = $row['likes'];
                        $comments = $row['comments'];
                        $uploader_avatar = $row['avatarlink'];
                        $uname = $row['uname'];
                        $caption = $row['caption'];




                        if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {



                        ?>

                          <div class="card content">
                            <div style="border:transparent!important;" class="bg-image hover-overlay ripple content" data-mdb-ripple-color="light">
                              <a href="vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">
                                <video class='img-fluid content' preload='metadata' controls>
                                  <source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
                                </video>
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                              </a>
                            </div>
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $name; ?></h5>
                              <h6>Uploaded on: <?php echo $ndate; ?></h6>
                              <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                              <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>
                              <h6 class="card-text"><?php echo $caption; ?></h6>
                              <a class="btn btn-primary" href="vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">More Details</a>
                              <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delvid">Delete</a>
                            </div>
                          </div>
                          <!-- The Modal -->
                          <div class="modal fade" id="delvid">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">VIDEO DELETION CONFIRMATION</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                  <p>ARE YOU SURE YOU WANT TO DELETE THIS VIDEO</p>
                                  <form method="POST" action="delcon.php?u=<?php echo $GLOBALS['tit2']; ?>&link=<?php echo $link; ?>&ac=<?php echo "delvid"; ?>">
                                    <input type="hidden" name="link" value="<?php echo $link; ?>">
                                    <button style="color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-danger"> <i class="fa-solid fa-trash" aria-hidden="true"></i> DELETE VIDEO</button>

                                  </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                              </div>
                            </div>
                          </div>
                        <?php
                        }
                      }
                    }
                  }
                  function individual_jobs()
                  {
                    $q = $_GET['sn'];
                    if ($q == "jobs"); {
                      $sql2 = "SELECT * FROM job_apply WHERE applier = '$GLOBALS[id]' ";
                      $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                      while ($row =  mysqli_fetch_assoc($result2)) {
                        $jname = $row['job_name'];
                        $jlink = $row['job_link'];
                        $poster = $row['poster'];
                        $date = $row['datetime'];
                        // $cletter = $row['cover_letter'];
                        $status = $row['status'];

                        $jaroc = "SELECT COUNT(*) as count FROM job_apply";
                        $jarocres = mysqli_query($GLOBALS['conn'], $jaroc);
                        $row = mysqli_fetch_assoc($jarocres);
                        $jarc = $row['count'];



                        $avlink = "SELECT * FROM business WHERE id = '$poster' ";
                        $avlink2 = mysqli_query($GLOBALS['conn'], $avlink);
                        $avlink3 = mysqli_fetch_assoc($avlink2);
                        $avlink4 = $avlink3['avatarlink'];
                        $business_avatar = $avlink4;
                        if ($jarc == 0) {
                          echo "<h1> No jobs applied yet</h1>";
                        }

                        if ($jarc > 0) {

                        ?>
                          <div class="card testimonial-card" style="max-width: 22rem;">

                            <!-- Background color -->
                            <div class="card-up indigo lighten-1"></div>

                            <!-- Avatar -->
                            <div class="avatar mx-auto white">
                              <img style="width:100%!important;" src="<?php echo $business_avatar; ?>">
                            </div>

                            <!-- Content -->
                            <div class="card-body">
                              <!-- Name -->
                              <h4 class="card-title"><?php echo $jname; ?></h4>
                              <hr>
                              <!-- Quotation -->
                              <!-- <p> Your cover letter:<b> <?php // echo // $cletter; 
                                                              ?></b></p> -->

                              <p> Applied on: <b><?php echo $date; ?></b></p>
                              <?php
                              if ($status == "0") {
                                $sta = "unseen";
                              }
                              if ($status == "1") {
                                $sta = "seen";
                              }
                              ?>
                              <p> Status: <b><?php echo $sta; ?></b></p>
                              <center><a href="job_dets.php?u=<?php echo $GLOBALS['tit2']; ?>&t=<?php echo $_SESSION['type']; ?>&jl=<?php echo $jlink ?>"><button class="btn btn-primary" type="submit">More Details</button></a></center>
                            </div>

                          </div>

                    <?php
                        }
                        if ($jarc == 0) {
                          echo "<h1> No jobs applied yet</h1>";
                        }
                      }
                    }
                  }
                  function individual_your_courses()
                  {
                    $ycsr = 0;
                    ?>
                    <table class="table align-middle mb-0 bg-white">
                      <thead class="bg-light">
                        <tr>
                          <th>Sr.No</th>
                          <th>Course Title</th>
                          <th>Upload_Time</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q = $_GET['sn'];
                        if ($q == "your_courses"); {
                          $sql2 = "SELECT * FROM course   WHERE uploader = '$GLOBALS[id]' and uploader_type = '$GLOBALS[type]' ";
                          $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                          while ($row =  mysqli_fetch_assoc($result2)) {
                            $cname = $row['course_name'];
                            // $clink = $row['clink'];
                            $date = $row['datetime'];
                            $cid = $row['course_id'];

                        ?>


                            <tr>
                              <td>
                                <?php echo $ycsr = $ycsr + 1; ?>

                              </td>
                              <td>
                                <?php echo $cname; ?>
                              </td>
                              <td>
                                <?php echo $date; ?>
                              </td>
                              <td>
                                <a href="course_details?u=<?php echo $GLOBALS['tit2']; ?>&type=<?php echo $GLOBALS['type']; ?>&cid=<?php echo $cid; ?>">
                                  <button type="button" class="btn btn-success btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                    Deatils
                                  </button>
                                </a>
                              </td>
                            </tr>

                          <?php

                          } ?>
                      </tbody>
                    </table>
                  <?php
                        }
                      }

                      function individual_certi()
                      {

                        $ycsr = 0;
                  ?>
                  <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                      <tr>
                        <th>Sr.No</th>
                        <th>Course Title</th>
                        <th>Issue Time</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $q = $_GET['sn'];
                        if ($q == "your_courses"); {
                          $sql2 = "SELECT * FROM joiner_table WHERE joiner_uname = '$GLOBALS[id]' and joiner_type = '$GLOBALS[type]' ";
                          $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                          while ($row =  mysqli_fetch_assoc($result2)) {
                            $cname = $row['course_id'];
                            // $clink = $row['clink'];
                            $cerid = $row['certificate_id'];
                            $cid = $row['course_id'];
                            $jid = $row['joiner_id'];

                            $coid = "SELECT * FROM course WHERE course_id = '$cid' ";
                            $coid2 = mysqli_query($GLOBALS['conn'], $coid);
                            $coid3 = mysqli_fetch_assoc($coid2);
                            @$coid4 = $coid3['course_id'];
                            @$coname = $coid3['course_name'];

                            $certid = "SELECT * FROM certificate WHERE course_id = '$coid4' and joiner_id = '$jid'  AND certificate_id= '$cerid' ";
                            $certid2 = mysqli_query($GLOBALS['conn'], $certid);
                            $certid4 = mysqli_num_rows($certid2);
                            if ($certid4 > 0) {
                              $certid3 = mysqli_fetch_assoc($certid2);
                              $date = $certid3['datetime'];


                      ?>


                            <tr>
                              <td>
                                <?php echo $ycsr = $ycsr + 1; ?>

                              </td>
                              <td>
                                <?php echo $coname; ?>
                              </td>
                              <td>
                                <?php echo $date; ?>
                              </td>
                              <td>
                                <a href="claim_certificate.php?cid=<?php echo $cname; ?>&joid=<?php echo $jid; ?>">
                                  <button type="button" class="btn btn-success btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                    View Certificate
                                  </button>
                                </a>
                              </td>
                            </tr>

                        <?php
                            }
                          } ?>
                    </tbody>
                  </table>
              <?php
                        }
                      }



              ?>
              <div class="row g-2 d-flex flex-column justify-content-start align-items-center">
                <div class=" d-flex flex-column justify-content-start align-items-center">
                  <?php
                  if ($_GET['sn'] == "images") {
                    individual_img();
                  }

                  if ($_GET['sn'] == "videos") {
                    individual_vids();
                  }
                  if ($_GET['sn'] == "jobs") {
                    individual_jobs();
                  }
                  if ($_GET['sn'] == "your_coursesi") {
                    individual_your_courses();
                  }

                  if ($_GET['sn'] == "certi") {
                    individual_certi();
                  }


                  ?>
                </div>
                <!-- <div class="col mb-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp" alt="image 1" class="w-100 rounded-3">
                    </div> -->
              </div>
              <!-- <div class="row g-2">
                    <div class="col">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp" alt="image 1" class="w-100 rounded-3">
                    </div>
                    <div class="col">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp" alt="image 1" class="w-100 rounded-3">
                    </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

      <!-- The Modal -->
      <div class="modal" id="following">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $GLOBALS['tit2']; ?> Follows:</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <?php

              $flf = "SELECT * FROM follower WHERE follower = '$GLOBALS[id]' AND follower_uid = '$GLOBALS[type]' order by RAND()";
              $flfres = mysqli_query($GLOBALS['conn'], $flf);
              $flfcount = mysqli_num_rows($flfres);
              if ($flfcount > 0) {
                while ($flfass = mysqli_fetch_assoc($flfres)) {
                  $uname = $flfass['following'];
                  $uuid = $flfass['following_uid'];
                  if ($uuid == "individual") {
                    $csl2 = "uname";
                  }
                  if ($uuid == "business") {
                    $csl2 = "bname";
                  }

                  $sql = "SELECT * FROM $uuid WHERE id = '$uname'";
                  // echo $sql;
                  $result = mysqli_query($GLOBALS['conn'], $sql);
                  $row0 = mysqli_fetch_assoc($result);

                  $avatar  = $row0['avatarlink'];
                  $follower = $row0['followers'];
                  $followig = $row0['following'];

                  if ($uuid == "individual") {
                    $uplname = $row0['uname'];
                  }
                  if ($uuid == "business") {
                    $uplname = $row0['bname'];
                  }


              ?>

                  <li style="list-style:none;border:1px solid grey;margin:20px;padding-top:15px;padding-bottom:10px;" class="d-flex justify-content-between align-items-start">
                    <div style="width:20%!important;display:flex; justify-content:space-between;" class=" ms-2 me-auto">
                      <div class="fw-bold">
                        <img style="width:40px;" src="<?php echo $avatar; ?>" alt="">

                      </div>
                      <div class="fw-bold">

                        <p style="margin-left:20px;margin-top:5px;"><?php echo $uplname;
                                                                    ?></p>
                      </div>


                    </div>
                    <div>
                      <a href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&vt=<?php echo $uuid; ?>&sn=">
                        <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                      </a>
                    </div>
                    <!-- <span class="badge badge-primary rounded-pill">14</span> -->
                  </li>
                <?php
                }
                ?>
                </ul>
            </div>
          </div>
        </div>

      </div>

    <?php

              }
              if ($flfcount <= 0) {
                echo "<center><h3> $GLOBALS[tit2]; DON'T FOLLOW ANYONE.</h3></center>";
              }

    ?>
    </div>




    </div>
    </div>
    </div>







    <!-- The Modal -->
    <div class="modal" id="followers">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Followers of <?php echo $GLOBALS['tit2']; ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <ul class="list-group list-group-light list-group-numbered">
              <?php

              $flf = "SELECT * FROM follower WHERE following = '$GLOBALS[id]' AND following_uid = '$GLOBALS[type]' order by RAND()";
              // echo $flf;
              $flfres = mysqli_query($GLOBALS['conn'], $flf);
              $flfcount = mysqli_num_rows($flfres);
              if ($flfcount > 0) {
                while ($flfass = mysqli_fetch_assoc($flfres)) {
                  $uname = $flfass['follower'];
                  $uuid = $flfass['follower_uid'];
                  if ($uuid == "individual") {
                    $csl2 = "uname";
                  }
                  if ($uuid == "business") {
                    $csl2 = "bname";
                  }

                  $sql = "SELECT * FROM $uuid WHERE id = '$uname'";
                  echo $sql;
                  $result = mysqli_query($GLOBALS['conn'], $sql);
                  $row0 = mysqli_fetch_assoc($result);

                  $avatar  = $row0['avatarlink'];
                  $follower = $row0['followers'];
                  $followig = $row0['following'];
                  if ($uuid == "individual") {
                    $uplname = $row0['uname'];
                  }
                  if ($uuid == "business") {
                    $uplname = $row0['bname'];
                  }



              ?>

                  <li style="list-style:none;border:1px solid grey;margin:20px;padding-top:15px;padding-bottom:10px;" class="d-flex justify-content-between align-items-start">
                    <div style="width:20%!important;display:flex; justify-content:space-between;" class=" ms-2 me-auto">
                      <div class="fw-bold">
                        <img style="width:40px;" src="<?php echo $avatar; ?>" alt="">

                      </div>
                      <div class="fw-bold">

                        <p style="margin-left:20px;margin-top:5px;"><?php echo $uplname;
                                                                    ?></p>
                      </div>


                    </div>
                    <div>
                      <a href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&vt=<?php echo $uuid; ?>&sn=">
                        <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                      </a>
                    </div>
                    <!-- <span class="badge badge-primary rounded-pill">14</span> -->
                  </li>
                <?php
                }
                ?>
            </ul>
          </div>
        </div>
      </div>

    </div>

  <?php

              }
              if ($flfcount <= 0) {
                echo "<center><h3> No followers yet</h3></center>";
              }
  ?>

  <!-- The Modal -->
  <div class="modal" id="following">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?php echo $GLOBALS['tit2']; ?> Follows:</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php

          $flf = "SELECT * FROM follower WHERE follower = '$GLOBALS[tit2]' order by RAND()";
          $flfres = mysqli_query($GLOBALS['conn'], $flf);
          $flfcount = mysqli_num_rows($flfres);
          if ($flfcount > 0) {
            while ($flfass = mysqli_fetch_assoc($flfres)) {
              $uname = $flfass['following'];
              $uuid = $flfass['following_uid'];
              if ($uuid == "individual") {
                $csl2 = "uname";
              }
              if ($uuid == "business") {
                $csl2 = "bname";
              }

              $sql = "SELECT * FROM $uuid WHERE $csl2 = '$uname'";
              // echo $sql;
              $result = mysqli_query($GLOBALS['conn'], $sql);
              $row0 = mysqli_fetch_assoc($result);

              $avatar  = $row0['avatarlink'];
              $follower = $row0['followers'];
              $followig = $row0['following'];




          ?>

              <li style="list-style:none;border:1px solid grey;margin:20px;padding-top:15px;padding-bottom:10px;" class="d-flex justify-content-between align-items-start">
                <div style="width:20%!important;display:flex; justify-content:space-between;" class=" ms-2 me-auto">
                  <div class="fw-bold">
                    <img style="width:40px;" src="<?php echo $avatar; ?>" alt="">

                  </div>
                  <div class="fw-bold">

                    <p style="margin-left:20px;margin-top:5px;"><?php echo $uname;
                                                                ?></p>
                  </div>


                </div>
                <div>
                  <a href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&vt=<?php echo $uuid; ?>&sn=">
                    <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                  </a>
                </div>
                <!-- <span class="badge badge-primary rounded-pill">14</span> -->
              </li>
            <?php
            }
            ?>
            </ul>
        </div>
      </div>
    </div>

  </div>

<?php

          }
          if ($flfcount <= 0) {
            echo "<center><h3>$GLOBALS[tit2] DON'T FOLLOW ANYONE.</h3></center>";
          }

?>
</div>
<?php

  }
?>

<?php

function business()
{
  ?> <div class="bord"><?php    

  $type = $_SESSION['type'];
  $tit2 = $GLOBALS['tit2'];
  $id = $GLOBALS['id'];
  $sql = "SELECT * FROM business WHERE id = '$id'";
  $result = mysqli_query($GLOBALS['conn'], $sql);
  $row = mysqli_fetch_assoc($result);
  $bname = $row['bname'];
  // $uname = $row['uname'];
  $avatar = $row['avatarlink'];
  $email = $row['email'];
  $desc = $row['business_description'];
  $sdate = $row['sdate'];
  $nsdate = date('d-m-Y', strtotime($sdate));
  $enums = $row['enums'];
  $verification = $row['verification'];
  $phone = $row['phone'];
  $address = $row['address'];
  $bfollowers = $row['followers'];
  $bfollowing = $row['following'];
  $desc = $row['business_description'];
  $business_industry = $row['business_industry'];
  $indust = "SELECT * FROM job_category WHERE id = '$business_industry'";
  $industres = mysqli_query($GLOBALS['conn'], $indust);
  $industryy = mysqli_fetch_assoc($industres);
  $industry = $industryy['job_category'];

  $location = $address;
  if ($verification == 1) {
    $verified = "<i class='fas fa-check-circle' style='color:blue;background:#fff;border-radius:50%;' aria-hidden='true'></i>";
  } else {
    $verified = "";
  }
  $name = $bname;

  $img_nums = "SELECT * FROM imgs WHERE uname = '$id' AND uid_type = '$type'";
  $result = mysqli_query($GLOBALS['conn'], $img_nums);
  $img_num = mysqli_num_rows($result);

  // $followers = "SELECT * FROM followers WHERE uname = '$tit'";

  // $following = "SELECT * FROM followers WHERE follower = '$tit'";
  $vid_nums = "SELECT * FROM videos WHERE uname = '$id' AND uid_type = '$type'";
  $result = mysqli_query($GLOBALS['conn'], $vid_nums);
  $vid_num = mysqli_num_rows($result);

  $posts = $img_num + $vid_num;
  $type = "business";
  $jt = "Jobs Posted By  You";

?>
  <section class="h-100 gradient-custom-2" style="margin-top:150px;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style=" background-image: url('./imgs/ban.jpg');background-size: cover;background-position: center; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style=" justify-content: space-between; width: 150px;">
                <img src="<?php echo $avatar; ?>" alt="avatar" class="rounded-circle" style=" width: 100%; height: 100%">
                <a href="edit_profile?u=<?php echo $_SESSION['bname']; ?>&t=<?php echo $_SESSION['type'] ?>&err=" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1; margin-top:100px;">
                  Edit profile
                </a>
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5 style="color:rgba(5,5,5,0.9);font-weight:900;background:rgba(255,255,255,0.3); padding:5px;font-faamily:ubuntu;backdrop"> <?php echo $bname . " " . $verified ?></h5>
                <p style="color:rgba(5,5,5,0.9);font-weight:900;background:rgba(255,255,255,0.3); padding:5px;font-faamily:ubuntu;backdrop"><?php echo $location; ?></p>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5"><?php echo $posts; ?></p>
                  <p class="small text-muted mb-0">Posts</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5"><?php echo $bfollowers ?></p>
                  <button type="button" class="mb-0 text-muted" data-bs-toggle="modal" data-bs-target="#bfollowers" style="border: transparent;padding: 0;font-size: 14px;background: #fff;font-weight:600;">
                    Followers
                  </button>
                </div>
                <div>
                  <p class="mb-1 h5"><?php echo $bfollowing ?></p>
                  <button type="button" class="mb-0 text-muted" data-bs-toggle="modal" data-bs-target="#bfollowing" style="border: transparent;padding: 0;font-size: 14px;background: #fff;font-weight:600;">
                    Following
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              <div class="mb-5">
                <!-- <p class="lead fw-normal mb-1">About</p> -->
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1"><b> </b></p>
                  <p class="font-italic mb-1">Based in<b> <?php echo $location; ?></b></p>
                  <p class="font-italic mb-0"> <b> <?php echo $desc; ?></b></p>
                  <p class="font-italic mb-1">Started on: <b> <?php echo $nsdate; ?></b></p>
                  <p class="font-italic mb-1">number of employees: <b> <?php echo $enums; ?></b></p>
                  <p class="font-italic mb-0">Working in <b> <?php echo $industry; ?></b> Industry</p>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- <p class="lead fw-normal mb-0">Recent photos</p> -->
                <!-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> -->
              </div>
              <?php
              echo "
                  <div class='d-flex justify-content-between align-items-center mb-4'>";
              // <p class='lead fw-normal mb-0'>Recent photos</p>";
              // echo 
              // <!-- <p class='mb-0'><a href='#!' class='text-muted'>Show all</a></p> -->
              echo "
                </div>
                
                  <ul class='nav' id='cont'>
                    <li class='navli'><a class='nava' aria-current='page' href='?u=$tit2&t=$type&sn=images#cont'>images</a></li>
                    <li class='navli'><a class='nava ' href='?u=$tit2&t=$type&sn=videos#cont'>Videos</a></li>
                    <li class='navli'><a class='nava' href='?u=$tit2&t=$type&sn=jobs#cont'>$jt</a></li>
                    <li class='navli'><a class='nava' href='?u=$tit2&t=$type&sn=your_courses#cont'>Your Courses</a></li>

                  </ul>
                
                </div>
                ";

              function business_img()
              {
                $q = $_GET['sn'];
                if ($q == "images"); {
                  $sql2 = "SELECT * FROM imgs WHERE uname = '$GLOBALS[id]' AND uid_type = '$GLOBALS[type]' ";
                  $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                  while ($row =  mysqli_fetch_assoc($result2)) {
                    $link = $row['link'];
                    $id = $row['id'];
                    // $uname = $row['uname'];
                    $ext = $row['ext'];
                    $name = $row['name'];
                    $date = $row['datetime'];
                    $ndate = date('d-m-Y', strtotime($date));
                    $caption = $row['caption'];
                    $likes = $row['likes'];
                    $comments = $row['comments'];
                    $uploader_avatar = $row['avatarlink'];
                    $uname = $row['uname'];




                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                      $lvc = "SELECT * FROM like_table WHERE liker = '$GLOBALS[tit2]' AND content_link = '$link'";
                      $lvc_result = mysqli_query($GLOBALS['conn'], $lvc);
                      $lvc_row = mysqli_fetch_assoc($lvc_result);
                      $lvc_count = mysqli_num_rows($lvc_result);
                      if ($lvc_count == 0) {
                        $lv = "Like";
                      } else {
                        $lv = "Unlike";
                      }
              ?>
                      <div class="card content">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                          <a href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">
                            <img src="<?php echo $link ?>" class="img-fluid content  " />

                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                          </a>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $name; ?></h5>
                          <h6>Uploaded on: <?php echo $ndate; ?></h6>
                          <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                          <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>
                          <h6 class="card-text"><?php echo $caption; ?></h6>
                          <a class="btn btn-primary" href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual&lv=<?php echo $lv; ?>">More Details</a>
                          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delimg">Delete</a>
                        </div>
                      </div>
                      <!-- The Modal -->
                      <div class="modal fade" id="delimg">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">IMAGE DELETION CONFIRMATION</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <p>ARE YOU SURE YOU WANT TO DELETE THIS IMAGE</p>
                              <form method="POST" action="delcon.php?u=<?php echo $GLOBALS['tit2']; ?>&link=<?php echo $link; ?>&ac=<?php echo "delimg"; ?>">
                                <input type="hidden" name="link" value="<?php echo $link; ?>">
                                <button style="color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-danger"> <i class="fa-solid fa-trash" aria-hidden="true"></i> DELETE IMAGE</button>

                              </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    <?php
                    }
                  }
                }
              }
              function business_vids()
              {
                $q = $_GET['sn'];
                if ($q == "videos"); {
                  $sql2 = "SELECT * FROM videos WHERE uname = '$GLOBALS[id]' AND uid_type = '$GLOBALS[type]' ";
                  $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                  while ($row =  mysqli_fetch_assoc($result2)) {
                    $link = $row['link'];
                    $id = $row['id'];
                    // $uname = $row['uname'];
                    $ext = $row['ext'];
                    $name = $row['name'];
                    $date = $row['datetime'];
                    $ndate = date('d-m-Y', strtotime($date));
                    $caption = $row['caption'];
                    $likes = $row['likes'];
                    $comments = $row['comments'];
                    $uploader_avatar = $row['avatarlink'];
                    $uname = $row['uname'];






                    if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {
                      $delvid = "delvid";
                    ?>
                      <div class="card content">
                        <div style="border:transparent!important;" class="bg-image hover-overlay ripple content" data-mdb-ripple-color="light">
                          <a href="vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">
                            <video class='img-fluid content' preload='metadata' controls>
                              <source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
                            </video>
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                          </a>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $name; ?></h5>
                          <h6>Uploaded on: <?php echo $ndate; ?></h6>
                          <h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
                          <h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>
                          <h6 class="card-text"><?php echo $caption; ?></h6>
                          <a class="btn btn-primary" href="vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">More Details</a>
                          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delvid">Delete</a>
                        </div>
                      </div>
                      <!-- The Modal -->
                      <div class="modal fade" id="delvid">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Video DELETION CONFIRMATION</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <p>ARE YOU SURE YOU WANT TO DELETE THIS VIDEO</p>
                              <form method="POST" action="delcon.php?u=<?php echo $GLOBALS['tit2']; ?>&link=<?php echo $link; ?>&ac=<?php echo $delvid; ?>">
                                <input type="hidden" name="link" value="<?php echo $link; ?>">
                                <button style="color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-danger"> <i class="fa-solid fa-trash" aria-hidden="true"></i> DELETE VIDEO</button>

                              </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    <?php
                    }
                  }
                }
              }
              function business_jobs()
              {
                $q = $_GET['sn'];
                if ($q == "jobs"); {
                  $sql2 = "SELECT * FROM jobs WHERE poster = '$GLOBALS[id]' ";
                  $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                  while ($row =  mysqli_fetch_assoc($result2)) {
                    $njname = $row['job_name'];
                    $jlink = $row['job_link'];
                    $poster = $row['poster'];
                    $date = $row['datetime'];
                    // $sdate = $row['sdate'];
                    $nsdate = date('d-m-Y', strtotime($date));
                    // $cletter = $row['cover_letter'];
                    $status = $row['status'];

                    $avlink = "SELECT avatarlink  FROM business WHERE id = '$poster' ";
                    $avlink2 = mysqli_query($GLOBALS['conn'], $avlink);
                    $avlink3 = mysqli_fetch_assoc($avlink2);
                    $avlink4 = $avlink3['avatarlink'];
                    $business_avatar = $avlink4;

                    $job_applies = "SELECT * FROM job_apply WHERE job_link = '$jlink' && poster = '$GLOBALS[tit2]' ";
                    $job_applies2 = mysqli_query($GLOBALS['conn'], $job_applies);
                    $job_applies3 = mysqli_num_rows($job_applies2);
                    $job_applies4 = $job_applies3;





                    ?>
                    <div class="card testimonial-card" style="max-width: 22rem;">

                      <!-- Background color -->
                      <div class="card-up indigo lighten-1"></div>

                      <!-- Avatar -->
                      <div class="avatar mx-auto white">
                        <img style="width:100%!important;" src="<?php echo $business_avatar; ?>">
                      </div>

                      <!-- Content -->
                      <div class="card-body">
                        <!-- Name -->
                        <h4 class="card-title"><?php echo $njname; ?></h4>
                        <hr>
                        <!-- Quotation -->
                        <p> applications<b> <?php echo $job_applies4; ?></b></p>

                        <p> Posted on: <b><?php echo $nsdate; ?></b></p>
                        <?php
                        if ($status == 0) {
                          $sta = "ONLINE";
                        }
                        if ($status == 1) {
                          $sta = "OFFLINE";
                        }

                        ?>
                        <div style="display:flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;align-items: flex-start;">
                          <p> Status: <b><?php echo $sta; ?></b></p>

                        </div>


                        <center><a href="job_dets.php?u=<?php echo $GLOBALS['tit2']; ?>&t=<?php echo $_SESSION['type']; ?>&jl=<?php echo $jlink ?>"><button class="btn btn-primary" type="submit">More Details</button></a></center>

                      </div>

                    </div>

              <?php


                  }
                }
              }
              ?>
              <?php

              function business_your_courses()
              {
                $ycsr = 0;
              ?>
                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-light">
                    <tr>
                      <th>Sr.No</th>
                      <th>Course Title</th>
                      <th>Upload_Time</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q = $_GET['sn'];
                    if ($q == "your_courses"); {
                      $sql2 = "SELECT * FROM course   WHERE uploader = '$GLOBALS[id]' and uploader_type = '$GLOBALS[type]' ";
                      $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                      $resnumm = mysqli_num_rows($result2);
                      if ($resnumm > 0) {



                        while ($row =  mysqli_fetch_assoc($result2)) {
                          $cname = $row['course_name'];
                          // $clink = $row['clink'];
                          $date = $row['datetime'];
                          $cid = $row['course_id'];

                    ?>


                          <tr>
                            <td>
                              <?php echo $ycsr = $ycsr + 1; ?>

                            </td>
                            <td>
                              <?php echo $cname; ?>
                            </td>
                            <td>
                              <?php echo $date; ?>
                            </td>
                            <td>
                              <a href="course_details?u=<?php echo $GLOBALS['tit2']; ?>&type=<?php echo $GLOBALS['type']; ?>&cid=<?php echo $cid; ?>">
                                <button type="button" class="btn btn-success btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                  Deatils
                                </button>
                              </a>
                            </td>
                          </tr>

                        <?php

                        } ?>
                  </tbody>
                </table>
          <?php
                      } else {
                        echo "<center><h3> No Courses Uploaded Yet</h3></center>";
                      }
                    }
                  }
          ?>
          <div class="row g-2 d-flex flex-column justify-content-start align-items-center">
            <div class=" d-flex flex-column justify-content-start align-items-center">
              <?php
              if ($_GET['sn'] == "images") {
                business_img();
              }

              if ($_GET['sn'] == "videos") {
                business_vids();
              }
              if ($_GET['sn'] == "jobs") {
                business_jobs();
              }
              if ($_GET['sn'] == "your_courses") {
                business_your_courses();
              }


              ?>
            </div>
            <!-- <div class="col mb-2">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp" alt="image 1" class="w-100 rounded-3">
                    </div> -->
          </div>
          <!-- <div class="row g-2">
                    <div class="col">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp" alt="image 1" class="w-100 rounded-3">
                    </div>
                    <div class="col">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp" alt="image 1" class="w-100 rounded-3">
                    </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- The Modal -->
  <div class="modal" id="bfollowers">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Followers of <?php echo $GLOBALS['tit2']; ?></h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <ul class="list-group list-group-light list-group-numbered">
            <?php
            $id = $_SESSION['id'];

            $flf = "SELECT * FROM follower WHERE following = '$GLOBALS[id]' AND following_uid ='$type' order by RAND()";

            $flfres = mysqli_query($GLOBALS['conn'], $flf);
            $flfcount = mysqli_num_rows($flfres);
            if ($flfcount > 0) {
              while ($flfass = mysqli_fetch_assoc($flfres)) {
                $uname = $flfass['follower'];
                $uuid = $flfass['follower_uid'];
                if ($uuid == "individual") {
                  $csl2 = "uname";
                }
                if ($uuid == "business") {
                  $csl2 = "bname";
                }
                $sql = "SELECT * FROM $uuid WHERE id = '$uname' ";
                echo $sql;
                $result = mysqli_query($GLOBALS['conn'], $sql);
                $row0 = mysqli_fetch_assoc($result);

                $avatar  = $row0['avatarlink'];
                $follower = $row0['followers'];
                $followig = $row0['following'];
                if ($cls2 = "individual") {
                  $un = $row0['uname'];
                } else if ($cls2 = "business") {
                  $un = $row0['bname'];
                }

            ?>

                <li style="list-style:none;border:1px solid grey;margin:20px;padding-top:15px;padding-bottom:10px;" class="d-flex justify-content-between align-items-start">
                  <div style="width:20%!important;display:flex; justify-content:space-between;" class=" ms-2 me-auto">
                    <div class="fw-bold">
                      <img style="width:40px;" src="<?php echo $avatar; ?>" alt="">

                    </div>
                    <div class="fw-bold">

                      <p style="margin-left:20px;margin-top:5px;"><?php echo $un;
                                                                  ?></p>
                    </div>


                  </div>
                  <div>
                    <a href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&vt=<?php echo $uuid; ?>&sn=">
                      <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                    </a>
                  </div>
                  <!-- <span class="badge badge-primary rounded-pill">14</span> -->
                </li>
              <?php
              }
              ?>
          </ul>
        </div>
      </div>
    </div>

  </div>

<?php

            }
            if ($flfcount <= 0) {
              echo $sql;
              echo "<center><h3> No followers yet</h3></center>";
            }
            ?> </div> <?php
          }
?>



<!-- The Modal -->
<div class="modal" id="bfollowing">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $GLOBALS['tit2']; ?> Follows:</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php

        $flf = "SELECT * FROM follower WHERE follower = '$GLOBALS[id]' AND follower_uid = '$type' order by RAND()";
        $flfres = mysqli_query($GLOBALS['conn'], $flf);
        $flfcount = mysqli_num_rows($flfres);
        if ($flfcount > 0) {
          while ($flfass = mysqli_fetch_assoc($flfres)) {
            $uname = $flfass['following'];
            $uuid = $flfass['following_uid'];
            if ($uuid == "individual") {
              $csl2 = "uname";
            }
            if ($uuid == "business") {
              $csl2 = "bname";
            }

            $sql = "SELECT * FROM $uuid WHERE id = '$uname'";
            // echo $sql;
            $result = mysqli_query($GLOBALS['conn'], $sql);
            $row0 = mysqli_fetch_assoc($result);

            $avatar  = $row0['avatarlink'];
            $follower = $row0['followers'];
            $followig = $row0['following'];


            if ($cls2 = "individual") {
              $un = $row0['uname'];
            } else if ($cls2 = "business") {
              $un = $row0['bname'];
            }




        ?>

            <li style="list-style:none;border:1px solid grey;margin:20px;padding-top:15px;padding-bottom:10px;" class="d-flex justify-content-between align-items-start">
              <div style="width:20%!important;display:flex; justify-content:space-between;" class=" ms-2 me-auto">
                <div class="fw-bold">
                  <img style="width:40px;" src="<?php echo $avatar; ?>" alt="">

                </div>
                <div class="fw-bold">

                  <p style="margin-left:20px;margin-top:5px;"><?php echo $un;
                                                              ?></p>
                </div>


              </div>
              <div>
                <a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&vt=<?php echo $uuid; ?>&sn=">
                  <button style="margin-right:10px!important;" type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">View Profile</button>
                </a>
              </div>
              <!-- <span class="badge badge-primary rounded-pill">14</span> -->
            </li>
          <?php
          }
          ?>
          </ul>
      </div>
    </div>
  </div>

</div>

<?php

        }
        if ($flfcount <= 0) {
          $view = $GLOBALS['tit2'];
          echo "<center><h3>$view DON'T FOLLOW ANYONE.</h3></center>";
        }

?>
</div>




</div>
</div>
</div>
<?php


?>
<?php
if ($_SESSION['type'] == 'individual') {
  individual();
  // individual_img();
}
if ($_SESSION['type'] == 'business') {
  business();
}



?>

<script>
  <?php

  if ($_GET['msg'] != "") {
  ?>
    alert("<?php echo $_GET['msg']; ?>");
  <?php
  }
  ?>
</script>
</div>
<?php //require 'footer.php';
?>
</body>

</html>