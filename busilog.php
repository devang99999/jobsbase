<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="l3.ico" type="image/x-icon">
    <title>BUSINESS LOGIN</title>
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
            background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;
       background-size: cover;
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
    require 'config.php';
    require 'boot.php';
    include 'vnav.php';
    ?>
    <div class="maindiv">
        <div class="fomdiv1">
            <form action="busi_log.php" method="post" class="login ">
 
 <legend class="legend">Business LOGIN</legend>
 <div class="input">
   <input name="bname" type="text" placeholder="Business name/Company name" required value="jobsbase" />
   <span><i class="fa fa-lock"></i></span>
 </div>
 <div class="input">
              <input  id="pass" name="password" type="password" placeholder="Password" required value="password" /><button id="hide" onclick="hidee()" class="btn btn-info" type="button"> Show</button>
              <span><i class="fa fa-lock"></i></span>

            </div>
            <span style="margin-left:10px;margin-top:0px;font-size:16px;"><a style="text-decoration:none;color:#0a66c2;" href="forget_password?fp=bus">Forgot Password ?</a></span>
            <span style="margin-left:10px;margin-top:10px;font-size:16px;">New To LERRNED ? <a style="text-decoration:none;color:#0a66c2;" href="register.php">Sign up</a></span>
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">SUBMIT</button>
            <?php

if( $_GET['error_message'])
{?>
<h3 id="error" >
  <?php echo "error:". $_GET['error_message'];
  ?>
  </h3>

<?php
}


?>


</form>
        </div>
    </div>

    <script>
      var error= document.getElementById("error");
      if(error.length !==0){
        alert(error.innerHTML);
      }
           function hidee() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var y = document.getElementById("hide");
  if(y.innerHTML === "Show"){
    y.innerHTML = "Hide";

  }
  else{
    // document.getElementById("hide").innerHTML == "Hide";
    y.innerHTML = "Hide";
  }
}
    </script>
    
</body>
</html>