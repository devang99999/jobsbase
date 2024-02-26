<?php
    @require "config.php";
    session_start();
    if (!empty($_SESSION["bname"])) {
        @$tit = $_SESSION["oname"];
        @$tit2 = $_SESSION["bname"];
        $id = $_SESSION['id'];
        @$type = "business";
    }
    if (!empty($_SESSION["uname"])) {
        @$tit = $_SESSION["fname"];
        @$tit2 = $_SESSION["uname"];
        $id = $_SESSION['id'];
        @$type = "individual";
    }
    
function fname(){
   
    $fnerr="";
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty(trim($_POST["fname"]))) {
        $fnerr = "fname cannot be blank";
        // echo $fnerr;
        header("location:edit_profile?err=$fnerr&u=$tit2&t=$type");
    } elseif (!preg_match("/^[a-zA-Z]+$/", $_POST["fname"])) {
        $fnerr = "Only letters and white space allowed";
        // echo $fnerr;
        header("location:edit_profile?err=$fnerr&u=$tit2&t=$type");
    } else {
        $fname = mysqli_real_escape_string($GLOBALS['conn'],trim($_POST['fname']));
    }
        $sql = "UPDATE $type SET fname='$fname' WHERE uname='$tit2'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:profile?&u=$tit2&t=$type&sn=");
        }
        else{
            echo "Error";
        }
    }

?>


<?php
function lname()
{
    $lnerr="";
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty(trim($_POST["lname"]))) {
        $lnerr = "lname cannot be blank";
        // echo $fnerr;
        header("location:edit_profile?err=$lnerr&u=$tit2&t=$type");
    } elseif (!preg_match("/^[a-zA-Z]+$/", $_POST["lname"])) {
        $lnerr = "Only letters and white space allowed";
        // echo $fnerr;
        header("location:edit_profile?err=$lnerr&u=$tit2&t=$type");
    } else {
        $lname = mysqli_real_escape_string($GLOBALS['conn'],trim($_POST['lname']));
    }
    
        $sql = "UPDATE $type SET lname='$lname' WHERE uname='$tit2'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:profile?&u=$tit2&t=$type&sn=");
        }
        else{
            echo "Error";
        }
    
    }


?>
<?php 
function bdate()
{
    $bderr=NULL;
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST["bdate"])) {
        $bderr = "bdate cannot be blank";
        header("location:edit_profile?err=$bderr&u=$tit2&t=$type");
        // echo $bderr;
    } elseif (!empty($_POST["bdate"])) {

        if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_POST["bdate"])) {
            //   Store the bdate in the database
            $bdate = $_POST["bdate"];
        } else {
            $bderr = "Error: Invalid bdate format.";
            header("location:edit_profile?err=$bderr&u=$tit2&t=$type");
            //   echo $bderr;
        }
    }
        $sql = "UPDATE $type SET bdate='$bdate' WHERE uname='$tit2'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:profile?&u=$tit2&t=$type&sn=");
        }
        else{
            echo "Error";
        }
    }
       

?>
<?php
function uname()
{
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['uname']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    $busch = "SELECT * FROM business WHERE bname = '$ecs'";    
    echo $busch;
    $busres = mysqli_query($conn, $busch);
    $busrow = mysqli_fetch_array($busres, MYSQLI_ASSOC);
    $buscount = mysqli_num_rows($busres);
    if($buscount == 1){
        $buschh = 1;
    }
    else{
        $buschh = 0;
    }
    if (empty(trim($_POST["uname"]))) {
        $unerr = "uname cannot be blank";

        header("location:edit_profile?err=$unerr&u=$tit2&t=$type");
        // echo $unerr;
    } else {
        $sql = "SELECT id FROM individual WHERE uname = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_uname);

            // Set the value of param uname
            $param_uname = trim($_POST['uname']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $unerr = "This user name is already taken";
                    header("location:edit_profile?err=$unerr&u=$tit2&t=$type");
                    // echo $unerr;
                } 
                elseif($buschh ==1){
                    $unerr = "This user name is already taken";
                    header("location:edit_profile?err=$unerr&u=$tit2&t=$type");
                }
                else {
                    $uname = mysqli_real_escape_string($conn, trim($_POST['uname']));
                    $chatupd = "UPDATE chat SET sender='$uname' WHERE sender='$tit2'";
                    $chres = mysqli_query($conn, $chatupd);
                    $chattupd = "UPDATE chat SET receiver='$uname' WHERE receiver='$tit2'";
                    $chtres = mysqli_query($conn, $chattupd);
                    $commupd = "UPDATE comment_table SET commenter='$uname' WHERE commenter='$tit2' ";
                    $comres = mysqli_query($conn, $commupd);
                    $comupd = "UPDATE comment_table SET  content_poster='$uname' WHERE  content_poster='$tit2'";
                    $commres = mysqli_query($conn, $comupd);
                    $follupd = "UPDATE follower SET follower='$uname' WHERE follower='$tit2' ";
                    $follres = mysqli_query($conn, $follupd);
                    $folllupd = "UPDATE follower SET following='$uname' WHERE  following='$tit2'";
                    $folllres = mysqli_query($conn, $folllupd);
                    $img = "UPDATE imgs SET uname='$uname' WHERE uname='$tit2'";
                    $imgrees = mysqli_query($conn, $img);
                    $job = "UPDATE job_apply SET applier='$uname' WHERE applier='$tit2'";
                    $jbres = mysqli_query($conn, $job);
                    $likeupd = "UPDATE like_table SET liker='$uname' WHERE liker='$tit2'";
                    $likeres = mysqli_query($conn, $likeupd);
                    $liupd = "UPDATE like_table SET content_poster='$uname' WHERE content_poster='$tit2'";
                    $lires = mysqli_query($conn, $liupd);
                    $messupd = "UPDATE message_table SET user_1='$uname' WHERE user_1='$tit2' ";
                    $mssres = mysqli_query($conn, $messupd);
                    $mesupd = "UPDATE message_table SET  user_2='$uname' WHERE user_2='$tit2'";
                    $msres = mysqli_query($conn, $mesupd);
                    $vidsupd = "UPDATE videos SET uname='$uname' WHERE uname='$tit2'";
                    $vidres = mysqli_query($conn, $vidsupd);
                    $sql = "UPDATE $type SET uname='$uname' WHERE uname='$tit2'";
                    $result = mysqli_query($conn, $sql);
                    

                    if ($result) {
                        header("location:logout?u=$tit2&t=$type&sn=");
                    } else {
                        echo "Error";
                    }
                    
                }
                
            } else {
                echo "Something went wrong";
            }
           
        }
}
}
?>
<?php
function avatar()
{
    $id = $GLOBALS['id'];
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];

    echo $tit2;
    //     //   check for avatar
    if (!empty($_FILES['file']['name'])) {
        $avaname = $_FILES['file']['name'];
        echo $avaname;

        $tmp_avaname = $_FILES['file']['tmp_name'];

        $position = strpos($avaname, ".");

        // $fileextension= substr($name, $position + 1);
        $fileextension = pathinfo($avaname, PATHINFO_EXTENSION);
        // echo $fileextension;
        $fileextension = strtolower($fileextension);
        // echo $fileextension;


echo $fileextension;
        if (isset($avaname)) {

            $newavaname = uniqid('new_avatars', true) . "." . $fileextension;
            $path = 'individuals/avatars/';
            echo $path;
            $avlink = $path . $newavaname;
            // if (empty($avaname))
            // {
            // echo "Please choose a file";
            // }
            if (!empty($avaname)) {
                if (($fileextension != "jpg")  && ($fileextension != "jpeg") && ($fileextension != "png")) {
                    $averr = "The file extension must be .png, .jpeg, or .jpg in order to be uploaded in avatar";
                    header("location:edit_profile?err=$averr&u=$tit2&t=$type");
                    // echo $averr;
                }
                else {
                $smerr = "SOMETHING WENT WRONG";
        header("location:profile?err=$smerr&u=$tit2&t=$type");
                }
            }

            if (($fileextension == "jpeg") || ($fileextension == "jpg") || ($fileextension == "png")) {
                $avlink = $path . $newavaname;
                move_uploaded_file($tmp_avaname, $avlink);
                $sql = "UPDATE $type SET avatarlink='$avlink' WHERE id='$id' AND uid_type = '$type'";
                $result = mysqli_query($conn, $sql);
                echo "<img src='$avlink' width='100' height='100'>";
                if ($result) {
                    header("location:edit_profile?err=$averr&u=$tit2&t=$type");
                }
                else {
                    $smerr = "SOMETHING WENT WRONG";
            header("location:profile?err=$smerr&u=$tit2&t=$type");
                    }
            }
        }
    } 

}
?>


<?php
function email(){
    $fnerr="";
    $id =   $GLOBALS['id'];
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (isset($_POST['email'])) {
        // $email = $_POST['email'];

        if (empty($_POST['email'])) {
            $emerr = "Email is required.";
            header("location:edit_profile?err=$emerr&u=$tit2&t=$type");
            // echo $emerr;
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emerr = "Invalid email format.";
            header("location:edit_profile?err=$emerr&u=$tit2&t=$type");
            // echo $emerr;
        } else {

            $email = $_POST['email'];
            $sql = "UPDATE $type SET email='$email' WHERE id='$id' AND uid_type = '$type'";
            $result = mysqli_query($conn, $sql);
            $_SESSION['email'] = $email;
            header("location:profile?u=$tit2&t=$type&sn=");
        }
    }
    }

?>

<?php
function phone(){
    $fnerr="";
    $id =  $GLOBALS['id'];
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty(trim($_POST['phone']))) {
        $pherr = "Phone cannot be blank";
        header("location:edit_profile?err=$pherr&u=$tit2&t=$type");
        // echo $pherr;

    } elseif (!is_numeric($_POST['phone'])) {
        $pherr = "Invalid phone number format. It should be 10 digits.";
        header("location:edit_profile?err=$pherr&u=$tit2&t=$type");
        // echo $pherr;
    } elseif (strlen($_POST['phone']) != 10) {
        $pherr = "Invalid phone number format. It should be 10 digits.";
        header("location:edit_profile?err=$pherr&u=$tit2&t=$type");
        // echo $pherr;
    } else {
        $phone = $_POST['phone'];
        $sql = "UPDATE $type SET phone='$phone' WHERE id='$id' AND uid_type = '$type'";
        $result = mysqli_query($conn, $sql);
        $_SESSION['phone'] = $phone;
        header("location:profile?u=$tit2&t=$type&sn=");

    }

    }

?>

<?php
function desc(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $id = $GLOBALS['id'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty(trim($ecs))) {
        $deserr = "description cannot be blank";
        header("location:edit_profile?err=$deserr&u=$tit2&t=$type");
        // echo $lnerr;
    } elseif ( str_word_count($ecs) <0 || str_word_count($ecs) > 100) {
        $deserr = "description should be between 0 and 100 words";
        // echo $lnerr;
        header("location:edit_profile?err=$deserr&u=$tit2&t=$type");
    } else {
        $desc = trim($ecs);
    
        $sql = "UPDATE $type SET description='$desc' WHERE id='$id' AND uid_type = '$type'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }


?>

<?php
function bdesc(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $id = $GLOBALS['id'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty(trim($ecs))) {
        $deserr = "description cannot be blank";
        header("location:edit_profile?err=$deserr&u=$tit2&t=$type");
        // echo $lnerr;
    } elseif ( str_word_count($ecs) <0 || str_word_count($ecs) > 100) {
        $deserr = "description should be between 0 and 100 words";
        // echo $lnerr;
        header("location:edit_profile?err=$deserr&u=$tit2&t=$type");
    } else {
        $desc = trim($ecs);
    
        $sql = "UPDATE $type SET business_description='$desc' WHERE id='$id' AND uid_type = '$type'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }
?>



<?php
function institute(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['institute'])) {
        $inserr = "institute cannot be blank";
        header("location:edit_profile?err=$inserr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["institute"])) {
        $inserr = "Only letters and white space allowed in institute";
        header("location:edit_profile?err=$inserr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $institute = $_POST['institute'];
    
    
        $sql = "UPDATE $type SET institute='$institute' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php
function course(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['institute'])) {
        $coerr = "course cannot be blank";
        header("location:edit_profile?err=$coerr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["course"])) {
        $coerr = "Only letters and white space allowed in institute";
        header("location:edit_profile?err=$coerr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $course = $_POST['course'];
    
    
        $sql = "UPDATE $type SET course='$course' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php
function syear(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['institute'])) {
        $syerr = "syear cannot be blank";
        header("location:edit_profile?err=$syerr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["syear"])) {
        $syerr = "Only letters and white space allowed in syear";
        header("location:edit_profile?err=$syerr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $syear = $_POST['syear'];
    
    
        $sql = "UPDATE $type SET syear='$syear' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php
function eyear(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['eyear'])) {
        $eyerr = "eyear cannot be blank";
        header("location:edit_profile?err=$eyerr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["institute"])) {
        $eyerr = "Only letters and white space allowed in institute";
        header("location:edit_profile?err=$eyerr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $eyear = $_POST['eyear'];
    
    
        $sql = "UPDATE $type SET eyear='$eyear' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php
function gender(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['gender'])) {
        $generr = "gender cannot be blank";
        header("location:edit_profile?err=$generr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["gender"])) {
        $generr = "Only letters and white space allowed in gender";
        header("location:edit_profile?err=$generr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $gender = $_POST['gender'];
    
    
        $sql = "UPDATE $type SET gender='$gender' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>
<?php
function city(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['city'])) {
        $cierr = "city cannot be blank";
        header("location:edit_profile?err=$cierr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["city"])) {
        $cierr = "Only letters and white space allowed in city";
        header("location:edit_profile?err=$cierr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $city = $_POST['city'];
    
    
        $sql = "UPDATE $type SET city='$city' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php
function state(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['state'])) {
        $sterr = "state cannot be blank";
        header("location:edit_profile?err=$sterr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["state"])) {
        $sterr = "Only letters and white space allowed in state";
        header("location:edit_profile?err=$sterr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $state = $_POST['state'];
    
    
        $sql = "UPDATE $type SET state='$state' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php
function country(){
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['country'])) {
        $couerr = "country cannot be blank";
        header("location:edit_profile?err=$couerr&u=$tit2&t=$type");
        // echo $inserr;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["country"])) {
        $couerr = "Only letters and white space allowed in country";
        header("location:edit_profile?err=$couerr&u=$tit2&t=$type");
        // echo $inserr;
    } else {
        $country = $_POST['country'];
    
    
        $sql = "UPDATE $type SET country='$country' WHERE uname='$tit2'";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php function oname()
{
    $fnerr="";
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
   if ($_GET['ch'] == "oname") {
     // Check for oname
     if(empty(trim($_POST["oname"]))){
        $onerr = "oname cannot be blank";
        // echo $onerr;
        header("location:edit_profile?err=$onerr&u=$tit2&t=$type");
    }
    elseif(!preg_match("/^[a-zA-Z\s]*$/",$_POST["oname"])){
        $onerr = "Only letters and white space allowed in oname";
        // echo $onerr;
        header("location:edit_profile?err=$onerr&u=$tit2&t=$type");
    }   
    else{
            $bname = trim($_POST['bname']);
            $sql = "UPDATE business SET bname='$bname' WHERE bname='$tit2'";
            $result = mysqli_query($conn, $sql);
            header("location:profile?u=$tit2&t=$type&sn=");

        }
   }
}

?>

<?php
function address(){
    $id = $GLOBALS['id'];
    $type = $GLOBALS['type'];
    $ecs =mysqli_real_escape_string($GLOBALS['conn'], trim($_POST['desc']));
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty($_POST['address'])) {
        $aderr = "address cannot be blank";
        header("location:edit_profile?err=$aderr&u=$tit2&t=$type");
        // echo $inserr;
    }  else {
        $address = $_POST['address'];
    
    
        $sql = "UPDATE $type SET address='$address' WHERE id='$id' AND uid_type = '$type'";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>

<?php function bname()
{
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    $indtaten = 0;
    // Check if bname is empty
          $inch = "SELECT * FROM individual WHERE uname = '$_POST[bname]'";
          $stmt = mysqli_query($conn, $inch); 
            $row = mysqli_fetch_array($stmt, MYSQLI_ASSOC);
            $count = mysqli_num_rows($stmt);
            if($count >0)
            {
                $bnerr = "This Business name is already taken";
                header("location:edit_profile?err=$bnerr&u=$tit2&t=$type");

            }

          if(empty(trim($_POST["bname"]))){
        $bnerr = "bname cannot be blank";

        header("location:edit_profile?err=$bnerr&u=$tit2&t=$type");
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
                    header("location:edit_profile?err=$bnerr&u=$tit2&t=$type");
                    // echo $bnerr;
                }
                else if($indtaten == 1)
                {

                    $bnerr = "This Business name is already taken";
                    header("location:edit_profile?err=$bnerr&u=$tit2&t=$type");
                    // echo $bnerr;
                }
                else{
                    $bname = trim($_POST['bname']);

                    $oname = trim($_POST['oname']);
                    $sql = "UPDATE business SET bname='$bname' WHERE bname='$tit2'";
                    $result = mysqli_query($conn, $sql);
                    header("location:logout?u=$tit2&t=$type&sn=");

                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

           

        }
?>



<?php
function enums(){
    $id = $GLOBALS['id'];
    $type = $GLOBALS['type'];
    $fnerr="";
    $type = $GLOBALS['type'];
    $tit2 = $GLOBALS['tit2'];
    $conn = $GLOBALS['conn'];
    if (empty(trim($_POST['phone']))) {
        $enumerr = "enum cannot be blank";
        header("location:edit_profile?err=$enumerr&u=$tit2&t=$type");
        // echo $pherr;

    } elseif (!is_numeric($_POST['phone'])) {
        $enumerr = "Invalid enums number format It should be digits.";
        header("location:edit_profile?err=$enumerr&u=$tit2&t=$type");
        // echo $pherr;
    
    } else {
        $enums = $_POST['enums'];
        $sql = "UPDATE $type SET enums='$enums' WHERE id='$id' AND uid_type = '$type";
        $result = mysqli_query($conn, $sql);
        header("location:profile?u=$tit2&t=$type&sn=");
    }

    }

?>




<?php
if ($_GET['t'] == "individual") {
    # code...

    if($_GET['ch']=="fname"){
        fname();
}
if($_GET['ch']=="lname"){
    lname();
}

if($_GET['ch']=="bdate"){
    bdate();
}


if($_GET['ch']=="uname"){
    uname();
}

if($_GET['ch']=="avatar"){
    avatar();
}


if($_GET['ch']=="email"){
    email();
}


if($_GET['ch']=="phone"){
    phone();
}

if($_GET['ch']=="desc"){
    desc();
}
if($_GET['ch']=="course"){
    course();
}
if($_GET['ch']=="syear"){
    syear();
}
if($_GET['ch']=="eyear"){
    eyear();
}
if($_GET['ch']=="gender"){
    gender();
}
if($_GET['ch']=="city"){
city();
}
if($_GET['ch']=="state"){
    state();
}
if($_GET['ch']=="country"){
    country();
}
}
if ($_GET['t'] == "business") {
    # code...
    if($_GET['ch']=="bname"){
        bname();
    }
    if($_GET['ch']=="oname"){
        oname();
    }
    if($_GET['ch']=="address"){
        address();
    }
    if($_GET['ch']=="enums"){
        enums();
    }
    if($_GET['ch']=="avatar"){
        avatar();
    }
    if($_GET['ch']=="email"){
        email();
    }

    if($_GET['ch']=="phone"){
        phone();
    }
    if($_GET['ch']=="bdesc"){
        bdesc();
    }
}

    ?>