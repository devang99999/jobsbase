<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <style>
    body{
      background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;
       background-size: cover;
    }
    .maindiv{
      height:10vh;
      width: 80%;
      /* background-color: #f5f5f5; */
      /* display: flex;
      justify-content: center;
      align-items: stretch;
      flex-wrap: wrap;*/
      
      align-content: center; 
      margin:auto;
    }
    .cendiv{
      margin-top:100px;
      
    }
  </style>
</head>
<body>
  <?php
  require "config.php";
  require "boot.php";
  require "vnav.php";
  ?>

  <div class="maindiv">
    <div class="cendiv">
    <center><h1 class="mb-5">LOGIN TO YOUR ACCOUNT</h1></center>
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Login as Individual</h5>
        <p class="card-text">can apply for jobs chat with hirers and see and upload courses and get certified and like and comment on posts</p>
        <a href="indlog.php?error_message=" class="btn btn-primary">Login as Individual</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Business login</h5>
        <p class="card-text">Can hire peolple manage profile upload course and like and comment on others posts</p>
        <a href="busilog.php?error_message" class="btn btn-primary">Login as Business</a>
      </div>
    </div>
  </div>
</div>
</div>
  </div>

  
</body>
</html>