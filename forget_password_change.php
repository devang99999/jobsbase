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
    require 'config.php';
    require 'boot.php';
    include 'vnav.php';
    ?>
    <div class="maindiv">
        <div class="fomdiv1">
            <form action="" method="post" class="login ">
 
 <legend class="legend">PASSWORD RESET</legend>
 <div class="input">
   <input name="pass" type="password" placeholder="Enter New password" required/>
   <span><i class="fa fa-lock"></i></span>
 </div>
 <div class="input">
              <input  id="pass" name="cpass" type="password" placeholder="confirm Password" required  value="" />
              <span><i class="fa fa-lock"></i></span>

            </div>
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">RESET PASSWORD</button>
            <?php

if( @$_GET['err'])
{?>
<h3 id="error" >
  <?php echo "error:". $_GET['err'];
  ?>
  </h3>

<?php
}


?>
    

</form>
        </div>
    

    <?php
// Include your database connection file here
function individual()
{
{
    # code...
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $resetToken = $_POST['token'];
  $password = $_POST['pass'];
  $confirmPassword = $_POST['cpass'];

  // Check if the reset token exists in the database and has not expired
  $query = "SELECT * FROM forget_password WHERE reset_token = '$resetToken' AND reset_token_expiry > NOW()";
  $result = mysqli_query($GLOBALS['conn'], $query);
  $row = mysqli_fetch_assoc($result);
  
    $uemail = $row['email'];
    $uname = $row['uname'];
    $uid_type = $row['uid_type'];

  


  if ($password === $confirmPassword) {
    // Hash the new password
    $hpassword = hash('sha512', $password);

    // Update the password in the database and clear the reset token fields
    @$query2 = "UPDATE individual SET password = '$hpassword' WHERE  email = '$uemail' AND uname = '$uname' AND uid_type = '$uid_type'";
    mysqli_query($GLOBALS['conn'], $query2);

    ?>
        <script>
            alert("Your password has been successfully reset");
        </script>
<?php
    // Display a success message
    echo "<br>";
  } else {
    ?>
        <script>
            alert("INVALID TOKEN OR EXPIRED OR SOME ERROR OCCURED");
        </script>
<?php
  }
}
}

?>


<?php
// Include your database connection file here
function business()
{
{
    # code...
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $resetToken = $_POST['token'];
  $password = $_POST['pass'];
  $confirmPassword = $_POST['cpass'];

  // Check if the reset token exists in the database and has not expired
  $query = "SELECT * FROM forget_password WHERE reset_token = '$resetToken' AND reset_token_expiry > NOW()";
  $result = mysqli_query($GLOBALS['conn'], $query);
  $row = mysqli_fetch_assoc($result);
  
    $uemail = $row['email'];
    $uname = $row['uname'];
    $uid_type = $row['uid_type'];

  


  if ($password === $confirmPassword) {
    // Hash the new password
    $hpassword = hash('sha512', $password);

    // Update the password in the database and clear the reset token fields
    @$query2 = "UPDATE business SET password = '$hpassword' WHERE  email = '$uemail' AND bname = '$uname' AND uid_type = '$uid_type'";
    mysqli_query($GLOBALS['conn'], $query2);

    // Display a success message
    ?>
    <script>
        alert("Your password has been successfully reset");
    </script>
<?php
  } else {
    // Display an error message
    ?>
        <script>
            alert("INVALID TOKEN OR EXPIRED OR SOME ERROR OCCURED");
        </script>
<?php
  }
}
}

?>


<?php

if($_GET['fp'] == "ind")
{
    individual();
}

if ($_GET['fp']=="bus") {
  business();
}
?>
    </div> 
</body>
</html>