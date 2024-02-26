<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .bord{
        
            margin-top: 150px;
      }
    </style>
</head>
<body>
    

<?php
  session_start();
  require 'config.php';
  require 'boot.php';
  require 'nav.php';

  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$id= $_SESSION['id'];
    @$type = "business";
}
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
    @$id= $_SESSION['id'];

  }


  $cid = $_GET['cid'];    
  $ntf = "SELECT * FROM course WHERE uploader = '$id' AND uploader_type = '$type'  AND course_id = '$cid'";  
  $ntfres = mysqli_query($conn,$ntf);
  $csle_no = mysqli_num_rows($ntfres);
  if ($csle_no >0) {
    # code...
  
  ?>
  <div class="bord">
 <center><h1>YOUR UPLOADEED COURSES</h1></center>
 
 <table class="table align-middle mb-0 bg-white">
   <thead class="bg-light">
     <tr>
       
       <th>SR_NO</th>
       <th>Couse_Name</th>
       <th>Course_category</th>
       <th>Course_Sub_Category</th>
       <th>No_of_videos</th>
       <th>No_of_Joiners</th>
       <th>Upload time</th>
       <th>Add Videos</th>
       
      </tr>
    </thead>
    
  <tbody>
    <?php 
    
    $sr = 1;
    $cid = $_GET['cid'];    
  $csle = "SELECT * FROM course WHERE uploader = '$id' AND uploader_type = '$type'   AND course_id = '$cid'";  
  $res = mysqli_query($conn,$csle);
  $csle_no = mysqli_num_rows($res);
  while ($row = mysqli_fetch_assoc($res)) {

    $cname = $row['course_name'];
    $ccatid = $row['course_category_id'];
    $cacatid = $row['course_sub_category_id'];
    $cid= $row['course_id']; 

    $no_of_videos = $row['no_of_videos'];
        $no_of_joiners = $row['no_of_joiners'];
        $date = $row['datetime'];
      
    $cosatsle = "SELECT * FROM course_category WHERE id = '$ccatid'";
    $cosatres = mysqli_query($conn,$cosatsle);
    while($cosatrow = mysqli_fetch_assoc($cosatres)){
      $ccat = $cosatrow['course_category'];
    

      $cossatsle = "SELECT * FROM course_sub_catogary WHERE id = '$cacatid'";
      $cossatres = mysqli_query($conn,$cossatsle);
      while($cossatrow = mysqli_fetch_assoc($cossatres)){
        $cscat = $cossatrow['course_sub_category'];
        
  
  
    ?>
    <tr>
      <td>
        <?php echo $sr++;?>
      </td>
      <td>
       <?php echo $cname;?>
      </td>

      <td>
        <?php echo $ccat;?>
      </td>
      <td>
       <?php echo $cscat;?>
      </td>
      <td>
        <?php echo $no_of_videos;?>

      </td>
      <td>
        <?php echo $no_of_joiners;?>
      </td>
      <td>
        <?php echo $date;?>
      </td>
      <td>
        <a href="add_videos?u=<?php echo $tit2;?>&t=<?php echo $type;?>&cid=<?php echo $cid; ?>">
      <button style="padding:1px!important;" type="button" class="btn btn-primary">Add Videos</button>
</a>
      </td>
      <!-- <td>
      <a href="course_details?u=<?php echo $tit2;?>&type=<?php echo $type;?>&cid=<?php echo $cid;?>">  
      <button style="padding:4px!important;" type="button" class="btn btn-success ">Details</button>
</a>
      </td> -->
    </tr>
    
    <?php
    }
  }
}
  
  ?> 
  </tbody>
</table>
<?php }
else{

  echo "<center><h1>You Have't Uploaded Any COURSES UPLOADED</h1></center>";
}
$ntfvi = "SELECT * FROM course_videos WHERE uploader_id = '$id' AND uploader_uid = '$type' AND course_id = '$cid'";  
  $ntfvires = mysqli_query($conn,$ntfvi);
  $vsle_no = mysqli_num_rows($ntfvires);
  if ($vsle_no >0) {
   
?>
<center><h3> UPLOADED VIDEOS</h3></center>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>

      <th>SR_NO</th>
      <th>Video</th>
      <th>Video Name</th>
      <th>Upload time</th>
      
      <th>Add Videos</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sr = 1;
  $vsle = "SELECT * FROM course_videos WHERE uploader_id = '$id' AND uploader_uid = '$type'AND course_id = '$cid'";  
  $res = mysqli_query($conn,$vsle);
  $vsle_no = mysqli_num_rows($res);
  
    # code...
  
  while ($row = mysqli_fetch_assoc($res)) {

    $link = $row['video_id'];
    $date = $row['datetime'];
    $vidsele = "SELECT  * FROM videos WHERE link = '$link'";
    $vidres = mysqli_query($conn,$vidsele);
    while($vidrow = mysqli_fetch_assoc($vidres)){
      $name = $vidrow['name'];
      $ext = $vidrow['ext'];
   
     
        
  
  
    ?>
    <tr>
      <td>
        <?php echo $sr++;?>
      </td>
      <td>

      <a target="_blank" href="vid_view?u=<?php echo $tit2;?>&link=<?php echo $link;?>&t=<?php echo $type;?>">
      <video style="width:150px;" class='img-fluid content' preload='metadata'>
                      <source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
                    </video>
                    </a>
      </td>

      <td>
        <?php echo $name;?>
      </td>
      <td>
        <?php echo $date;?>
      </td>
      <td>
      <a href="add_videos_back?u=<?php echo $tit2;?>&t=<?php echo $type;?>&vid=<?php echo $link;?>&cid=<?php echo $cid; ?>&act=del">
      <button style="padding :4px!important;" type="button" class="btn btn-danger">Remove This Video</button>
</a>
      </td>
    </tr>
    
    <?php
    }
  }
    ?> 
  </tbody>
</table>
<?php }

else {
  echo "<center><h4>This Course Does Not Have Any VIDEOS</h4></center>";
}
?>
</div>
</body>
</html>