<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    function business()
    {


?>
  
<?php

        $sql2 = "SELECT * FROM job_apply WHERE application_id = '$_GET[aid]' && poster = '$GLOBALS[tit2]'";
        $result2 = mysqli_query($GLOBALS['conn'], $sql2);
        while ($row =  mysqli_fetch_assoc($result2)) {
            $jname = $row['job_name'];
            $jlink = $row['job_link'];
            $poster = $row['poster'];
            $applier  = $row['applier_name'];
            $applier_id = $row['application_id'];
            $auname  = $row['applier'];
            $date = $row['datetime'];
            $nsdate = date('d-m-Y', strtotime($date));
            $cletter = $row['cover_letter'];
            $status = $row['status'];

            if ($status == 0) {

                $sta = "ACTIVE";
            }
            if ($status == 1) {

                $sta = "REJECTED";
            }
            if ($status == 2) {

                $sta = "ACCEPTED";
            }
            if ($status == 3) {

                $sta = "CLOSED";
            }
            if ($status > 3) {
                $sta = "Aw Snap Something Went Wrong";
            }
            $resume_link = $row['resume_link'];

            $avlink = "SELECT *  FROM individual WHERE uname = '$auname' ";
            $avlink2 = mysqli_query($GLOBALS['conn'], $avlink);
            $avlink3 = mysqli_fetch_assoc($avlink2);
            $aemail = $avlink3['email'];
            $aphone = $avlink3['phone'];
            $ains = $avlink3['institute'];
            $avatarlink = $avlink3['avatarlink'];
            $acourse = $avlink3['course'];
            $adate = $avlink3['datetime'];
            $nsadate = date('d-m-Y', strtotime($adate));
            $asyear = $avlink3['syear'];
            $aeyear = $avlink3['eyear'];
            $alocation = $avlink3['city']. "," .$avlink3['state'] .",". $avlink3['country'];

            $sr = 0;

           ?>

<center>
            <section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;border-right: 3px solid #f1f1f1!important;">
              <img src="<?php echo $avatarlink; ?>"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                <p class="fw-bold mb-1"><u><a style="color:black;" href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&t=business&v=<?php echo $auname; ?>"><?php echo $applier; ?></a></u></p>
                <p style="color:#000"> <?php echo "Studying At :"." ". "<b>".  $ains. "</b>"; ?></p>
                <p style="color:#000"> <?php echo "Studies:"." ". "<b>".  $acourse ." (".$asyear." - ". $aeyear.")</b>"; ?></p>
                <p style="color:#000"> <?php echo "Applied on:"." ". "<b>".  $nsdate ."</b>"; ?></p>
                <p style="color:#000"> <?php echo "Based in:"." ". "<b>".  $alocation ."</b>"; ?></p>
                <!--  -->
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Applicant Details</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $aemail?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"> <?php echo $aphone?></p>
                  </div>
                </div>
                <h6>Technical Details</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Resume</h6>
                   
                    <a href="<?php echo $resume_link;?>">Download Resume</a>
                  </div>
                  
                  <div class="col-6 mb-3">
                    <h6>Current Application Status:<b> <?php  echo $sta;?></b></h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"> Change Status</button>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>JobsBase Certificates</h6>
                   
                    <a href="<?php echo $resume_link;?>">View</a>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>On JobsBase</h6>
                   
                   <?php echo "Since:<b>" . $nsadate . "</b>";?>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
            <br>
            
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">CHANGE APPLICATIION STATUS</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="input">
                                    <!-- <span><i style="margin-top: 28px;" class="fa-regular fa-calendar-days"></i> -->
                                    <label for="ch_status" style="color :#000;">Current Status :<?php echo $sta; ?></label>
                                    <select name="ch_status" class="form-select" required aria-label="Default select example">
                                        <option value="active" selected>Active</option>
                                        <option value="reject">Reject</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="close">Close</option>
                                    </select>
                                </div>
                                <a href="job_dets.php?u=<?php echo $GLOBALS['tit2']; ?>&t=business"><button style="margin-top: 10px!important;" data-bs-dismiss="modal" type="submit" class="btn btn-primary">Change</button></a>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                        </div>

                    </div>
                </div>
            </div>
            <?php
            @$chstatus = $_POST['ch_status'];
            // echo $chstatus;
            if ($chstatus == "active" || $chstatus == "reject" || $chstatus == "close" || $chstatus == "selected") {
                if ($chstatus == "active") {

                    echo $applier_id;
                    $stupdate = "UPDATE job_apply SET status = 0 WHERE application_id = '$applier_id'";
                    mysqli_query($GLOBALS['conn'], $stupdate);
                    $sta = "ACTIVE";
                }
                if ($chstatus == "reject") {

                    echo $applier_id;
                    $stupdate = "UPDATE job_apply SET status = 1 WHERE application_id = '$applier_id'";
                    mysqli_query($GLOBALS['conn'], $stupdate);
                    $sta = "REJECTED";
                }
                if ($chstatus == "close") {

                    echo $applier_id;
                    $stupdate = "UPDATE job_apply SET status = 3 WHERE application_id = '$applier_id'";
                    mysqli_query($GLOBALS['conn'], $stupdate);
                }
                if ($chstatus == "accepted") {

                    echo $applier_id;
                    $stupdate = "UPDATE job_apply SET status = 2 WHERE application_id = '$applier_id'";
                    mysqli_query($GLOBALS['conn'], $stupdate);
                }
            }

            ?>

    <?php
        }
    }
    ?>




<?php

function individual()
{
    // echo $_GET['u'];
    // echo $_GET['jl'];
   $sql2 = "DELETE FROM job_apply WHERE job_link = '$_GET[jl]' && application_id = '$_GET[aid]'";
    $result2 = mysqli_query($GLOBALS['conn'], $sql2);
    $upd = "UPDATE jobs SET no_of_applicants = no_of_applicants - 1 WHERE job_link = '$_GET[jl]'";
    $res = mysqli_query($GLOBALS['conn'], $upd);
    // while($row2 = mysqli_fetch_assoc($result2)){
    //     $applier_id = $row2['application_id'];
    //     echo $applier_id;
    // }
    // header("Location: job_dets.php?u=$_GET[u]&t=individual");?>
    <script>
       window.location.href = 'profile.php?u=<?php echo$_GET['u'];?>&t=individual&sn=jobs#cont';
    </script>
   <?php






}
?>

    <?php

    if ($_SESSION['type'] == "business") {
        business();
    }
    if ($_SESSION['type'] == "individual") {
        individual();
    }
    ?>

</body>

</html>