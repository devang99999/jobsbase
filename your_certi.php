<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JOB DETAILS</title>
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

      ?>
       <div style="margin-top:150px!important;" class="container">
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
          }
          else if ($jstat == 1) {
            $jstat = "inreview";
          }
          else if ($jstat == 2) {
            $jstat = "hidden";
          }
          else if ($jstat == 3) {
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
            <td><a href="job_dets.php?u=<?php echo $tit2;?>&t=<?php echo $type;?>&jl=<?php echo $jl;?>&e=t">Change status</a></td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php 
if ($japp >0 ) {
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
          while($jslqr = mysqli_fetch_array($jslq)){
          $sr+=1;
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
            <td><?php echo $fname." ".$lname; ?></td>
            <td><a href="profile_view.php?u=<?php echo $tit2;?>&t=<?php echo $type;?>&view=<?php echo $applier;?>&vt=individual&sn="><?php echo $uname;?></a></td>
            <td><?php echo $cletter; ?></td>
            <td><a href="<?php echo $resumelink; ?>">View Resume</a></td>
            <td><a href="mailto:<?php echo $email; ?>"><?php echo $email;?></a></td>
            <td><a href="tel:<?php echo $phone; ?>"><?php echo $phone;?></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
      <?php

}
else{
  echo "<center><h3>No applicants yet</h3></center>";
}
    
   ?>
</body>
</html>