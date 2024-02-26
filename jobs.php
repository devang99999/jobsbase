
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">

  
  <title id="titl">JOBS FROM BUSINESS YOU FOLLOW</title>
  <style>
    body {
      font-family: 'ubuntu', sans-serif !important;
      background-color: #f5f5f5!important;
    }
    .bgdiv {
        background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;
       background-size: cover;
      /* position: relative; */
      filter: brightness(90%);
      /* position: absolute;
      top: 0;
      left: 0; */
      width: 100%;
     height: 100%;
      z-index: -10 !important;

    }

    .maindiv {
      /* height: 100vh; */
      width: 100%;
      /* background-color: #f5f5f5; */
      display: flex;
      justify-content: center;
      align-items: stretch;
      flex-wrap: wrap;
      align-content: center;
      height: 100vh;
      padding-bottom: 20px;
    }

    .fomdiv1 {
      width: 100%;
      display: block;

    }

    .login {
      position: relative;
      top: 150px;
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
      width: 50%;
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
      width: 50% !important;
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
      /* position:relative;
    top:200px; */
    }

    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 48
    }
    .iimmg{
      width: 100%;
    }
    @media screen and (max-width: 800px)
    {
      .iimmg{
        width: 20%!important;
      }
      p{
        margin-bottom: 0.5rem!important;
      }
    }
  </style>

</head>

<body class="bgimg">
<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  ?>
  <script>
    document.location = "login";
  </script>
  <?php
}
require 'config.php';
require 'boot.php';
require 'nav.php';

if (empty($_SESSION['avatar'])) {
  $avatar = "./imgs/noimage.png";
}
if ($_SESSION['verification'] == 1) {
  $validate = ' <img style="height:15px; width:15px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
} else {
  $validate = "";
}
$x = 1;
$fname = "";
$oname = "";
if (!empty($_SESSION['fname'])) {
  $put = $_SESSION['fname'];
  $uname = $_SESSION['uname'];
  $type = $_SESSION['type'];
}
if (!empty($_SESSION['oname'])) {
  $put = $_SESSION['oname'];
  $uname = $_SESSION['bname'];
  $type = $_SESSION['type'];
}
$poss = $uname;
?>

  <?php function business()
  {
    // code to be executed;
  ?>
    <div style="width:100%;margin:auto;" class="maindiv bgdiv">
      <div class="fomdiv1" style="width:30%;">
        <form action="jobs_2.php" method="post" class="login ">

          <legend style="margin:auto!important;" class="legend ">POST A JOB</legend>
          <div class="input">
            <input name="jname" type="text" placeholder="Job name" required />
            <span><i class="fa fa-lock"></i></span>
          </div>
          <div class="input">
          <label for="job_category" style="color :#000;">Job Category*</label>
          <select required  style="width:100%;" id="category" onchange="dropChange()" name="category">
  <option value="">Choose a category</option>
  <?php
  // Establish a database connection
  $conn = mysqli_connect("localhost", "root", "" ,"project");

  // Check if the connection is successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve the course categories from the database
  $sql = "SELECT * FROM  job_category ";
  
  $result = mysqli_query($conn, $sql);

  // Generate the dropdown options
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option  value='" . $row['id'] ."'>" . $row['job_category'] . "</option>";
     
    }
  }
  ?>
</select>
          </div>
          <button style="margin:auto!important;padding:2px;" type="submit" name="submit" id="fom1" class="btn btn-primary submit" value="Login">SUBMIT</button>
        </form>
      </div>
    </div>
    <div class="bgdiv my-container"> </div>
  <?php
  }
  function individual()
  {
    
    // code to be executed;
    // echo "individual";
    @require 'config.php';
    @require 'boot.php';
    if (!empty($_SESSION['fname'])) {
      $tit = $_SESSION['fname'];
      $tit2 = $_SESSION['uname'];
      $type = $_SESSION['type'];
      $id = $_SESSION['id'];
    }
    if (!empty($_SESSION['oname'])) {
      $put = $_SESSION['oname'];
      $tit2 = $_SESSION['bname'];
      $type = $_SESSION['type'];
    
      $id = $_SESSION['id'];
    }

  ?>




<h2 style="text-align:center;margin-top:130px;"> OPENNINGS FROM BUSINESS YOU FOLLOW</h2>
    <?php
    $folse = "SELECT * FROM follower WHERE follower = '$id' AND follower_uid = '$type' AND following_uid = 'business'";
    $resul = mysqli_query($conn, $folse);
    $fol = mysqli_num_rows($resul);
    // echo "fol = $fol". "<br>";
    if($fol > 0){
   while( $row = mysqli_fetch_assoc($resul)) 
    {
    $view = $row['following'];
    $view_uid = $row['following_uid'];
    // echo "view = $view". "<br>";
      $tes = "SELECT * FROM jobs WHERE ( poster = '$view') AND status < '2'"; 
      $resullt = mysqli_query($conn, $tes);
      $num = mysqli_num_rows($resullt);
    //  echo "num = $num". "<br>";
      while ($row2 = mysqli_fetch_assoc($resullt)) {

        // @$id = $row2['id'];
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
        
        $applres = mysqli_query($conn, $apll);
        $appln = mysqli_num_rows($applres);
        if($appln > 0){
          $apply = "<p class='btn btn-success'>ALREADY APPLIED</p>";
        }else{
          $apply = "<a href='job_apply?jl=$jlink' class='btn btn-primary'>APPLY</a>";
        }
        $bloc2 = "SELECT * FROM business WHERE id = '$poster'";
        $result = mysqli_query($conn, $bloc2);
      while  ($row = mysqli_fetch_assoc($result)){
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
                  <div class="col-md-4 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img class="iimmg" src="<?php echo $avatarlink;?>"
                      alt="Avatar" class="img-fluid my-5"/>
                    <h5 style="color:#000;"><?php echo $bn;?></h5>
                    <p style="color:#000;"><?php echo $baddress;?></p>
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
                      <?php echo $apply;
                      ?>
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
    }
    }
    if($fol <= 0){?>
      <div style="min-height:100vh;" class="container">
        <div style="position:relative;top:30vh;" class="row">
          <div class="col-md-12">
            <h2 style="text-align:center;">NO OPENNINGS IN BUSINESS YOU FOLLOW</h2>
           <center><a style="border-bottom:1px solid blue;" href="search?u=<?php echo $tit2;?>&t=<?php echo $type;?>&se=jobs">
           GO TO JOB SEARCH →
          </a></center>
          </div>
        </div>
      </div>
    <?php
    }?>
    <div class="bgdiv my-container"> </div><?php
  }

  // echo $_SESSION['type'];
  if ($_SESSION['type'] == 'business') {
    business();
    $uname = $_SESSION['bname'];

    ?>
    <footer>
      <?php
      // require 'footer.php';
      ?>
    </footer>
  <?php


  }
  if ($_SESSION['type'] == 'individual') {
    individual();

    $uname = $_SESSION['uname'];
    $type = $_SESSION['type'];
  ?>
    <footer>
      <?php
      // require 'footer.php';
      ?>
    </footer>
  <?php

  }
  
  if (@$_GET['err'] != '') {
    ?><script>


alert("<?php echo @$_GET['err']; ?>");
    </script><?php
 }



 require 'footer.php';
  ?>

  <script>
    <?php if( @$_GET['mes'] !=""){?>
    alert("<?php echo @$_GET['mes']; ?>");
    <?php }?>
  </script>

</body>

</html>