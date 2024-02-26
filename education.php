<?php
        session_start();
    require "config.php";
    require "boot.php";
    require "nav.php";

    if (!empty($_SESSION['bname'])) {
        @$tit = $_SESSION['oname'];
        @$tit2 = $_SESSION['bname'];
        @$type = "business";
        @$id = $_SESSION['id'];
      }
      if (!empty($_SESSION['uname'])) {
        @$tit = $_SESSION['fname'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
        @$id = $_SESSION['id'];
      }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>EDUCATION DETAILS</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="log.css"> -->
<style>
  /* // Set background image (pattern) */

  body{
        font-family: 'ubuntu',sans-serif!important;
      }
        .maindiv{
            height: 100vh;
            width: 100%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: stretch;
            flex-wrap: wrap;
            align-content: center;
          }
          .fomdiv1{
            width: 100%;
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
    /* height:70vh; */
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    margin-top: 150px;
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

</style>
</head> 
<body style="background:#f5f5f5";>
  <div class="fordiv">
      <div class="fordiv2">
        <!-- <form action="pro/signup.php" method="post" class="login "> -->
 
          <legend class="legend">ADD EDUCATION</legend>
        <form class="login" action="education_back?u=<?php echo $tit2; ?>&t=<?php echo $type;?>" enctype="multipart/form-data"  method="post">
 <div class="input">
   <input name="cname" type="text" placeholder="College Name*"  />
   <span> <i class="fa-solid fa-pen-to-square"></i>
</span>
 </div>

 <div class="input">
   <input name="dname" type="text" placeholder="Degree Name*" required />
   <span><i class="fa-solid fa-pen-to-square"></i>
</span>
 </div>
 <div class="input">
   <input name="cgpa" type="text" min="4" max="10" placeholder="CGPA OUT OF 10" required />
   <span><i class="fa-solid fa-pen-to-square"></i>
</span>
 </div>

 <div class="input">
 <label for="comyear" style="color :#000;">DEGREE COMPLETION DATE*</label>
   <input  name="comyear" type="date" placeholder="School/College/Univetsity name*" required />
   
 </div>

 <a src ="index.php"><button type="submit" class="btn btn-primary">SUBMIT</button></a>
 <?php if( @$_GET['err'])
{?>
<h5 id="error" >
  <?php echo "error:". @$_GET['err'];
  // echo $_POST['country'];
  ?>
  </h5>

<?php
}
?>
</form>
    </div>
  </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/fc006f18de.js" crossorigin="anonymous"></script>
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
    document.getElementById("hide2").innerHTML == "Hide";
    y.innerHTML = "Hide";
  }
}
function hidee2() {
  var x2 = document.getElementById("pass2");
  if (x2.type === "password") {
    x2.type = "text";
  } else {
    x2.type = "password";
  }
  var y2 = document.getElementById("hide2");
  if(y2.innerHTML === "Show"){
    y2.innerHTML = "Hide";

  }
  else{
    document.getElementById("hide2").innerHTML == "Hide";
    y2.innerHTML = "Hide";
  }
}
    </script>
    
<?php require 'footer.php' ;?>
</body>
</html>