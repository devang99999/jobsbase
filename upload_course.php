<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>Upload Course</title>
    <style>
      body{
        font-family: 'ubuntu',sans-serif!important;
      }
      .bgdiv {
        background-image: url('./imgs/bi1.jpg');
      /* height: 100vh; */
       background-size: cover;
     background-position: center;
      background-repeat: repeat;
       background-size: cover;
      /* position: relative; */
      filter: brightness(90%);
      /* position: absolute;
      top: 0;
      left: 0; */
      width: 100%;
     height: 100%;
      z-index: -10 !important;

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
  session_start();
  require 'config.php';
  require 'boot.php';
  require 'nav.php';

  if (!empty($_SESSION['bname'])) {
    @$tit = $_SESSION['oname'];
    @$tit2 = $_SESSION['bname'];
    @$type = "business";
}
  if (!empty($_SESSION['uname'])) {
    @$tit = $_SESSION['fname'];
    @$tit2 = $_SESSION['uname'];
    @$type = "individual";
  }
    ?>
<div class="maindiv bgdiv">
        <div class="fomdiv1">
            <form action="course_2?u=<?php echo $tit2;?>&t=<?php echo $type?>" method="post" class="login ">
 
 <legend class="legend">CREATE A COURSE</legend>
 <div style="margin-bottom:0;" class="input">
 <label for="nooc"> ENTER THE NAME OF COURSE</label> <br>
    <input required id="cati" style="border:#000 1px solid;" type="text" name="coname" id="" required>
    <span><i class="bi bi-book-fill"></i></span>
 </div>
 <div class="input">
 <label for="category">Select a course category:</label>
<select required  style="width:100%;" id="category" onchange="dropChange()" name="category">
  <option value="">Choose a category</option>
  <?php
  // Establish a database connection
  $conn = mysqli_connect("localhost", "root", "", "project");

  // Check if the connection is successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve the course categories from the database
  $sql = "SELECT * FROM course_category";
  $result = mysqli_query($conn, $sql);

  // Generate the dropdown options
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value='" . $row['id'] ."'>" . $row['course_category'] . "</option>";
     
    }
  }

  // Close the database connection
  mysqli_close($conn);
  ?>
</select>

      <div id = "1">
      <?php
      ?>  <?php $cval?>
      <script>var ctval = document.getElementById('test').innerHTML;
    </script>
     <?php 
      // $selt  = "SELECT * FROM course_sub_category WHERE course_category_id =  ";
      // $result = mysqli_query($conn, $selt);
      // if (mysqli_num_rows($result) > 0) {
      //   while ($row = mysqli_fetch_assoc($result)) {
      //     echo "<option value='" . $row['id'] ."'>" . $row['course_sub_category'] . "</option>";
         
      //   }
      // }
      ?>
      </div>

            </div>
           
            <button type="submit" id="fom1" class="btn btn-primary" value="Login">SUBMIT</button>



</form>
        </div>
    </div>

      <script>

        function dropChange(){
          var tt =document.getElementById("category").value;
          console.log(tt);
          document.getElementById("test").innerHTML = tt;

        }

        <?php
       if(@$_GET['error']!=""){ 
        @$error = $_GET['error'];
        ?>
        alert("<?php echo $error?>");
        <?php
       }


       require 'footer.php' ;
        ?>
      </script>

      </body>

      </html>