<?php require "boot.php";?>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
    <link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">
    <style>
  /* // Set background image (pattern) */

* {
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    /* border-bottom:1px solid red; */
    /* overflow-x: hidden; */
}

html,
body {
    width: 100%;
    height: 100%;
    background: url(https://subtlepatterns.com/patterns/sativa.png) repeat fixed;
    font-family: "Open Sans", sans-serif;
    font-weight: 200;
    font-family:'ubuntu',sans-serif!important;
    /* overflow-y: hidden; */
    /* background-image:url('back1.jpg'); */
  }
  .maindiv{
    /* background-image:url('back1.jpg'); */
    height:max-content;
    /* background-size: cover; */
    /* background-position: center; */
    /* opacity: 0.5; */
    /* filter: brightness(50%); */
  }
  .bimgdiv{
    background-image:url('./imgs/bi2.jpg');
    height:100vh;
    background-size: cover;
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
    filter: brightness(20%);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    /* height: 100%; */
    z-index: 0!important;
  }
  /* // Start styles in form */
  
  .login {
    width: 350px;
    display: flex;
    margin: -150px auto 0 auto;
    /* background: #fff; */
    border-radius: 14px;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    align-items: stretch;
    justify-content: center;
    /* box-shadow: rgba(0, 0, 0, 0.9) 0px 30px 90px; */
    background: #fff;
    padding-bottom: 20px;
    padding: auto;
    padding-left: 10px;
    padding-right:10px;
    /* border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px transperent; */
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
    border-radius:0 0 14px 14px;
  }
  
  .input {
    position: relative;
    width: 90%;
    margin: 15px auto;
    
  }
   .input span{
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
      left: 77%;
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
      border: 1px solid;
  /* padding: 10px; */
  box-shadow: 5px 10px transperent;
  
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
    opacity: 1;
    width: 95%;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    align-content: center;
    height:max-content;
    margin-left:5%;
    filter: brightness(100%);
    
  }
  .fordiv1{
    margin-top:160px;
   
  }
  
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
.maindiv2{
    height: 250px;
    width: 100%;
    background-color: #00000009;
    margin-top: 30px;
}
.bind{
  display: flex;
    width: 90%;
    margin: auto;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
}
.signinbut{
  border-bottom-left-radius: 0px!important;
  border-bottom-right-radius: 0px!important;
  margin-top:20px; margin-bottom:-20px!important;
  background-color:#0a58ca!important; 
  font-size:25px!important;
  width:300px!important;
  border-top-left-radius: 14px;
  border-top-right-radius: 14px
}
#sec2{
  display:none;
}
@media only screen and (max-width: 900px) {
  .login {
    width: 300px;
    display: flex;
    margin: -150px auto 0 auto;
    /* background: #fff; */
    border-radius: 14px;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    align-items: stretch;
    justify-content: center;
    /* box-shadow: rgba(0, 0, 0, 0.9) 0px 30px 90px; */
    background: #fff;
    /* padding-bottom: 20px; */
    padding: auto;
    padding-left: 10px;
    padding-right:10px;
    /* border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px transperent; */
  }
  .signinbut{
    width: 250px!important;
  }
  #sec2{
  display:none!important;
}
}
@media only screen and (max-width: 750px) {
  .login {
    width: 300px;
    display: flex;
    margin: -150px auto 0 auto;
    /* background: #fff; */
    border-radius: 14px;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    align-items: stretch;
    justify-content: center;
    /* box-shadow: rgba(0, 0, 0, 0.9) 0px 30px 90px; */
    background: #fff;
    /* padding-bottom: 20px; */
    padding: auto;
    padding-left: 10px;
    padding-right:10px;
    /* border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px transperent; */
  }
  .signinbut{
    width: 250px!important;
  }
  .bind {
    display: flex;
    width: 90%;
    margin: auto;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}
  #sec1{
    display:none!important;
  }
  #sec2{
    display:block!important;
  }
}
</style>


    
</head>
<body id="body">
     <?php
    require "config.php";
    require "boot.php";
    require "vnav.php";
    echo"<br>";
      ?>
      <section id="sec1">
  <div id="bgdiv" class="bimgdiv"></div>
  <div class="maindiv">
    <div class="fordiv">
        <h1 style="color:#8f5849;font-weight:100;font-family:'poppins',san-sarif;">Welcome the Platform Where You can   <span id="element"></span></h1>
        <div class="bind">
        <div class="fordiv1">
          <form action="ind_log.php" method="Post" class="login "> 
          <center><legend class="legend">INDIVIDUAL LOGIN</legend></center>
            <!-- <legend class="legend">Login</legend> -->
            <div class="input">
              <input name="uname" type="text" placeholder="Username" value="web.devang"required />
              <span><i class="fa fa-envelope-o"></i></span>
            </div>
            <div class="input">
              <input id="pass" name="password" type="password" placeholder="Password" value="password" required /><button id="hide"  onclick="hidee()" class="btn btn-info" type="button">Show</button>
              <span><i class="fa fa-lock"></i></span>

          </div>
          <span style="margin-top:0px; text-align:left; font-size:18px;"><a style="text-decoration:none;color:#0d6efd; font-weight:100;" href="forget_password?fp=ind">Forgot Password ?</a></span>
          <span style="margin-left:0px;margin-top:10px;font-size:16px;">New To LERRNED ? <a style="text-decoration:none;color:#0a66c2;" href="register">Sign up</a></span>
          <center><a href="feed.php"><button   type="submit" class=" signinbut btn btn-primary">Sign in</button></a></center>
            <!-- <div class="feedback">
              login successful <br />
              redirecting...
            </div> -->
          </form>
        </div>
        <div class="fordiv1">
          <form action="busi_log.php" method="Post" class="login "> 
            <center><legend class="legend">Business Login</legend></center>
            <div class="input">
              <input name="bname" type="text" placeholder="Username" required value="jobsbase" />
              <span><i class="fa fa-envelope-o"></i></span>
            </div>
            <div class="input">
              <input id="passw" name="password" type="password" placeholder="Password" required value="password" /><button id="hidee"  onclick="hideee()" class="btn btn-info" type="button">Show</button>
              <span><i class="fa fa-lock"></i></span>

          </div>
          <span style="margin-top:0px; text-align:left; font-size:18px;"><a style="text-decoration:none;color:#0d6efd; font-weight:100;" href="forget_password?fp=bus">Forgot Password ?</a></span>
          <span style="margin-left:0px;margin-top:10px;font-size:16px;">New To LERRNED ? <a style="text-decoration:none;color:#0a66c2;" href="register.php">Sign up</a></span>
            <center><a href="ind_log.php?error_message="><button type="submit" class="signinbut btn btn-primary">Sign in</button></a></center>
            <!-- <div class="feedback">
              login successful <br />
              redirecting...
            </div> -->
          </form>
        </div>
      </div>
    </div>  
  </div>
</section>
<section id="sec2">
  <div id="bgdiv" class="bimgdiv"></div>
  <div class="maindiv2 mx-auto">
    <!-- <h1 style="color:#8f5849;font-weight:100;font-family:'poppins',san-sarif;z-index:999!important;">Welcome the Platform Where You can Learn <br> Get Certified and Get Hired at One Platform</h1> -->
    <div class="cendiv mx-auto">
  <div class="column mx-auto">
  <div class="" style="width:85%; margin:auto;">
    <div class="card" style="margin-bottom:20px!important">
      <div class="card-body">
        <center><h5 class="card-title"><b>Login as Individual</b></h5></center>
        <p style="font-size:16px!important;" class="card-text">can apply for jobs chat with hirers and see and upload courses and get certified and like and comment on posts</p>
        <center><a style="width:80%!important" href="indlog.php?error_message=" class="btn btn-primary">Login as Individual</a></center>
      </div>
    </div>
  </div>
  <div class="" style="width:85%; margin:auto;">
    <div class="card">
      <div class="card-body">
      <center><h5 class="card-title"><b>Login as Business</b></h5></center>
        <p style="font-size:16px;" class="card-text">Can hire peolple manage profile upload course and like and comment on others posts</p>
        <center><a style="width:80%!important" href="busilog.php?error_message=" class="btn btn-primary">Login as Business</a></center>
      </div>
    </div>
  </div>
</div>
</div>
  </div>

  
</section>
    
    <script src="index.js"></script>
    <script>
      // function hide(){
      // //  document.getElementById("pass");
      //   if (document.getElementById("pass")input.type === "password") {
      //     document.getElementById("pass")input.type = "text";
      //   } else {
      //     document.getElementById("pass")input.type = "password";
      //   }
      // }
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
function hideee() {
  var a = document.getElementById("passw");
  if (a.type === "password") {
    a.type = "text";
  } else {
    a.type = "password";
  }
  var b = document.getElementById("hidee");
  if(b.innerHTML === "Show"){
    b.innerHTML = "Hide";

  }
  else{
    // document.getElementById("hide").innerHTML == "Hide";
    y.innerHTML = "Hide";
  }
}
 function bgddiv() {
  document.getElementById("body").style.height == document.getElementById("body").style.height;
}


bgddiv();

</script>
<!-- type js scripts -->|
       <script>
    var typed = new Typed('#element', {
      strings: ['<b>Learn</b>.', '<b>Get Certified</b>.', '<b>Get Jobs</b>.',' AND <b>Give Jobs</b>.',' Learn <br> Get Certified and Get Hired at One Platform'],
      // Learn <br> Get Certified and Get Hired at One Platform
      typeSpeed: 30,
    });
  </script>
  <!-- type js scripts -->|
</body>
</html>