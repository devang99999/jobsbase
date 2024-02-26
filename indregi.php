<?php
require "config.php";

$fname = $lname = $uname = $email = $phone = $password = $cpassword = $institute = $syear = $eyear = $gender = $city = $state = $country = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check for fname
    if (empty(trim($_POST["fname"]))) {
        $fnerr = "fname cannot be blank";
        // echo $fnerr;
        header("location:indi_regi?err=$fnerr");
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $_POST["fname"])) {
        $fnerr = "Only letters and white space allowed in first name";
        // echo $fnerr;
        header("location:indi_regi?err=$fnerr");
    } else {
        $fname = trim($_POST['fname']);
    }
    // Check for lname
    if (empty(trim($_POST["lname"]))) {
        $lnerr = "lname cannot be blank";
        header("location: indi_regi.php?err=$lnerr");
        // echo $lnerr;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $_POST["lname"])) {
        $lnerr = "Only letters and white space allowed";
        // echo $lnerr;
        header("location: indi_regi.php?err=$lnerr");
    } else {
        $lname = trim($_POST['lname']);
    }

    //     // Check for bdate
    if (empty($_POST["bdate"])) {
        $bderr = "bdate cannot be blank";
        header("location: indi_regi.php?err=$bderr");
        // echo $bderr;
    } elseif (!empty($_POST["bdate"])) {

        if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_POST["bdate"])) {
            //   Store the bdate in the database
            $bdate = $_POST["bdate"];
        } else {
            $bderr = "Error: Invalid bdate format.";
            header("location: indi_regi.php?err=$bderr");
            //   echo $bderr;
        }
    }

    // Check if uname is empty

    $busch = "SELECT * FROM business WHERE bname = '$_POST[uname]'";    
    $busres = mysqli_query($conn, $busch);
    $busrow = mysqli_fetch_array($busres, MYSQLI_ASSOC);
    $buscount = mysqli_num_rows($busres);
    if($buscount == 1){
        $buschh = 1;
    }
    if (empty(trim($_POST["uname"]))) {
        $unerr = "uname cannot be blank";

        header("location: indi_regi.php?err=$unerr");
        // echo $unerr;
    } else {
        $sql = "SELECT * FROM individual WHERE uname = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_uname);

            // Set the value of param uname
            $param_uname = trim($_POST['uname']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt)>0) {
                    $unerr = "This user name is already taken";
                    header("location: indi_regi.php?err=$unerr");
                    // echo $unerr;
                } 
                elseif(@$buschh >0){
                    $unerr = "This user name is already taken";
                    header("location: indi_regi.php?err=$unerr");
                }
                else {
                    $uname = trim($_POST['uname']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }

    //     //   check for avatar
    if (!empty($_FILES['file']['name'])) {
        $avaname = $_FILES['file']['name'];

        $tmp_avaname = $_FILES['file']['tmp_name'];

        $position = strpos($avaname, ".");

        // $fileextension= substr($name, $position + 1);
        $fileextension = pathinfo($avaname, PATHINFO_EXTENSION);
        // echo $fileextension;
        $fileextension = strtolower($fileextension);
        // echo $fileextension;



        if (isset($avaname)) {

            $newavaname = uniqid('avatars', true) . "." . $fileextension;
            $path = 'individuals/avatars/';
            $avlink = $path . $newavaname;
            // if (empty($avaname))
            // {
            // echo "Please choose a file";
            // }
            if (!empty($avaname)) {
                if (($fileextension != "jpg")  && ($fileextension != "jpeg") && ($fileextension != "png")) {
                    $averr = "The file extension must be .png, .jpeg, or .jpg in order to be uploaded in avatar";
                    header("location: indi_regi.php?err=$averr");
                    // echo $averr;
                }
            }

            if (($fileextension == "jpeg") || ($fileextension == "jpg") || ($fileextension == "png")) {
                $avlink = $path . $newavaname;
                move_uploaded_file($tmp_avaname, $avlink);
            }
        }
    } else {
        // $avlink = "individuals/avatars/default.png";
        $avlink  = "imgs/noimage.png";
    }


 //     //   check for avatar
 if (!empty($_FILES['res']['name'])) {
    $resname = $_FILES['res']['name'];

    $tmp_resname = $_FILES['res']['tmp_name'];

    // $fileextension= substr($name, $position + 1);
    $fileextension2 = pathinfo($resname, PATHINFO_EXTENSION);
    // echo $fileextension;
    $fileextension2 = strtolower($fileextension2);
    // echo $fileextension;



    if (isset($resname)) {

        $newresname = uniqid('resume', true) . "." . $fileextension2;
        $path2 = 'individuals/resumes/';
        $reslink = $path2 . $newresname;
        // if (empty($avaname))
        // {
        // echo "Please choose a file";
        // }
        if (!empty($avaname)) {
            if (($fileextension2 != "pdf"))  {
                $reserr = "The file extension must be pdf in order to be uploaded in avatar";
                header("location: indi_regi.php?err=$reserr");
                // echo $averr;
            }
        }

        if (($fileextension2 == "pdf")) {
            $reslink = $path2 . $newresname;
            move_uploaded_file($tmp_resname, $reslink);
        }
    }
} else {
    $reslink = "NOT UPLOADED";
}


    // // Check for email
    if (isset($_POST['email'])) {
        // $email = $_POST['email'];

        if (empty($_POST['email'])) {
            $emerr = "Email is required.";
            header("location: indi_regi.php?err=$emerr");
            // echo $emerr;
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emerr = "Invalid email format.";
            header("location: indi_regi.php?err=$emerr");
            // echo $emerr;
        } else {

            $email = $_POST['email'];
        }
    }

    // Check for phone
    if (empty(trim($_POST['phone']))) {
        $pherr = "Phone cannot be blank";
        header("location: indi_regi.php?err=$pherr");
        // echo $pherr;

    } elseif (!is_numeric($_POST['phone'])) {
        $pherr = "Invalid phone number format. It should be 10 digits.";
        header("location: indi_regi.php?err=$pherr");
        // echo $pherr;
    } elseif (strlen($_POST['phone']) != 10) {
        $pherr = "Invalid phone number format. It should be 10 digits.";
        header("location: indi_regi.php?err=$pherr");
        // echo $pherr;
    } else {
        // Check if the phone number already exists in the database

        // Prepare and execute the query
        $phone = $_POST['phone'];
    }

    // Check for description
    if (empty(trim($_POST["desc"]))) {
        $deserr = "description cannot be blank";
        header("location: indi_regi.php?err=$deserr");
        // echo $lnerr;
    } elseif ( str_word_count($_POST["desc"]) <0 || str_word_count($_POST["desc"]) > 100) {
        $deserr = "description should be between 0 and 100 words";
        // echo $lnerr;
        header("location: indi_regi.php?err=$deserr");
    } else {
        $desc = trim($_POST['desc']);
    }

    // Check for password and confirm password

    if (empty($_POST['password']) || empty($_POST['cpassword'])) {
        $paserr = "Password and Confirm password are required.";
        header("location: indi_regi.php?err=$paserr");
        // echo $paserr;
    } elseif ($_POST['password'] != $_POST['cpassword']) {
        $paserr = "Password and Confirm password do not match.";
        header("location: indi_regi.php?err=$paserr");
        // echo $paserr;
    } elseif (strlen($_POST['password']) < 8 || strlen($_POST['cpassword']) < 8) {
        $paserr = "Password must be at least 8 characters long.";
        header("location: indi_regi.php?err=$paserr");
        // echo $paserr;
    } else {
       
        // Hash the password for security
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $hpassword = hash('sha512', $password);
        $hcpassword = hash('sha512', $cpassword);
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // $cpassword = password_hash($cpassword, PASSWORD_DEFAULT);
    }

   
    // // check for gender



    echo $_POST['gender'];
    if (empty($_POST['gender'])) {
        $geerr = "Gender is required.";
        header("location: indi_regi.php?err=$geerr");
        // echo $geerr;
    } elseif ($gender === 'male' || $gender === 'female' || $gender === 'Rather not to say') {
        // Gender is valid, continue processing the form.
        $gender = $_POST['gender'];
        // } else {
        //     // Gender is not valid, show an error message.
        //     // echo "Error: Invalid gender.";
        //     $geerr= "Invalid gender. Only Male, Female, and Other are allowed. in gender";
        //     header("location: indi_regi.php?err=$geerr");
    }
    // echo $geerr;

    else {
        $gender  = $_POST['gender'];
    }


    //     // check for city
    if (empty($_POST["city"])) {
        $cierr = "city cannot be blank";
        header("location: indi_regi.php?err=$cierr");
        // echo $cierr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["city"])) {
        $cierr = "Only letters and white space allowed in city";
        header("location: indi_regi.php?err=$cierr");
        // echo $cierr;
    } else {
        $city = $_POST['city'];
    }
    // // check for state
    if (empty($_POST["state"])) {
        $sterr = "state cannot be blank";
        header("location: indi_regi.php?err=$sterr");
        // echo $sterr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["state"])) {
        $sterr = "Only letters and white space allowed in state";
        header("location: indi_regi.php?err=$sterr");
        // echo $sterr;
    } else {
        $state = $_POST['state'];
    }

    // // check for country
    if (empty($_POST["country"])) {
        $couerr = "course cannot be blank";
        header("location: indi_regi.php?err=$couerr");
        // echo $couerr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["country"])) {
        $couerr = "Only letters and white space allowed in country";
        header("location: indi_regi.php?err=$couerr");
        // echo $couerr;
    } else {
        $country = $_POST['country'];
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($fnerr) && empty($lnerr) && empty($bderr) && empty($unerr) && empty($emerr) && empty($descerr) && empty($pherr) && empty($paserr) && empty($inserr) && empty($coerr) && empty($syerr) && empty($eyerr) && empty($geerr) && empty($cierr) && empty($sterr) && empty($couerr)) {
        $sql = "INSERT INTO individual (fname,lname,bdate,uname,avatarlink,email,phone,description, password,gender,city,state,country,uid_type,resume_link) VALUES ('$fname', '$lname', '$bdate', '$uname', '$avlink', '$email','$phone', '$desc', '$hpassword', '$gender', '$city', '$state', '$country', 'individual','$reslink')";
        $stmt = mysqli_prepare($conn, $sql);
        // Try to execute the query
        if (mysqli_stmt_execute($stmt)) {
            // $username = "example_user";
            // $password = "example_password";
            setcookie("username", $uname, time() + 3600*24 ); // Cookie expires in 1 hour
            setcookie("password", $password, time() + 3600*24 );
            header("location: login");
        } else {
            $err = "Something went wrong... cannot redirect!";
            header("location: indi_regi?err=$err");
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>

</body>

</html>