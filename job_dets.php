<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JOB DETAILS</title>
  <style>
    .iimmg {
      width: 100%;
    }

    @media screen and (max-width: 800px) {
      .iimmg {
        width: 20% !important;
      }

      p {
        margin-bottom: 0.5rem !important;
      }
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
    @$cls = "bname";
  }

  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$cls = "uname";
  }

  $jl = $_GET['jl'];


  function business()
  {
    @session_start();
    @require 'config.php';
    if (!empty($_SESSION['bname'])) {
      @$tit = $_SESSION['oname'];
      @$tit2 = $_SESSION['bname'];
      @$type = "business";
      @$cls = "bname";
    }

    if (!empty($_SESSION['uname'])) {
      @$tit = $_SESSION['fname'];
      @$tit2 = $_SESSION['uname'];
      @$type = "individual";
      @$cls = "uname";
    }

    $jl = $_GET['jl'];
  ?>
    <div style="margin-top:150px!important; background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;" class="container">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <!-- <th>SR</th> -->
              <th>Job Name</th>
              <th>date posted</th>
              <th>Start Date</th>
              <th>Application Last date</th>
              <th>No of Applicants</th>
              <th>Status</th>
              <th>Edit</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $jsl = "SELECT * FROM jobs WHERE job_link = '$jl'";
            $jslq = mysqli_query($conn, $jsl);
            $jslqr = mysqli_fetch_array($jslq);
            $jname = $jslqr['job_name'];
            $jdate = $jslqr['datetime'];
            $jstart = $jslqr['sdate'];
            $jlast = $jslqr['application_edate'];
            $japp = $jslqr['no_of_applicants'];
            $jstat = $jslqr['status'];

            if ($jstat == 0) {
              $jstat = "Active";
            } else if ($jstat == 1) {
              $jstat = "inreview";
            } else if ($jstat == 2) {
              $jstat = "hidden";
            } else if ($jstat == 3) {
              $jstat = "inactive";
            }

            ?>
            <tr>
              <!-- <td>1</td> -->
              <td><?php echo $jname; ?></td>
              <td><?php echo $jdate; ?></td>
              <td><?php echo $jstart; ?></td>
              <td><?php echo $jlast; ?></td>
              <td><?php echo $japp; ?></td>
              <td><?php echo $jstat; ?></td>
              <td><a href="job_dets.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&jl=<?php echo $jl; ?>&e=t">Change status</a></td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <?php
    if ($japp > 0) {
      # code...

    ?>
      <center>
        <h3>APPLICANTS DETAILS</h3>
      </center>
      <div style="margin-top:15px!important;" class="container">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>SR</th>
                <th>Applier</th>
                <th>User name</th>
                <th>Cover Letter</th>
                <th>resume</th>
                <th>email</th>
                <th>phone</th>


              </tr>
            </thead>
            <tbody>
              <?php
              $jsl = "SELECT * FROM job_apply WHERE job_link = '$jl'";
              $jslq = mysqli_query($conn, $jsl);
              $sr = 0;
              while ($jslqr = mysqli_fetch_array($jslq)) {
                $sr += 1;
                $jname = $jslqr['job_name'];
                $applier = $jslqr['applier'];
                $resumelink = $jslqr['resume_link'];
                $cletter = $jslqr['cover_letter'];
                $jdate = $jslqr['datetime'];
                $als = "SELECT * FROM individual WHERE id = '$applier'";
                $alsq = mysqli_query($conn, $als);
                $alsqr = mysqli_fetch_array($alsq);
                $fname = $alsqr['fname'];
                $lname = $alsqr['lname'];
                $email = $alsqr['email'];
                $phone = $alsqr['phone'];
                $uname = $alsqr['uname'];


              ?>
                <tr>
                  <!-- <td>1</td> -->
                  <td><?php echo $sr; ?></td>
                  <td><?php echo $fname . " " . $lname; ?></td>
                  <td><a href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&view=<?php echo $applier; ?>&vt=individual&sn="><?php echo $uname; ?></a></td>
                  <td><?php echo $cletter; ?></td>
                  <td><a href="<?php echo $resumelink; ?>">View Resume</a></td>
                  <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                  <td><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php

    } else {
      echo "<center><h3>No applicants yet</h3></center>";
    }
  }





  if (@$_GET['e'] == "t") {
    $jsl = "SELECT * FROM jobs WHERE job_link = '$jl'";
    $jslq = mysqli_query($conn, $jsl);
    $jslqr = mysqli_fetch_array($jslq);
    $jstat = $jslqr['status'];
    if ($jstat == 0) {
      $jstat = 3;
    } else if ($jstat == 3) {
      $jstat = 0;
    } else {
      echo "<script>alert('Status change failed');</script>";
    }
    $jsl = "UPDATE jobs SET status = '$jstat' WHERE job_link = '$jl'";
    $jslq = mysqli_query($conn, $jsl);
    if ($jslq) {
      echo "<script>alert('Status changed successfully');</script>";
      echo "<script>window.location.href='job_dets.php?jl=$jl';</script>";
    } else {
      echo "<script>alert('Status change failed');</script>";
      echo "<script>window.location.href='job_dets.php?jl=$jl';</script>";
    }
  }


  function individual()
  {
    $jsl = "SELECT * FROM jobs WHERE job_link = '$GLOBALS[jl]'";
    $jslq = mysqli_query($GLOBALS['conn'], $jsl);
    $row2 = mysqli_fetch_array($jslq);

    @$id = $row2['id'];
    @$jname = $row2['job_name'];
    @$jlink  = $row2['job_link'];
    @$poster = $row2['poster'];
    @$salary = $row2['salary'];
    @$jtype = $row2['job_type'];
    // $jops = $row2['no_of_hires'];
    @$jdesc = $row2['job_description'];
    @$jloc = $row2['job_location'];
    @$jops = $row2['no_of_openings'];
    @$phone = $row2['phone_number'];
    @$email = $row2['email'];
    // $noes = $row2['no_of_employees'];
    @$sdate = $row2['sdate'];
    @$jstatus = $row2['status'];
    @$datetime = $row2['datetime'];
    @$avatarlink = $row2['avatarlink'];
    $ee = "<div class='bgdiv my-container'> errkjwbwhkjbthkh</div><br>";
    $apll = "SELECT * FROM job_apply WHERE job_link = '$jlink' AND applier = '$id'";

    $applres = mysqli_query($GLOBALS['conn'], $apll);
    $appln = mysqli_num_rows($applres);
    if ($appln > 0) {
      $apply = "<p class='btn btn-success'>ALREADY APPLIED</p>";
    } else {
      $apply = "<a href='job_apply?jl=$jlink'class='btn btn-primary'>APPLY</a>";
    }
    $bloc2 = "SELECT * FROM business WHERE id = '$poster'";
    $result = mysqli_query($GLOBALS['conn'], $bloc2);
    while ($row = mysqli_fetch_assoc($result)) {
      $baddress = $row['address'];
      $bn = $row['bname'];
      // global $avatarlink;
      // echo "text <br>";
    ?>
      <section class="vh-100 bgdiv" style="overflow-y: auto!important;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img class="iimmg" src="<?php echo $avatarlink; ?>" alt="Avatar" class="img-fluid my-5" />
                    <h5 style="color:#000;"><?php echo $bn; ?></h5>
                    <p style="color:#000;"><?php echo $baddress; ?></p>
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
                          <p class="text-muted"><?php echo $sdate; ?></p>
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
                      <?php echo $apply; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  <?php
      //  echo $ee;
    }
  }


  if ($type == "business") {
    business();
  } else if ($type == "individual") {
    individual();
  }
  ?>
</body>

</html>