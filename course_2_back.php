    <?php
  session_start();
  require 'config.php';
  

  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$type = "business";
    @$sele  = "bname";
}
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$sele= "uname";
  }


  $coname = $_POST['coname'];
  $category = $_POST['category'];
  $sub_category = $_POST['sub_category'];

  $cdesc = $_POST['cdesc'];
  $esc_cdesc = mysqli_real_escape_string($conn, $cdesc);
  if (empty($coname) || empty($category) || empty($sub_category) || empty($cdesc)){
    header("location: upload_course?u=$tit2&type=$type&error=empty fields or some thing went worng please try again");

  }
  else{

  $usles = "SELECT * FROM $type WHERE $sele = '$tit2'";
  $usles2 = mysqli_query($conn, $usles);
  $usles3 = mysqli_fetch_assoc($usles2);
  $uploid = $usles3['id'];

  $newname = uniqid('course', true) . "." . $tit2;


  $coins = "INSERT INTO course (course_id,course_category_id,course_sub_category_id,course_name,course_description	,uploader,uploader_type,no_of_videos,no_of_joiners,status) VALUES ('$newname','$category','$sub_category','$coname','$esc_cdesc','$uploid','$type','0','0','0')";

  if (mysqli_query($conn, $coins)) {
    header("location: course_3?u=$tit2&type=$type");
  } else {
    echo "Error: " . $coins . "<br>" . mysqli_error($conn);
  }

}
  ?>
  