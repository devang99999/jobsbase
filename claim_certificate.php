<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="print.css" media="print"> -->
    <title>Document</title>
    <style>
        

        * {
            font-weight: bold;
        }

        .maindiv {
            width: 1142px !important;
            height: 882px !important;
            margin: auto !important;
            background-color: #f5f6f7 !important;
            padding: 10px !important;
            border: 15px solid #0a0a23;

        }

        .mendiv {
            width: 100% !important;
            background-color: #0a0a23 !important;
            height: auto !important;
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            align-items: center !important;
            padding: 30px !important;
        }

        .nv1 {
            width: 20% !important;
        }

        .nv2 {
            width: 40% !important;
            padding-top: 2%;

        }

        .date {
            color: white !important;
            /* font-size: 20px!important; */
            font-weight: bold !important;
            margin-left: 20px !important;
        }

        .condiv {
            margin-top: 30px;
        }
        @media print {
  @page {
    size: A4 landscape;
  }

  .pradj {
    font-size: 20px !important;
  }

  .maindiv {
    width: 1142px !important;
    height: 882px !important;
    margin: auto !important;
    background-color: #f5f6f7 !important;
    padding: 10px !important;
    border: 15px solid #0a0a23;
  }

  .mendiv {
    width: 100% !important;
    background-color: #0a0a23 !important;
    height: auto !important;
    display: flex !important;
    flex-direction: row !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding: 0px 30px !important;
  }

  .nv1 {
    width: 20% !important;
    height: 200px !important;
  }

  .nv2 {
    width: 30% !important;
    padding-top: 2%;
  }

  .date {
    color: white !important;
    font-weight: bold !important;
    margin-left: 20px !important;
  }

  .condiv {
    margin-top: 30px;
  }

  .mendiv > nav > img {
    height: 20%;
    width: auto;
  }
}

  
    </style>
</head>

<body>
    <?php
    session_start();
    @require 'config.php';
    // require 'boot.php';
    require 'nav.php';

    if (!empty($_SESSION['bname'])) {
        @$tit = $_SESSION['oname'];
        @$tit2 = $_SESSION['bname'];
        @$id = $_SESSION['id'];
        @$type = "business";
    }
    if (!empty($_SESSION['uname'])) {
        @$tit = $_SESSION['fname'];
        @$tit2 = $_SESSION['uname'];
        @$type = "individual";
        @$id = $_SESSION['id'];
    }

    $cid = $_GET['cid'];
    $joid = $_GET['joid'];
    

    $jisds = "SELECT * FROM `certificate` WHERE `joiner_id` = '$joid' AND `course_id` = '$cid'";
    $jisdsq = mysqli_query($conn, $jisds);
    $jisdsqrc = mysqli_num_rows($jisdsq);
    $jisdsqr = mysqli_fetch_array($jisdsq);
    $cerid = $jisdsqr['certificate_id'];
    $date = $jisdsqr['datetime'];
    $odate = new DateTime($date);
    $fdate = $odate->format('Y-m-d');

    $jdets = "SELECT * FROM `joiner_table` WHERE `joiner_id` = '$joid'";
    $jdetsq = mysqli_query($conn, $jdets);
    $jdetsqr = mysqli_fetch_array($jdetsq);
    $juname = $jdetsqr['joiner_uname'];
    $juid = $jdetsqr['joiner_type'];
    $uuname = $jdetsqr['uploader_uname'];
    $uuid = $jdetsqr['uploader_type'];

    $joisele = "SELECT * FROM `$juid` WHERE `id` = '$juname'";
    $joiseleq = mysqli_query($conn, $joisele);
    $joiseleqr = mysqli_fetch_array($joiseleq);
    $fname = $joiseleqr['fname'];
    $lname = $joiseleqr['lname'];


    $joisele2 = "SELECT * FROM `$uuid` WHERE `id` = '$uuname'";
    $joiseleq2 = mysqli_query($conn, $joisele2);
    $joiseleqr2 = mysqli_fetch_array($joiseleq2);
    if (@$joiseleqr2['uname'] != "" ) {
        $un = $joiseleqr2['uname'];
        $ver = $joiseleqr2['verification'];
       
        if ($ver == 1) {
          $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
        } else {
          $validate = "";
        }
      }
      
      if (@$joiseleqr2['bname'] != "" ) {
        $un = $joiseleqr2['bname'];
        $ver = $joiseleqr2['verification'];

        if ($ver == 1) {
          $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
        } else {
          $validate = "";
        }
       
      }
      
      $cns = "SELECT * FROM `course` WHERE `course_id` = '$cid'";
        $cnsq = mysqli_query($conn, $cns);
        $cnsqr = mysqli_fetch_array($cnsq);
        $cname = $cnsqr['course_name'];




    





    ?>
      
    <div class="maindiv" id="certi">
        <div class="mendiv">
            <div class="nv1">
                <img style="width:100%; border-radius:5%;" src="./imgs/jobsbase.png" alt="">
            </div>
            <div class="nv2">
                <h3 class="date">Issud On <?php echo $fdate;?></h3>
            </div>
        </div>
        <div class="condiv">
            <center>
                <h4 class="pradj" style="color:#858485;">THIS CERTIFIES THAT </h4>
            </center> <br>
            <b>
                <center>
                    <h4 style="color:#1f1f36;"><?php echo $fname."  ".$lname?> </h4>
                </center>
            </b> <br>
            <center>
                <h4 class="pradj" style="color:#858485;">HAS SUCCESSFULLY COMPLETED THE COURSE</h4>
            </center> <br>
            <center>
                <h4  class="pradj"style="color:#1f1f36;"><?php echo $cname;?></h4>
            </center> <br>
            <center>
                <h4 class="pradj" style="color:#858485;">Uploader By <?php echo $un;?></h4>
            </center> <br>
            <center style="border-bottom:2px solid #000; width:30%;margin:auto;"><span><img style="height:100px;width:100%;" src="./imgs/sign.png" alt=""></span></center>

            <center>
                <h4 class="pradj" style="color:#1f1f36;">DEVANG GANDHI </h4>
            </center> <br>
            <center>
                <h4  class="pradj"style="color:#858485;">HEAD OF CERTIFICATE DISTRIBUTION ,JOBSBASE </h4>
            </center> <br>
            <br>
            <center>
                <h4 class="pradj" style="color:#858485;"><a href="#">Verify This Certificate Here certificate id:<?php echo $cerid;?></a></h4>
            </center> <br>
        </div>

    </div>
    <center>
        <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
    </center>



    <script>
        function myFunction() {
            var divContents = document.getElementById("certi").innerHTML;
            var printWindow = window.open("", "", "height=600,width=800");
            printWindow.document.write("<html><head><title>Print</title></head><body>" + divContents + "</body></html>");
            printWindow.document.close();
            printWindow.onload = function() {
                printWindow.print();
            };
        }
    </script>

  
</body>

</html>