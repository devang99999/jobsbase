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
            background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;
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
    ?>
    <?php function chat(){
        @require 'config.php';
        if (!empty($_SESSION["bname"])) {
            @$tit = $_SESSION["oname"];
            @$tit2 = $_SESSION["bname"];
            @$type = "business";
            @$id = $_SESSION["id"];
        }
        if (!empty($_SESSION["uname"])) {
            @$tit = $_SESSION["fname"];
            @$tit2 = $_SESSION["uname"];
            @$type = "individual";
            @$id = $_SESSION["id"];
        }
        ?>
    <div class="maindiv">
        <div class="fomdiv1">
            <form action="report_back?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=chat" method="post" class="login ">
 
 <legend class="legend">REPORT CONTENT</legend>
 <div class="input">
    <label for="issue">DESCRIBE YOUR ISSUS HERE</label>
   <textarea rows="5" cols="35" name="issue" type="text" placeholder="DESCRIBE YOUR ISSUS HERE" required>

   </textarea>
   <input type="hidden" name="chatid" value="<?php echo $_GET['cid']?>">
 </div>
 <div class="input">
      <center>  <p> REPORT TYPE:&nbsp<b></TYPE:b><?php echo strtoupper($_GET['rep'])?></b></p></center>
            </div>
           
            <button type="submit" id="fom1" class="btn btn-primary" value="SUBMIT">SUBMIT</button>
            <?php

           


    }

?>
    <?php function comment(){
      @require 'config.php';
      if (!empty($_SESSION["bname"])) {
          @$tit = $_SESSION["oname"];
          @$tit2 = $_SESSION["bname"];
          @$type = "business";
          @$id = $_SESSION["id"];
      }
      if (!empty($_SESSION["uname"])) {
          @$tit = $_SESSION["fname"];
          @$tit2 = $_SESSION["uname"];
          @$type = "individual";
          @$id = $_SESSION["id"];

      }
      $comid = $_GET['comid'];
      ?>
  <div class="maindiv">
      <div class="fomdiv1">
          <form action="report_back?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=comment&comid=<?php echo $comid;?>" method="post" class="login ">

<legend class="legend">REPORT CONTENT</legend>
<div class="input">
  <label for="issue">DESCRIBE YOUR ISSUS HERE</label>
 <textarea rows="5" cols="35" name="issue" type="text" placeholder="DESCRIBE YOUR ISSUS HERE" required>
   
   </textarea>
   <input type="hidden" name="comid" value="<?php echo $_GET['comid']?>">
  </div>
  
<div class="input">
    <center>  <p> REPORT TYPE:&nbsp<b></TYPE:b><?php echo strtoupper($_GET['rep'])?></b></p></center>
          </div>
         
          <button type="submit" id="fom1" class="btn btn-primary" value="SUBMIT">SUBMIT</button>
          <?php

         


  }
?>


<?php function video(){
      @require 'config.php';
      if (!empty($_SESSION["bname"])) {
          @$tit = $_SESSION["oname"];
          @$tit2 = $_SESSION["bname"];
          @$type = "business";
          @$id = $_SESSION["id"];
      }
      if (!empty($_SESSION["uname"])) {
          @$tit = $_SESSION["fname"];
          @$tit2 = $_SESSION["uname"];
          @$type = "individual";
          @$id = $_SESSION["id"];

      }
      $link = $_GET['link'];
      ?>
  <div class="maindiv">
      <div class="fomdiv1">
          <form action="report_back?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=video&link=<?php echo $link;?>" method="post" class="login ">

<legend class="legend">REPORT CONTENT</legend>
<div class="input">
  <label for="issue">DESCRIBE YOUR ISSUS HERE</label>
 <textarea rows="5" cols="35" name="issue" type="text" placeholder="DESCRIBE YOUR ISSUS HERE" required>
   
   </textarea>
   <input type="hidden" name="link" value="<?php echo $_GET['link']?>">
  </div>
  
<div class="input">
    <center>  <p> REPORT TYPE:&nbsp<b></TYPE:b><?php echo strtoupper($_GET['rep'])?></b></p></center>
          </div>
         
          <button type="submit" id="fom1" class="btn btn-primary" value="SUBMIT">SUBMIT</button>
          <?php

         


  }
?>


<?php function user(){
      @require 'config.php';
      if (!empty($_SESSION["bname"])) {
          @$tit = $_SESSION["oname"];
          @$tit2 = $_SESSION["bname"];
          @$type = "business";
          @$id = $_SESSION["id"];
      }
      if (!empty($_SESSION["uname"])) {
          @$tit = $_SESSION["fname"];
          @$tit2 = $_SESSION["uname"];
          @$type = "individual";
          @$id = $_SESSION["id"];

      }
      // $link = $_GET['link'];
      ?>
  <div class="maindiv">
      <div class="fomdiv1">
          <form action="report_back?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=user" method="post" class="login ">

<legend class="legend">REPORT CONTENT</legend>
<div class="input">
  <label for="issue">DESCRIBE YOUR ISSUS HERE</label>
 <textarea rows="5" cols="35" name="issue" type="text" placeholder="DESCRIBE YOUR ISSUS HERE" required>
   
   </textarea>
   <!-- <input type="hidden" name="link" value="<?php echo $_GET['link']?>"> -->
  </div>
  
<div class="input">
    <center>  <p> REPORT TYPE:&nbsp<b></TYPE:b><?php echo strtoupper($_GET['rep'])?></b></p></center>
          </div>
         
          <button type="submit" id="fom1" class="btn btn-primary" value="SUBMIT">SUBMIT</button>
          <?php

         


  }
?>




<?php function course(){
      @require 'config.php';
      if (!empty($_SESSION["bname"])) {
          @$tit = $_SESSION["oname"];
          @$tit2 = $_SESSION["bname"];
          @$type = "business";
          @$id = $_SESSION["id"];
      }
      if (!empty($_SESSION["uname"])) {
          @$tit = $_SESSION["fname"];
          @$tit2 = $_SESSION["uname"];
          @$type = "individual";
          @$id = $_SESSION["id"];

      }
      // $link = $_GET['link'];
      ?>
  <div class="maindiv">
      <div class="fomdiv1">
          <form action="report_back?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=course" method="post" class="login ">

<legend class="legend">REPORT CONTENT</legend>
<div class="input">
  <label for="issue">DESCRIBE YOUR ISSUS HERE</label>
 <textarea rows="5" cols="35" name="issue" type="text" placeholder="DESCRIBE YOUR ISSUS HERE" required>
   
   </textarea>
   <input type="hidden" name="link" value="<?php echo $_GET['link']?>">
  </div>
  
<div class="input">
    <center>  <p> REPORT TYPE:&nbsp<b></TYPE:b><?php echo strtoupper($_GET['rep'])?></b></p></center>
          </div>
         
          <button type="submit" id="fom1" class="btn btn-primary" value="SUBMIT">SUBMIT</button>
          <?php

         


  }
?>

<?php function img(){
      @require 'config.php';
      if (!empty($_SESSION["bname"])) {
          @$tit = $_SESSION["oname"];
          @$tit2 = $_SESSION["bname"];
          @$type = "business";
          @$id = $_SESSION["id"];
      }
      if (!empty($_SESSION["uname"])) {
          @$tit = $_SESSION["fname"];
          @$tit2 = $_SESSION["uname"];
          @$type = "individual";
          @$id = $_SESSION["id"];

      }
      $link = $_GET['link'];
      ?>
  <div class="maindiv">
      <div class="fomdiv1">
          <form action="report_back?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=img&link=<?php echo $link;?>" method="post" class="login ">

<legend class="legend">REPORT CONTENT</legend>
<div class="input">
  <label for="issue">DESCRIBE YOUR ISSUS HERE</label>
 <textarea rows="5" cols="35" name="issue" type="text" placeholder="DESCRIBE YOUR ISSUS HERE" required>
   
   </textarea>
   <input type="hidden" name="link" value="<?php echo $_GET['link']?>">
  </div>
  
<div class="input">
    <center>  <p> REPORT TYPE:&nbsp<b></TYPE:b><?php echo strtoupper($_GET['rep'])?></b></p></center>
          </div>
         
          <button type="submit" id="fom1" class="btn btn-primary" value="SUBMIT">SUBMIT</button>
          <?php

         


  }
?>



<?php

    if($_GET['rep'] == "chat")
    {
        chat();
    }
    if($_GET['rep'] == "comment")
    {
        comment();
    }
    if($_GET['rep'] == "video")
    {
        video();
    }
    if($_GET['rep'] == "user")
    {
        user();
    }
    if($_GET['rep'] == "course")
    {
        course();
    }
    if($_GET['rep'] == "img")
    {
        img();
    }
?>

</form>
        </div>
    </div>
    </script>
    <?php require 'footer.php' ;?>
</body>
</html>