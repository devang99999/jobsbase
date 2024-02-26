<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="l3.ico" type="image/x-icon">
    <title>INDIVIDUAL LOGIN</title>
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
    function busind(){
    session_start();
    require 'config.php';
    
    @require  "config.php";
     require "hnav.php";
     
     
     $ver = $_GET['ver'];
     $status = $_GET['status'];
     ?>
    <div class="maindiv">
        <div class="fomdiv1">
            <form action="" method="post" class="login ">
 
 <legend class="legend">CHANGE STATUS</legend>
 <div class="input">
    <label for="status">STATUS</label>
   <input name="status" type="text" placeholder="status" required value="<?php echo $status?>"/>
   
 </div>
 <div class="input">
    <label for="verification">VERIFICATION</label>
              <input id="pass" name="verifcation" type="text" placeholder="Password" value="<?php echo $ver;?>"  />
              

            </div>
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">SUBMIT</button>
            <?php

           

if( @$_GET['err'])
{?>
<h3 id="error">
  <?php echo "error:". @$_GET['err'];
  ?>
  </h3>

<?php
}

?>

</form>
        </div>
    </div>  
    
    
    <?php

if ($_GET['tab'] == 'business') {
    $tabl = 'business';
}
else if ($_GET['tab'] == 'individual') {
    $tabl = 'individual';
}
    @$status2 = $_POST['status'];
    @$ver2 = $_POST['verifcation'];
    @$bname = $_GET['uname'];
    @$upd = "UPDATE `$tabl` SET `status` = '$status2' , `verification` = '$ver2' WHERE `id` = '$bname'";
    @$res = mysqli_query($conn,$upd);
    if($res)
    {
      ?>
      <script>
        alert("STATUS UPDATED");
        window.location.href = "index?tab=<?php echo $tabl;?>";
      </script>
      <?php
    }
    else
    {
        ?>
        <script>
          alert("SOME ERROR OCCURED");
          window.location.href = "index?tab=<?php echo $tabl;?>";
        </script>
        <?php
    }
}



function status(){
    session_start();
    require 'config.php';
    
    @require  "config.php";
     require "hnav.php";
     
     
    //  $ver = $_GET['ver'];
     $status = $_GET['status'];
     ?>
    <div class="maindiv">
        <div class="fomdiv1">
            <form action="" method="post" class="login ">
 
 <legend class="legend">CHANGE STATUS</legend>
 <div class="input">
    <label for="status">STATUS current status= <?php echo $status?></label>
   <input name="status" type="text" placeholder="status" required />
   
 </div>
 
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">SUBMIT</button>
            <?php

           

if( @$_GET['err'])
{?>
<h3 id="error">
  <?php echo "error:". @$_GET['err'];
  ?>
  </h3>

<?php
}

?>

</form>   
        </div>
    </div>  
    
    
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # code...

$table = $_GET['tab'];    
if($table == 'certificate')
{
    $sele = "certificate_id";
    $tabl = "certificate";


}
else if($table == 'imgs')
{
    $sele = "link";
    $tabl = "imgs";


}
else if($table == 'video')
{
    $sele = "link";
    $tabl = "videos";


}
else if($table == 'comment')
{
    $sele = "comment_id";
    $tabl = "comment_table";


}

else if($table == 'chat')
{
    $sele = "chat_id";
    $tabl = "chat";


}
else if($table == 'jobs')
{
    $sele = "job_link";
    $tabl = "jobs";


}
   
      
@$status2 = $_POST['status'];
    // @$ver2 = $_POST['verifcation'];
    @$bname = $_GET['cerid'];
    @$upd = "UPDATE `$tabl` SET `status` = '$status2'  WHERE `$sele` = '$bname'";
    @$res = mysqli_query($conn,$upd);
    if($res)
    {
      ?>
      <script>
        alert("STATUS UPDATED");
        window.location.href = "index?tab=<?php echo $table;?>";
      </script>
      <?php
    }
    else
    {
        ?>
        <script>
          alert("SOME ERROR OCCURED");
          window.location.href = "index?tab=<?php echo $table;?>";
        </script>
        <?php
    }
}

}

if(@$_GET['tab'] == 'business' || @$_GET['tab'] == 'individual')
{
    busind();
}
else{
    status();
}
    ?>
</body>
</html>