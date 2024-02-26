<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     require "vnav.php";
     require "boot.php";
    require "config.php";
 }
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
     require "nav.php";
     require "boot.php";
     require "config.php";
 }
//  require "vnav.php";
//  require "nav.php";
//  require "boot.php";
 
 echo"<center class='mb-5'><h1><u>OUR TEAM</u></h1></center>";
   
   $sql = "SELECT * FROM admin_db";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result))
   {
       $name = $row['name'];
       $email = $row['email'];
       $phone = $row['phone'];
       $avatar = $row['avatarlink'];
       $since = $row['datetime'];
       $level = $row['admin_level'];
       $linkdein = $row['linkedin'];
       $github = $row['github'];
       $website = $row['website'];
       $instagram = $row['instagram'];
       $desc = $row['description'];


       // echo "
       //   <table class='table table-striped table-hover'>
       //     <tr>
       //       <td><img src='$avatar' alt='avatar' style='width:50px; height:50px; border-radius:50%;'></td>
       //       <td>$name</td>
       //       <td>$since</td>
       //       <td>$level</td>
       //     </tr>
       // ";
       ?>
       <div class="card mb-5" style="max-width: 540px;">
 <div class="row g-0">
   <div class="col-md-4">
     <img
       src="<?php echo $avatar ;?>"
       alt="Trendy Pants and Shoes"
       class="img-fluid rounded-start"
     />
     <small class="">Level <?php echo $level;?> admin</small> <br>
     <small class="">Since <?php echo $since;?>  </small>
   </div>
   <div class="col-md-8">
     <div class="card-body">
       <h5 class="card-title"><?php echo $name;?></h5>
       <p class="card-text">
        <?php        
        echo $desc."<br>";?>
        <br>
       Email:<u><a style = "color:#000;" href="mailto:<?php echo $email;?>"><?php echo $email."<br>";?></a></u>
       <br>
       Phone:<u><a style = "color:#000;" href="tel:<?php echo $phone;?>"><?php echo $phone."<br>";?></a></u>
       <div class="d-flex justify-content-evenly">
        <u><a style = "font-size :18px;" href="<?php echo $website;?>"><br><i class="fa-solid fa-globe"></i></a></u>
        <u><a style = "font-size :18px;" href="<?php echo $github;?>"><br><i class="fa-brands fa-github"></i></a></u>
        <u><a style = "font-size :18px;" href="<?php echo $linkdein;?>"><br><i class="fa-brands fa-linkedin"></i></a></u>
        <u><a style = "font-size :18px;" href="<?php echo $instagram;?>"><br><i class="fa-brands fa-instagram"></i></a></u>
       </div>
       <?php
        ?>
       </p>
       <p class="card-text">
         <!-- <small class="">Joined <?php //echo $since;?>  </small> -->
       </p>
     </div>
   </div>
 </div>
</div>


       

       


<?php



   }
   ?>
    
</body>
</html>