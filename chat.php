<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
    <title>Document</title>
    <style>
        .maindiv {
            border: 1px solid black;
            width: 100%;
            height: 100%;
            margin: auto;
            background: #f1f1f1;
        }

        .supdiv {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 100%;
            margin: auto;
            padding: 10px;
        }

        .mddv1 .mddv2 {
            width: 50%;
            border: 1px solid black;
        }
    </style>
</head>
<?php
session_start();
if ($_SESSION['loggedin'] != true) {
    header("location: login.php");
  }
require "config.php";
require "boot.php";
require "nav.php";

if (!empty($_SESSION["bname"])) {
    @$tit = $_SESSION["oname"];
    @$tit2 = $_SESSION["bname"];
    @$type = "business";
}
if (!empty($_SESSION["uname"])) {
    @$tit = $_SESSION["fname"];
    @$tit2 = $_SESSION["uname"];
    @$type = "individual";
}
?>

<body class="bg-dark">
    <div style="border-bottom: transparent;padding-top:150px;" class="bg-dark maindiv card testimonial-card">
        <?php
        @$sq = $_GET["sq"];
        @$sqt = $_GET["sqt"];

        $vchat = "SELECT * FROM chat WHERE sender = '$tit2' AND receiver = '$sq' OR sender = '$sq' AND receiver = '$tit2'";
        $vchat2 = mysqli_query($conn, $vchat);
        echo json_encode($vchat2);
        while ($chrow = mysqli_fetch_assoc($vchat2)) {

            $sender = $chrow["sender"];
            $receiver = $chrow["receiver"];
            $message = $chrow["message"];
            $datetime = $chrow["datetime"];
            $suid = $chrow["suid_type"];
            $ruid = $chrow["ruid_type"];
            $chatid = $chrow["chat_id"];
            $bavs = " SELECT business.avatarlink,business.bname, chat.sender,chat.receiver
FROM business
JOIN chat
ON business.bname=chat.sender or business.bname = chat.receiver";
            $bavsres = mysqli_query($conn, $bavs);
            $bavsrow = mysqli_fetch_assoc($bavsres);
            $bav = $bavsrow["avatarlink"];
            // $iavs = "SELECT individual.avatarlink,individual.uname, chat.sender,chat.receiver
            $iavs = "SELECT individual.avatarlink,individual.uname, chat.sender,chat.receiver
FROM individual 
JOIN chat
ON individual.uname=chat.sender or individual.uname = chat.receiver";
            $iavsres = mysqli_query($conn, $iavs);
            $iavsrow = mysqli_fetch_assoc($iavsres);
            $iav = $iavsrow["avatarlink"];
            $iuidfetch = "SELECT * from individual where uname = '$sender' or uname = '$receiver' ";
            $iuidfetchres = mysqli_query($conn, $iuidfetch);
            $iuidfetchrow = mysqli_fetch_assoc($iuidfetchres);
            if (mysqli_num_rows($iuidfetchres) > 0) {
                $iuid = $iuidfetchrow["uid_type"];
                // $iuid = $iuidfetchrow['uid_type'];
            }
            // $iuid = $iuidfetchrow['uname'];
            $buidfetch = "SELECT * from business where bname = '$sender' or bname = '$receiver' ";
            $buidfetchres = mysqli_query($conn, $buidfetch);
            $buidfetchrow = mysqli_fetch_assoc($buidfetchres);
            if (mysqli_num_rows($buidfetchres) > 0) {
                $buid = $buidfetchrow["uid_type"];
                // $iuid = $iuidfetchrow['uid_type'];
            }

            // $buid = $buidfetchrow['bname'];
            // echo $bav
            ?>

            <div class="supdiv">
                <div style="min-width:22%;" class="mddv1">
                    <?php if ($receiver == $tit2) { 
                        
                       if($suid == "individual"){
                           $uisd = "SELECT * from individual where uname = '$sender'";
                            $uisdres = mysqli_query($conn,$uisd);
                            $uisdrow = mysqli_fetch_assoc($uisdres);
                            $uidnum = mysqli_num_rows($uisdres);
                            if($uidnum > 0){
                                $suav = $uisdrow["avatarlink"];
                            }
                          }
                          if($suid == "business"){
                            $uisd = "SELECT * from business where bname = '$sender'";
                             $uisdres = mysqli_query($conn,$uisd);
                             $uisdrow = mysqli_fetch_assoc($uisdres);
                             $uidnum = mysqli_num_rows($uisdres);
                             if($uidnum > 0){
                                 $suav = $uisdrow["avatarlink"];
                             }
                           }
                        
                        ?>
                        <div class="card text-black bg-info mb-3" style="max-width: 20rem;">
                            <div class="card-header">
                                
                                <p><img style="width:50px;" src="<?php
                                                                   echo $suav;
                                                                    ?>" alt=""> <?php echo strtoupper(
                                                                                    $sender
                                                                                ); ?></p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $message; ?></h5>
                                <p style="color: rgba(9, 9, 9, 0.950)!important;text-align:right!important;font-size:10px" class="card-text"><?php echo $datetime; ?></p>
                            </div>
                            <a href="report?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=chat&cid=<?php echo $chatid; ?>">
                            <button style="font-size:12px;padding:2px!important;align-self:flex-end!important;" type="button" class="btn btn-dark">
                               Report Message

                            </button></a>
                        </div>
                    <?php } ?>
                </div>
                <div style="min-width:22%;margin-bottom:20px;" class="mddv2">

                    <?php if ($sender == $tit2) { 
                        
                        if($suid == "individual"){
                            $uisd = "SELECT * from individual where uname = '$tit2'";
                             $uisdres = mysqli_query($conn,$uisd);
                             $uisdrow = mysqli_fetch_assoc($uisdres);
                             $uidnum = mysqli_num_rows($uisdres);
                             if($uidnum > 0){
                                 $suav = $uisdrow["avatarlink"];
                                //  echo $suav;
                             }
                           }
                           if($suid == "business"){
                             $uisd = "SELECT * from business where bname = '$tit2'";
                              $uisdres = mysqli_query($conn,$uisd);
                              $uisdrow = mysqli_fetch_assoc($uisdres);
                              $uidnum = mysqli_num_rows($uisdres);
                              if($uidnum > 0){
                                  $suav = $uisdrow["avatarlink"];
                                //   echo $suav;
                              }
                            }
                        ?>

                        <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                            <div class="card-header">
                                <p><img style="width:50px;" src="<?php
                                                                    echo $suav;
                                                                    ?>" alt=""> <?php echo strtoupper(
                                                                                    $sender
                                                                                ); ?></p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $message; ?></h5>
                                <p style="color: rgba(255, 255,255, 0.850)important;text-align:right!important;font-size:10px" class="card-text"><?php echo $datetime; ?></p>
                            </div>
                                                      
                        </div>
                    <?php } ?>
                </div>
            </div>
        

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Report Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      Describe your issue
                      <form action="report?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET["sq"]; ?>&sqt=<?php echo $_GET['sqt'];?>&rep=chat" method="post">
                        <label for="issue"></label>
                        <input style="margin-bottom:10px!important;" type="text" name="issue" id="" placeholder=" Describe your issue here"> <br>
                        
                        
                        <?php
                    $cids = "SELECT * FROM chat WHERE sender = '$tit2' AND receiver = '$sq' OR sender = '$sq' AND receiver = '$tit2'";
                    $cidsres = mysqli_query($conn, $cids);
                    $cidsrow = mysqli_fetch_assoc($cidsres);
                    $cid = $cidsrow["chat_id"];
                    echo $cid;
                    
                    ?>
                    
                    <input type="hidden" name="chatid" value="<?php echo $cid; ?>"> <br>
                    <input style="margin-top:20px!important;" class="btn btn-danger "type="submit" value="submit">
                      </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <?php
        
    }
        ?>
    </div>
    <i id="hang"></i>
    <form style="position:fixed;bottom:1px;left:0.5%;background:#fff; width:99%;margin:auto!important;z-index:999;" class="rounded-pill"  action="chat_back.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $_GET['sq']; ?>&sqt=<?php echo $_GET['sqt'];?>" method="post">
                        
                        <div class="rounded-pill input-group">
                            <input  id="user" placeholder="Send Message" aria-label="Search" aria-describedby="search-addon" class="form-control rounded" type="search" required name="message" id="" value="">
                            <button style="padding:5px!important;margin-right:5px!important;border:transparent!important;" type="submit" class="btn btn-outline-primary"><i style="font-size:25px;" class="fa-brands fa-telegram"></i></button>
</div>

                    </form>
</body>

</html>