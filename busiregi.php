<?php
require "config.php";

$oname=$desc=$bname=$email=$desc=$phone = $password = $cpassword =$btype=$syear=$eyear=$gender=$city=$state=$country="";

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

    // Check for oname
    if(empty(trim($_POST["oname"]))){
        $onerr = "oname cannot be blank";
        // echo $onerr;
        header("location:?err=$onerr");
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$_POST["oname"])){
        $onerr = "Only letters and white space allowed in oname";
        // echo $onerr;
        header("location:busi_regi?err=$onerr");
    }   
    else{
            $oname = trim($_POST['oname']);
        }
    // Check for desc
    if(empty(trim($_POST["desc"]))){
        $deserr = "desc cannot be blank";
        header("location: busi_regi.php?err=$deserr");
        // echo $deserr;
    }
    elseif(strlen( $_POST["desc"])<100){
        $deserr = "desc must be greater than 100 characters";
        // echo $deserr;
        header("location: busi_regi.php?err=$deserr");
    }   
    else{
            $desc = trim($_POST['desc']);
        }
    
        // Check for sdate
        if(empty($_POST["sdate"])){
            $sderr = "sdate cannot be blank";
            header("location: busi_regi.php?err=$sderr");
            // echo $sderr;
        }
        elseif (!empty($_POST["sdate"])) {

            if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_POST["sdate"])) {
            //   Store the sdate in the database
                $sdate = $_POST["sdate"];
            } else {
              $sderr ="Error: Invalid sdate format.";
              header("location: busi_regi.php?err=$sderr");
            //   echo $sderr;
            }
          }
          
          // Check if bname is empty
          $inch = "SELECT * FROM individual WHERE uname = '$_POST[bname]'";
          $stmt = mysqli_query($conn, $inch); 
            $row = mysqli_fetch_array($stmt, MYSQLI_ASSOC);
            $count = mysqli_num_rows($stmt);
            if($count >0)
            {
                $bnerr = "This Business name is already taken";
                header("location:busi_regi?err=$bnerr");
                
            }

          if(empty(trim($_POST["bname"]))){
        $bnerr = "bname cannot be blank";

        header("location: busi_regi.php?err=$bnerr");
        // echo $bnerr;
    }
    else{
        $sql = "SELECT id FROM business WHERE bname = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_bname);

            // Set the value of param bname
            $param_bname = trim($_POST['bname']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $bnerr = "This Business name is already taken";
                    header("location: busi_regi.php?err=$bnerr"); 
                    // echo $bnerr;
                }
                else if($indtaten == 1)
                {

                    $bnerr = "This Business name is already taken";
                    header("location: busi_regi.php?err=$bnerr"); 
                    // echo $bnerr;
                }
                else{
                    $bname = trim($_POST['bname']);

                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

     //   check for avatar
    if(!empty($_FILES['file']['name'])){
        $avaname= $_FILES['file']['name'];

    $tmp_avaname= $_FILES['file']['tmp_name'];

    $position= strpos($avaname, ".");

    // $fileextension= substr($name, $position + 1);
    $fileextension = pathinfo($avaname, PATHINFO_EXTENSION);
    // echo $fileextension;
    $fileextension= strtolower($fileextension);
    // echo $fileextension;



    if (isset($avaname))
     {

    $newavaname = uniqid('avatars', true).".".$fileextension;
    $path= 'business/avatars/';
    // $avlink = $path.$newavaname;
    // if (empty($avaname))
    // {
    // echo "Please choose a file";
    // }
    if (!empty($avaname))
    {
    if ( ($fileextension != "jpg")  && ($fileextension != "jpeg") && ($fileextension !="png") )
    {
    $averr= "The file extension must be .png, .jpeg, or .jpg in order to be uploaded in avatar";
    header("location: busi_regi.php?err=$averr");
    // echo $averr;
    }

    }

    if (($fileextension == "jpeg") || ($fileextension == "jpg") || ($fileextension == "png"))
    { 
      $avlink = $path.$newavaname;
      move_uploaded_file($tmp_avaname, $avlink);

    }
    }
    }

    else
    {
        $avlink = "img/avatars/default.png";
    }

 // Check for email
    if(isset($_POST['email']))
     {
        // $email = $_POST['email'];

        if(empty($_POST['email']))
         {
            $emerr= "Email is required.";
            header("location: busi_regi.php?err=$emerr");
            // echo $emerr;
        } 
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emerr ="Invalid email format.";
            header("location: busi_regi.php?err=$emerr");
            // echo $emerr;
        }
         else 
         {

                $email= $_POST['email'];
            }
    }

   // Check for phone
    if(empty(trim($_POST['phone']))){
    $pherr = "Phone cannot be blank";
    header("location: busi_regi.php?err=$pherr");
    // echo $pherr;

    }
    elseif (!is_numeric($_POST['phone']))
     {
        $pherr= "Invalid phone number format. It should be 10 digits.";
        header("location: busi_regi.php?err=$pherr");
        // echo $pherr;
    } 
    elseif (strlen($_POST['phone']) != 10)
     {
        $pherr= "Invalid phone number format. It should be 10 digits.";
        header("location: busi_regi.php?err=$pherr");
        // echo $pherr;
    } 


    else {
        // Check if the phone number already exists in the database

        // Prepare and execute the query
            $phone= $_POST['phone'];

    }

     // Check for enums
     if(empty(trim($_POST['enums'])))
     {
        $enerr = "enums cannot be blank";
        header("location: busi_regi.php?err=$enerr");
        // echo $enerr;
    
        }
        elseif (!is_numeric($_POST['enums']))
         {
            $enerr= "Invalid enums number format. It should be 10 digits.";
            header("location: busi_regi.php?err=$enerr");
            // echo $pherr;
        } 
    
    
        else {
            // Check if the enums number already exists in the database
    
            // Prepare and execute the query
                $enums= $_POST['enums'];
    
        }
    


// Check for password and confirm password

    if(empty($_POST['password']) || empty($_POST['cpassword'])) {
        $paserr = "Password and Confirm password are required.";
        header("location: busi_regi.php?err=$paserr");
        // echo $paserr;
    } 
    
    elseif ($_POST['password'] != $_POST['cpassword']) 
    {
        $paserr ="Password and Confirm password do not match.";
        header("location: busi_regi.php?err=$paserr");
        // echo $paserr;
    } 
    elseif (strlen($_POST['password']) < 8 || strlen($_POST['cpassword']) < 8)
    {
        $paserr ="Password must be at least 8 characters long.";
        header("location: busi_regi.php?err=$paserr");
        // echo $paserr;
    }
    else {
        // Hash the password for security
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $hpassword = hash('sha512', $password);
        $hcpassword = hash('sha512', $cpassword);
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // $cpassword = password_hash($cpassword, PASSWORD_DEFAULT);
    }

// check for btype

if(empty($_POST['btype'])){
    $bterr = "btype cannot be blank";
    header("location: busi_regi.php?err=$bterr");
    // echo $bterr;
}
// elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["btype"])){
//     $bterr = "Only letters and white space allowed in btype";
//     header("location: busi_regi.php?err=$bterr");
//     // echo $bterr;
// }   
else{
    $btype = $_POST['btype'];

}

//     // check for city
    if(empty($_POST["address"])){
        $adderr = "city cannot be blank";
        header("location: busi_regi.php?err=$adderr");
        // echo $cierr;
    }
    // elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["address"])){
    //     $cierr = "Only letters and white space allowed in city";
    //     header("location: busi_regi.php?err=$cierr");
    //     // echo $cierr;
    // }   
    else{
            $address = $_POST['address'];
            $address = mysqli_real_escape_string($conn, $address);

    }

// If there were no errors, go ahead and insert into the database
if(empty($onerr) && empty($sderr) && empty($deserr) && empty($bnerr) && empty($emerr) && empty($pherr) && empty($paserr) && empty($bterr) && empty($adderr))
{
    $sql = "INSERT INTO business (bname,oname,avatarlink,enums,business_description,email,phone, password,business_industry,sdate,address,uid_type) VALUES ('$bname', '$oname', '$avlink','$enums','$desc','$email', '$phone', '$hpassword', '$btype','$sdate','$address','business')";
    $stmt = mysqli_prepare($conn, $sql);
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login");
        }
        else{
            $err= "Something went wrong... cannot redirect!";
            header("location: busi_regi?err=$err");
        }
        mysqli_stmt_close($stmt);
}

mysqli_close($conn);
}
?>

</body>
</html>