
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PROFILE</title>
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
            align-items: stretch;
            flex-wrap: wrap;
            align-content: center;
        }
        .fomdiv1{
            width: 100%;
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
  .imdiv{
    width: 30px!important;
    cursor: pointer;
  }  
  .imdiv :hover{
    width: 50px!important;
    transition: transform .5s ease-in-out!important;
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
    margin-top: 150px;
    /* position:relative;
    top:200px; */
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
    @$tit2 = $_SESSION['uname'];;
    @$type = "individual";
  }
  ?>
  <?php
  function individual(){

    if (!empty($_SESSION['bname'])) {
      @$tit = $_SESSION['oname'];
      @$tit2 = $_SESSION['bname'];
      @$type = "business";
  }
    if (!empty($_SESSION['uname'])) {
      @$tit = $_SESSION['fname'];
      @$tit2 = $_SESSION['uname'];;
      @$type = "individual";
    }
  $uuname= $GLOBALS['tit2'];
    // $bname=$_SESSION['bname'];
    $type=$_SESSION['type'];

$indsele = "SELECT * FROM `individual` WHERE `uname`='$uuname'";
$indres = mysqli_query($GLOBALS['conn'], $indsele);
$indrow = mysqli_fetch_assoc($indres);
$fname = $indrow['fname'];
$lname = $indrow['lname'];
$bdate = $indrow['bdate'];
$uname = $indrow['uname'];
$avatarlink = $indrow['avatarlink'];
$email = $indrow['email'];
$phone = $indrow['phone'];
$desc = $indrow['description'];
$institute = $indrow['institute'];
$course = $indrow['course'];

$gender  = $indrow['gender'];
$city = $indrow['city'];
$state = $indrow['state'];
$country = $indrow['country'];

$uid_type = $indrow['uid_type'];
$sr=0;
?>
<div class="fordiv">
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Sr.no</th>
      <th>Feilds</th>
      <th>Change Them</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">First Name: <?php echo $fname;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#fname"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Last Name: <?php echo $lname;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#lname"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Birth Date: <?php echo $bdate;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#bdate"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Uname: <?php echo $uname;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#uname"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>

    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Profile image:</p> <img style="width:50px;"  src=" <?php echo $avatarlink;?>">
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#avatar"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">email: <?php echo $email;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#email"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>

    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">phone: <?php echo $phone;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#phone"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>

    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">descripttion: <?php echo $desc;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#desc"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>

      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Gender: <?php echo $gender;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#gender"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">city: <?php echo $city;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#city"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">State: <?php echo $state;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#state"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Country: <?php echo $country;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#country"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">PASSWORD:</p>
</td>
      <td>
         <a href="passwochecker?err">CHANGE PASSWORD SECURILY</a>
          
        </button>
      </td>
</tr>
  </tbody>
</table>
</div>








<!-- The Modal -->
<!-- fname modal -->
<div class="modal" id="fname">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit First Name</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=fname" method="post">
      <label for="fname" >Current : <?php echo $fname;?></label>
      <input type="text" name="fname" id="" placeholder="enter new first name here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- fname modal -->
<!-- lname modal -->
<!-- The Modal -->
<div class="modal" id="lname">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Last Name</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=lname" method="post">
      <label for="fname" >Current : <?php echo $lname;?></label>
      <input type="text" name="lname" id="" placeholder="enter new last name here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- lname modal -->

<!-- bdate modal -->
<!-- The Modal -->
<div class="modal" id="bdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Birth Day </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=bdate" method="post">
      <label for="fname" >Current : <?php echo $bdate;?></label>
      <input type="date" name="bdate" id="" placeholder="enter new Birth Day here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- bdate modal -->


<!-- uname modal -->


<!-- The Modal -->
<div class="modal" id="uname">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit User Name</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=uname" method="post">
      <label for="fname" >Current : <?php echo $uname;?></label>
      <input type="text" name="uname" id="" placeholder="enter new user name here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- uname modal -->

<!-- avatar modal -->


<!-- The Modal -->
<div class="modal" id="avatar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile Image</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=avatar" method="post"  enctype="multipart/form-data">
      <label for="fname" >Current : <img width="40px" src="<?php echo $avatarlink;?>"></label>
      <input type="file" name="file" id="" placeholder="enter new image here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- avatar modal -->


<!-- email modal -->


<!-- The Modal -->
<div class="modal" id="email">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Email</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=email" method="post">
      <label for="fname" >Current : <?php echo $email;?></label>
      <input type="email" name="email" id="" placeholder="enter new email here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<!-- email  modal -->


<!-- The Modal -->
<div class="modal" id="phone">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Phone</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=phone" method="post">
      <label for="fname" >Current : <?php echo $phone;?></label>
      <input type="number" name="phone" id="" placeholder="enter new phone number here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- email modal -->


<!-- desc  modal -->


<!-- The Modal -->
<div class="modal" id="desc">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Phone</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=desc" method="post">
      <label for="fname" >Current : <?php echo $desc;?></label>
      <input type="text" name="desc" id="" placeholder="enter new Short description here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- desc modal -->



<!-- gender  modal -->


<!-- The Modal -->
<div class="modal" id="gender">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit gender</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=gender" method="post">
      <label for="fname" >Current : <?php echo $gender;?></label>
      <input type="text" name="gender" id="" placeholder="enter new gender here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- gender modal -->
<!-- city  modal -->


<!-- The Modal -->
<div class="modal" id="city">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit city</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=city" method="post">
      <label for="fname" >Current : <?php echo $city;?></label>
      <input type="text" name="city" id="" placeholder="enter new city here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- city modal -->
<!-- state  modal -->


<!-- The Modal -->
<div class="modal" id="state">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit state</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=state" method="post">
      <label for="fname" >Current : <?php echo $institute;?></label>
      <input type="text" name="state" id="" placeholder="enter new state here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- state modal -->
<!-- country  modal -->


<!-- The Modal -->
<div class="modal" id="country">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit country</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=country" method="post">
      <label for="fname" >Current : <?php echo $institute;?></label>
      <input type="text" name="country" id="" placeholder="enter new country here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- country modal -->








    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/fc006f18de.js" crossorigin="anonymous"></script>
<?php

}






  ?>









<?php
  function business(){
    if (!empty($_SESSION['bname'])) {
      @$tit = $_SESSION['oname'];
      @$tit2 = $_SESSION['bname'];
      @$type = "business";
  }
    if (!empty($_SESSION['uname'])) {
      @$tit = $_SESSION['fname'];
      @$tit2 = $_SESSION['uname'];;
      @$type = "individual";
    }
  $bbname=$_SESSION['bname'];
    // $bname=$_SESSION['bname'];
    $type=$_SESSION['type'];

$indsele = "SELECT * FROM `business` WHERE `bname`='$bbname'";
$indres = mysqli_query($GLOBALS['conn'], $indsele);
$indrow = mysqli_fetch_assoc($indres);
$bname = $indrow['bname'];
$oname = $indrow['oname'];
$avatarlink = $indrow['avatarlink'];
$enums = $indrow['enums'];
$business_description = $indrow['business_description'];
$email = $indrow['email'];
$phone = $indrow['phone'];
$business_industry = $indrow['business_industry'];
$sdate = $indrow['sdate'];
$address = $indrow['address'];
$uid_type = $indrow['uid_type'];
$sr=0;
?>
<div class="fordiv">
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Sr.no</th>
      <th>Feilds</th>
      <th>Change Them</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Business Name: <?php echo $bname;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#bname"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Owner Name: <?php echo $oname;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#oname"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">No of Employees: <?php echo $enums;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#enums"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>

    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Business Logo:</p> <img style="width:50px;"  src=" <?php echo $avatarlink;?>">
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#avatar"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">email: <?php echo $email;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#email"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>

    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">phone: <?php echo $phone;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#phone"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>

    <tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">business descripttion: <?php echo $business_description;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#desc"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
     
      <td>
        <p class="fw-normal mb-1"> Business Start Date: <?php echo $sdate;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#sdate"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
   
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Address: <?php echo $address;?></p>
</td>
      <td>
        <button data-bs-toggle="modal" data-bs-target="#country"  type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
</tr>
<tr>
      <td>
        <div class="d-flex align-items-center">
         <p><?php echo $sr+=1;?></p>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">PASSWORD</p>
</td>
      <td>
         <u><a href="passwochecker?err">CHANGE PASSWORD SECURILY</a></u>
          
        </button>
      </td>
</tr>
  </tbody>
</table>
</div>








<!-- The Modal -->
<!-- bname modal -->
<div class="modal" id="bname">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Business Name</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $_SESSION['bname'];?>&t=<?php echo $_SESSION['type'];?>&ch=bname" method="post">
      <label for="fname" >Current : <?php echo $bname;?></label>
      <input type="text" name="bname" id="" placeholder="enter new Business name here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- bname modal -->
<!-- oname modal -->
<!-- The Modal -->
<div class="modal" id="oname">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit owner/C.E.O Name</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $_SESSION['bname'];?>&t=<?php echo $_SESSION['type'];?>&ch=oname" method="post">
      <label for="fname" >Current : <?php echo $oname;?></label>
      <input type="text" name="oname" id="" placeholder="enter new owner name here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- oname modal -->

<!-- sdate modal -->
<!-- The Modal -->
<div class="modal" id="bdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Number of employees </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $_SESSION['bname'];?>&t=<?php echo $_SESSION['type'];?>&ch=enums" method="post">
      <label for="fname" >Current : <?php echo $enums;?></label>
      <input type="date" name="enums" id="" placeholder="enter new Birth Day here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- bdate modal -->
<!-- avatar modal -->


<!-- The Modal -->
<div class="modal" id="avatar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Business Logo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=avatar" method="post"  enctype="multipart/form-data">
      <label for="fname" >Current : <img width="40px" src="<?php echo $avatarlink;?>"></label>
      <input type="file" name="file" id="" placeholder="enter new image here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- avatar modal -->


<!-- email modal -->


<!-- The Modal -->
<div class="modal" id="email">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Email</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=email" method="post">
      <label for="fname" >Current : <?php echo $email;?></label>
      <input type="email" name="email" id="" placeholder="enter new email here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<!-- email  modal -->


<!-- The Modal -->
<div class="modal" id="phone">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Phone</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=phone" method="post">
      <label for="fname" >Current : <?php echo $phone;?></label>
      <input type="number" name="phone" id="" placeholder="enter new phone number here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- email modal -->


<!-- desc  modal -->


<!-- The Modal -->
<div class="modal" id="desc">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Business Description</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=bdesc" method="post">
      <label for="fname" >Current : <?php echo $business_description;?></label>
      <input type="text" name="desc" id="" placeholder="enter new Short description here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- desc modal -->


<!-- sdate modal -->

<!-- The Modal -->
<div class="modal" id="sdate">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Business start Date</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=sdate" method="post">
      <label for="fname" >Current : <?php echo $sdate;?></label>
      <input type="date" name="sdate" id="" placeholder="enter new start date here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- sdate modal -->

<!-- country  modal -->


<!-- The Modal -->
<div class="modal" id="country">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Address</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <form action="edit_profile_back?u=<?php echo $tit2?>&t=<?php echo $_SESSION['type'];?>&ch=address" method="post">
      <label for="fname" >Current : <?php echo $address;?></label>
      <input type="text" name="address" id="" placeholder="enter new Adddress here">
      <input style="align-self:flex-start;" class="btn btn-primary" type="submit" value="Change">


     </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- country modal -->








    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/fc006f18de.js" crossorigin="anonymous"></script>
<?php

}
  ?>
  <?php 
  
if($type=="individual"){
    individual();
}
  ?>

<?php 
  
  if($type=="business"){
      business();
  }
    ?>
  <?php
  $err=isset($_GET['err'])?$_GET['err']:"";
 echo "<center><h1> $err </h1></center>";
  ?>
</body>
</html>