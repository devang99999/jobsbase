<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="l3.ico" type="image/x-icon">
    <title>Document</title>
    <style>
      body{
        font-family: 'ubuntu',sans-serif!important;
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
    @session_start();
    require 'config.php';
    require 'boot.php';
    
    if (!empty($_SESSION['bname'])) {
      $tit = $_SESSION['oname'];
      $tit2 = $_SESSION['bname'];
      $type = "business";
      $id = $_SESSION['id'];
  }
  if (!empty($_SESSION['uname'])) {
      $tit = $_SESSION['fname'];
      $tit2 = $_SESSION['uname'];
      $type = "individual";
      $id = $_SESSION['id'];
  }
    
    ?>
    <div class="maindiv">
        <div class="fomdiv1">
            <form action="" method="GET" class="login ">
 
 <legend class="legend">VERIFY CERTIFICATE</legend>
 <div class="input">
   <input name="cid" type="text" placeholder="ENTER CERTIFICATE NUMBER" required/>
   <span><i class="fa fa-lock"></i></span>
 </div>
  
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">Verify</button>
            <?php

           
if(@$_GET['cid']!= "")
{
  @$cid = $_GET['cid'];
  $ccename = "SELECT * FROM certificate WHERE certificate_id = '$cid'";
  $ccename2 = mysqli_query($conn, $ccename);
  $ccename3 = mysqli_num_rows($ccename2);
  $ccename4 = mysqli_fetch_assoc($ccename2);
  @$comtime = $ccename4['datetime'];
  @$jid = $ccename4['joiner_id'];  
  if($ccename3 <= 0){
    echo "<center><h1>INVALID CERTIFICATE</h1></center>";
   
}
else{
  
$joisel = "SELECT * FROM joiner_table WHERE joiner_id= '$jid'";
$joisel2 = mysqli_query($conn, $joisel);
$joisel3 = mysqli_num_rows($joisel2);

    while($jorow = mysqli_fetch_assoc($joisel2))
    {
        $jid= $jorow['joiner_id'];
        $cid = $jorow['course_id'];
        $cer_id = $jorow['certificate_id'];
        $juname = $jorow['joiner_uname'];
        $jotype = $jorow['joiner_type'];
        $uuname = $jorow['uploader_uname'];
        $uutype = $jorow['uploader_type'];  
        $video = $jorow['video_count'];
        $completion_count = $jorow['completion_count'];
        $date = $jorow['datetime'];


        $cconame = "SELECT * FROM course WHERE course_id = '$cid'";
        $cconame2 = mysqli_query($conn, $cconame);
        $cconame3 = mysqli_num_rows($cconame2);
        $cconame4 = mysqli_fetch_assoc($cconame2);
        @$coname = $cconame4['course_name'];

       
        $uunfet = "SELECT * FROM $uutype WHERE id= '$uuname'";
        $uunfet2 = mysqli_query($conn, $uunfet);
        $uunfet3 = mysqli_num_rows($uunfet2);
        $uunfet4 = mysqli_fetch_assoc($uunfet2);
       
        if($uutype == "business"){
            $upluname = $uunfet4['bname'];
        }
        if($uutype == "individual"){
            $upluname = $uunfet4['uname'];
        }
        $joifet = "SELECT * FROM $jotype WHERE id= '$juname'";
        
        $joifet2 = mysqli_query($conn, $joifet);
        $joifet3 = mysqli_num_rows($joifet2);
        $joifet4 = mysqli_fetch_assoc($joifet2);
        if($jotype == "individual"){
            $joiuname = $joifet4['uname'];
            $joifname = $joifet4['fname'];
            $joilname = $joifet4['lname'];
        }

       ?>
       <div style="margin-top:20px;" class="card text-center">
  <div class="card-body">Valid Certificate</div>
  <div class="card-body">
  <h5 class="card-title"><?php echo $joifname ." " .$joilname;?></h5>
    <p class="card-text">Has Completed <b> <?php echo $coname ;?> </b> course Uploaded By <b> <?php echo $upluname;?></b></p>
  </div>
  <div class="card-body">Completed on <b> <?php echo $comtime;?></b></div>
  <a href="feed?u=<?php echo $tit2 ;?>&type=<?php echo $type;?>" class="btn btn-primary">Go to Home Page</a>
</div>
       <?php

      }
    }
}
?>



  </h3>

</form>
        </div>
    </div>

    
    

 
    
</body>
</html>