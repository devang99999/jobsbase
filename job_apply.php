<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Apply</title>
    <style>
      body{
        font-family: 'ubuntu',sans-serif!important;
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
        .maindiv{
            height: 100vh;
            width: 100%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            align-content: center;
        }
        .fomdiv1{
            width: 350px;
            display:block;
            
        }
        .login {
            position: relative;
            top: 50%;
            width:100%;
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
    text-align: center!important;
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
      top:  10px;
      font-size: 20px;
      padding: 0 0 1px 1px;
      background-color:transparent !important;
      border:0px !important;


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
    width: 20%!important;
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
  .fordiv{
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    align-content: center;
    position:relative;
    top:200px;
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
    session_start();
    require 'config.php';
    require 'boot.php';
    include 'nav.php';


      $name = $_SESSION['fname']." ".$_SESSION['lname'];
      $edu = $_SESSION['edu'];
      $uname = $_SESSION['uname'];
      $id = $_SESSION['id'];


    $jlink = $_GET['jl'];
    $sql = "SELECT * FROM jobs WHERE job_link = '$jlink'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jname = $row['job_name'];
    $poster = $row['poster'];
    @$type = $_GET['t'];


    ?>
     <div class="maindiv bgdiv">
        <div class="fomdiv1">
            <form action="jobs_back.php?u=<?php echo $uname;?>&t=<?php echo $type;?>&jl=<?php echo $jlink;?>" method="post" class="login"  enctype='multipart/form-data'>
 
 <legend class="legend">Apply for job</legend>
 <div class="input">
   <input name="auname" type="text" placeholder="Username" required value="<?php echo $uname;?>"/>
   <span><i class="fa fa-lock"></i></span>
 </div>
 <!-- <div class="input"> -->
   <input name="jlink" type="hidden" placeholder="" required value="<?php echo $jlink;?>"/>
   <input name="jname" type="hidden" placeholder="" required value="<?php echo $jname;?>"/>
   <input name="poster" type="hidden" placeholder="" required value="<?php echo $poster;?>"/>
   <input name="uid" type="hidden" placeholder="" required value="<?php echo $id;?>"/>

   <!-- <span><i class="fa fa-lock"></i></span> -->
 <!-- </div> -->
 <div class="input">
    <label for="fileInput">Resume Upload</label>
    <input type="file" class="form-control-file" id="fileInput" name="file"/>
  </div>

 <div class="input">
   <textarea rows="3" cols="37" name="cletter" type="text" placeholder="" required value="">
   </textarea>
   <span><i class="fa fa-lock"></i></span>
 </div>
 
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">SUBMIT</button>

</form>
        </div>
    </div>
<?php

require 'footer.php';
?>
</body>
</html>