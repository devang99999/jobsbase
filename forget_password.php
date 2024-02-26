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
 
 <legend class="legend">FORGOT PASSWORD </legend>
 <div class="input">
   <input name="email" type="email" placeholder="ENTER REGISTERED EMAIL ADDERSS" required value="devanggandhi2222@gmail.com" />

   <span><i class="fa fa-lock"></i></span>
 </div>
  <div class="input">
   <input name="uname" type="text" placeholder="ENTER USER OR BUSINESS NAME" required value="web.devang" />
   
   <span><i class="fa fa-lock"></i></span>
 </div>
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">SUBMIT</button>
            <?php

if( @$_GET['err'])
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

   
    <?php
// Include your database connection file here

function individual(){

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $uname = $_POST['uname'];

  if ($_GET['fp'] == "ind") {
    $ust = "individual";
  }
  $newname = uniqid('password reset', true) . "." . $uname;

  // Check if the email exists in the database
  $query = "SELECT * FROM individual WHERE email = '$email' AND uname = '$uname'";
  $result = mysqli_query($GLOBALS['conn'], $query);
  $user = mysqli_fetch_assoc($result);
  $password = $user['password'];

  if ($user) {
    // Generate a reset token
    $resetToken = bin2hex(random_bytes(32));

    // Set the reset token and expiry in the database
    $expiryTimestamp = date('Y-m-d H:i:s', strtotime('+7 hour'));
    $query = "INSERT INTO forget_password (reset_id,uname,uid_type,email,password, reset_token, reset_token_expiry) VALUES ('$newname','$uname','$ust','$email','$password','$resetToken', '$expiryTimestamp')";
    mysqli_query($GLOBALS['conn'], $query);

    // Send the password reset email to the user
    $resetLink = "forget_password_change?token=$resetToken&fp=ind";
    // Use a mail library or PHP's built-in mail function to send the email
    // Example:
    mail($email, 'Password Reset', "Click the link to reset your password: $resetLink");
  }

  // Display a message to the user
  echo "An email with instructions to reset your password has been sent to $email.";
}
}
?>


<?php
// Include your database connection file here

function business(){

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $uname = $_POST['uname'];

  if ($_GET['fp'] == "bus") {
    $ust = "business";
  }
  $newname = uniqid('password reset', true) . "." . $uname;

  // Check if the email exists in the database
  $query = "SELECT * FROM business WHERE email = '$email' AND bname = '$uname'";
  $result = mysqli_query($GLOBALS['conn'], $query);
  $user = mysqli_fetch_assoc($result);
  $password = $user['password'];

  if ($user) {
    // Generate a reset token
    $resetToken = bin2hex(random_bytes(32));

    // Set the reset token and expiry in the database
    $expiryTimestamp = date('Y-m-d H:i:s', strtotime('+7 hour'));
    $query = "INSERT INTO forget_password (reset_id,uname,uid_type,email,password, reset_token, reset_token_expiry) VALUES ('$newname','$uname','$ust','$email','$password','$resetToken', '$expiryTimestamp')";
    mysqli_query($GLOBALS['conn'], $query);

    // Send the password reset email to the user
    $resetLink = "forget_password_change?token=$resetToken&fp=bus";
    // Use a mail library or PHP's built-in mail function to send the email
    // Example:
    mail($email, 'Password Reset', "Click the link to reset your password: $resetLink");
  }

  // Display a message to the user
  echo "An email with instructions to reset your password has been sent to $email.";
}
}
?>
  
<?php 
if ($_GET['fp']=="ind") {
    individual();
}
if ($_GET['fp']=="bus") {
  business();
}

?>

</body>
</html>