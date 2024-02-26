<?php
session_start();
  require "config.php";
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


    $newname = uniqid('education', true) . "." . $tit2;
    $user_id = $id;
    $user_type = $type;
    $cname = $_POST['cname'];
    $dname = $_POST['dname'];
    $cgpa = $_POST['cgpa'];
    $comyear = $_POST['comyear'];

    $chdeg = "SELECT * FROM education WHERE user_id='$user_id' AND user_type='$user_type' AND college_name='$cname' AND degree_name='$dname' AND cgpa='$cgpa' AND completion_date='$comyear'";
    $chdeg2 = mysqli_query($conn, $chdeg); 
    $chdeg3 = mysqli_num_rows($chdeg2);
    if ($chdeg3 > 0) {
        // echo "already exists";
        header("location:profile?u=$tit2&t=$type&sn=&msg=THIS EDUCATION ALREADY EXISTS");
    } else {
        // echo "not exists";
    


    $insv = "INSERT INTO `education`(`education_id`, `user_id`, `user_type`, `college_name`, `degree_name`, `cgpa`, `completion_date`) VALUES ('$newname','$user_id','$user_type','$cname','$dname','$cgpa','$comyear')";
    $insv2 = mysqli_query($conn, $insv);
    if ($insv2) {
        // echo "success";
        header("location:profile?u=$tit2&t=$type");
    } else {
        // echo "failed";
    }
}

?>