<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      body{
        font-family: 'ubuntu',sans-serif!important;
        background-color: #f5f5f5;
      }
        .maindiv{
            height: 400px;
            width: 100%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            align-content: center;
            padding-top: 160px;
            
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


  
  
  ?>
<div style="margin-top:150px;">
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
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sr = 1;
  $csle = "SELECT * FROM course WHERE uploader = '$id' AND uploader_type = '$type'";  
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
      <td>
        <a href="course_details?u=<?php echo $tit2;?>&type=<?php echo $type;?>&cid=<?php echo $cid;?>"> 
      <button style="padding:4px!important;" type="button" class="btn btn-success ">Details</button>
</a>
      </td>
    </tr>
    
    <?php
    }
  }
}
  ?> 
  </tbody>
</table>
</div>

   </body>
      
      </html>
     