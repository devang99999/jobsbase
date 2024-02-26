<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL DASHBORD</title>
    <style>
      .table{
       
        color: #ffffff!important;
        background-color: #212529!important;
        width:90% !important;
        margin:auto !important;
        margin: bottom 30px !important;;
      }
      .adash{
        text-align: center;
    position: sticky;
    top: 0.1px;
    background: #212529;
    opacity: 0.95;
    padding-top: 11px;
    padding-bottom: 11px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    text-decoration: underline
      }
      .info{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        align-content: center;
        color: #ffffff!important;
        background-color: #212529!important;
        width:90% !important;
        margin:auto !important;
     
      }
      .card{
        color: #ffffff!important;
        background-color: #212529!important;
        width:30% !important;
        margin:auto !important;
      }
      .list-group,.list-group-flush,.list-group-item{
        color: #ffffff!important;
        background-color: #212529!important;
      }
      .list-group-item{
        border:1px solid #ffffff!important;

      }
      #tab1{
        display:none;
      }
    </style>
</head>
<body style = "background-color:#6a11cb; color:#ffffff">
    <h1 class="adash"> ADMIN DASHBOARD </h1>
    
    <?php
    session_start();
//     if(!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !==true)
// {
//     header("location: admin_login.php");
// }
    require 'config.php';
    require 'boot.php';
    
  echo "<center> <u><h2> ADMINS</h2></u></center>";
  $sql = "SELECT * FROM admin_db ";
  $result = mysqli_query($conn, $sql); 

 echo"    <table id='tab1'class='table table-bordered'>
     <thead>
    <tr>
      <th style='text-align:center;width:20%;'>ID</th>
      <th style='text-align:center;width:20%;'>NAME</th>
      <th style='text-align:center;width:20%;'>ADMIN ASSCEES ID</th>
      <th style='text-align:center;width:20%;'>ACCESS LEVEL</th>
      <th style='text-align:center;width:20%;'>ACCESS SINCE</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      $adid = $row['id'];
      $admin_name = $row['name'];
      $admin_uname = $row['uname'];
      $admin_level = $row['admin_level'];
      $admin_datetime = $row['datetime'];
      
echo"
      <tr>
      <td><center>$adid</center></td>
      <td><center>$admin_name</center></td>
      <td><center>$admin_uname</center></td>
      <td><center>$admin_level</center></td>
      <td><center>$admin_datetime</center></td>
    </tr>
  </thead>
  <tbody>";
    
    }
  echo "</tbody>
</table>";
    

$vquery = "SELECT * FROM videos";
$vresult = mysqli_query($conn, $vquery);

$video_rows = mysqli_num_rows($vresult);

$bquery = "SELECT * FROM business";
$bresult = mysqli_query($conn, $bquery);

$b_rows = mysqli_num_rows($bresult);


$iquery = "SELECT * FROM individual";
$iresult = mysqli_query($conn, $iquery);

$i_rows = mysqli_num_rows($iresult);

$imquery = "SELECT * FROM individual";
$imresult = mysqli_query($conn, $imquery);

$im_rows = mysqli_num_rows($imresult);

$jquery = "SELECT * FROM jobs";
$jresult = mysqli_query($conn, $jquery);
$j_rows = mysqli_num_rows($jresult);

$liquery = "SELECT * FROM like_table";
$liresult = mysqli_query($conn, $liquery);

$li_rows = mysqli_num_rows($liresult);


?>
<div  class="info">
<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Total Vidoes uploaded :  <?php echo $video_rows;?></li>
    <li class="list-group-item">Total Business Registered : <?php echo $b_rows;?> </li>
    <li class="list-group-item">Total Individuals Registeres : <?php echo $i_rows;?></li>
  </ul>
</div>
<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="table table-bordered list-group-item">Total Images Uploaded : <?php echo $im_rows;?></li>
    <li class="table table-bordered list-group-item">Total Jobs Posted : <?php echo $j_rows;?></li>
    <li class="table table-bordered list-group-item">Total Vidoes Liked : <?php echo $li_rows;?></li>
  </ul>
</div>

</div>
   <?php
   
   echo "<center> <u><h2> Business 
   <button id = 'bu2' type='button' class='btn btn-dark'><i style='margin-top:5px;' class='fa-solid fa-angle-down'></button></i></button></h2></u></center>";
   $sql = "SELECT * FROM business ";
   $result = mysqli_query($conn, $sql); 
 
  echo"    <table id='tab2' class='table table-bordered'>
      <thead>
     <tr>
       <th style='text-align:center;width:20%;'>ID</th>
       <th style='text-align:center;width:20%;'>bname</th>
       <th style='text-align:center;width:20%;'>oname ID</th>
       <th style='text-align:center;width:20%;'>ACCESS LEVEL</th>
       <th style='text-align:center;width:20%;'>ACCESS SINCE</th>
       <th style='text-align:center;width:20%;'>oname ID</th>
       <th style='text-align:center;width:20%;'>oname ID</th>
       <th style='text-align:center;width:20%;'>oname ID</th>
       <th style='text-align:center;width:20%;'>oname ID</th>
       <th style='text-align:center;width:20%;'>oname ID</th>
     </tr>";
     while ($row = mysqli_fetch_assoc($result)) {
       $bid = $row['id'];
       $bname = $row['bname'];
       $boname = $row['oname'];
       $avatar = $row['avatarlink'];
       $enums = $row['enums'];
       $bdesc = $row['business_description'];
        $bemail = $row['email'];
        $bphone = $row['phone'];
        $btype = $row['business_industry'];
        $sdate = $row['sdate'];
        $city = $row['city'];
        $state = $row['state'];
        $country = $row['country'];
        $verification = $row['verification'];
        $bdatetime = $row['datetime'];


       
 echo"
       <tr>
       <td><center>$bid</center></td>
       <td><center>$banme</center></td>
       <td><center>$boname</center></td>
       <td><center>$avatar</center></td>
       <td><center>$bdesc</center></td>
       <td><center>$bemail</center></td>
       <td><center>$bphone</center></td>
       <td><center>$btype</center></td>
       <td><center>$sdate</center></td>
       <td><center>$city</center></td>
       <td><center>$stete</center></td>
       <td><center>$country</center></td>
       <td><center>$verification</center></td>
       <td><center>$datetimee</center></td>
     </tr>
   </thead>
   <tbody>";
     
     }
   echo "</tbody>
 </table>";
   ?>
</body>
</html>