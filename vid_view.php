<?php
require "config.php";

$title = $_GET["link"];
$titl = "SELECT * FROM videos WHERE link = '$title'";
$titl2 = mysqli_query($conn, $titl);
$titl3 = mysqli_fetch_assoc($titl2);
$titl4 = $titl3["name"];
$slink = $titl3["link"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./imgs/favicon.ico" type="image/x-icon">
	<title><?php echo $titl4; ?></title>
	<style>
		.maindiv {
			width: 50%;
			margin: auto;
			margin-top: 120px;


		}

		.covd {
			background-image: url('./imgs/bi1.jpg');
			background-size: cover;
			background-position: center;
			align-content: flex-start;
			/* padding-top: 150px; */
			-webkit-backdrop-filter: brightness(80%);
			backdrop-filter: brightness(80%);
			padding-top: 50px;
			padding-bottom: 50px;
		}

		.sep {
			display: flex;
		}

		.exp {

			/* height: 400px; */
			width: 20%;
			margin: auto;
			margin-top: 120px !important;
			border: 2px solid black;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: space-around;
			align-items: center;
			align-content: center;
			margin-top: 50px;
			margin-bottom: 50px;
			border-radius: 15px;
			background-color: #fff;
			padding: 20px;

		}

		@media only screen and (max-width: 1000px) {
			.exp {
				display: none;
			}
		}
	</style>
</head>

<body>
	<?php
    session_start();
    //   require 'config.php';
    require "boot.php";
    require "nav.php";

    if (!empty($_SESSION["bname"])) {
        @$tit = $_SESSION["oname"];
        @$tit2 = $_SESSION["bname"];
        @$type = "business";

        @$avs = "bname";
        $id = $_SESSION["id"];
    }
    if (!empty($_SESSION["uname"])) {
        @$tit = $_SESSION["fname"];
        @$tit2 = $_SESSION["uname"];
        @$type = "individual";
        @$avs = "uname";
        $id = $_SESSION["id"];
    }
    ?>
	<div class="covd">

		<div class="sep">
			<div class="maindiv">
				<div class="mdv1">
					<div class="mddv1">
						<?php
                        $verification = ""; // or $verification = null;
                        $sql = "SELECT * FROM videos WHERE link = '$slink'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            // $img = $row['img'];
                            $name = $row["name"];
                            $link = $row["link"];
                        
                            $id = $row["id"];
                            $date = $row["datetime"];

                            $ndate = date("d-m-Y", strtotime($date));
                            // $time = $row['time'];
                            $uname = $row["uname"];
                            $ext = $row["ext"];
                            $caption = $row["caption"];
                            $likes = $row["likes"];
                            // $dislikes = $row["dislikes"];
                            $comments = $row["comments"];
                            $uname = $row["uname"];
                            $uid_type = $row["uid_type"];
                            $unsel = "SELECT * FROM $uid_type WHERE id = '$uname'";
                            $unsel2 = mysqli_query($conn, $unsel);
                            $unsel3 = mysqli_fetch_assoc($unsel2);
                            if ($uid_type == "business") {
                                $uplname = $unsel3["bname"];
                                $verified  = $unsel3["verification"];
                                if ($verified == "1") {
                                    $verification = "<i class='fas fa-check-circle' style='color:blue;'></i>";
                                }
                            }
                            if ($uid_type == "individual") {
                                $uplname = $unsel3["uname"];
                                $verified  = $unsel3["verification"];
                                if ($verified == "1") {
                                    $verification = "<i class='fas fa-check-circle' style='color:blue;'></i>";
                                }
                            }
                            $avlink = $row["avatarlink"];
                            $avatarlink = "<img src='$avlink' style='width:70px;border-radius:50%;'>";

                            if ($tit2 == $uplname) {
                                $delb = "1";
                            } else {
                                $delb = "0";
                            }

                            if ($ext == "mp4") {

                                $query = "SELECT * FROM like_table WHERE liker = '$tit2' AND content_link = '$link'";
                                // echo $query;
                                $resullt = mysqli_query($conn, $query);
                                if (mysqli_num_rows($resullt) > 0) {
                                    // User has already liked the image
                                    // echo "You have already liked this image.";

                                    $lv = "unlike";
                                } else {
                                    // User has not liked the image
                                    // echo "You have not liked this image.";
                                    $lv = "like";
                                }
                                $delvid = "delvid";
                        ?>
						<div class="card content">
							<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
								<a class="ripple hover-overlay">
									<h2 style="padding:50px;padding-bottom:10px;padding-top:20px;">
										<a style="text-decoration:none;" href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&view=<?php echo $uname; ?>&vt=<?php echo $uid_type ?>&sn="><?php echo   $avatarlink . "  " . $uplname . " " . $verification ?></a>
									</h2>
									<video id="video" class='img-fluid content' preload='metadata' controls>
										<source src="<?php echo $link; ?>" type='video/<?php echo $ext; ?>'>
									</video>


									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
								</a>
							</div>
							<div class="card-body">
								<h5 class="card-title"><?php echo $name; ?></h5>
								<h6>Uploaded on: <?php echo $ndate; ?></h6>
								<form method="POST" action="like_back_vid.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&ac=<?php echo $lv; ?>">
									<input type="hidden" name="link" value="<?php echo $link; ?>">
									<!-- <input class="btn btn-purple" type="submit" name="like" value="<?php echo $lv; ?>"> -->
									<button style="background-color:purple;color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-purple"> <i class="fas fa-heart pr-2" aria-hidden="true"></i> <?php echo $lv; ?></button>

								</form>

								<form style="margin-top:20px!important;" class="form-floating" method="POST" action="comment.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&ac=<?php echo "comment"; ?>&ct=video">
									<input type="hidden" name="link" value="<?php echo $link; ?>">
									<!-- <input class="btn btn-purple" type="submit" name="like" value="<?php echo $lv; ?>"> -->
									<div class="form-floating mb-3">
										<input name="comment" type="text" class="form-control" id="floatingInput" placeholder="Post A comment" required>
										<label for="floatingInput">Post A comment</label>
										<button style="color:#fff;background:#007bff;border:transparent;margin-top:20px!important;" type="submit" class="mask rgba-white-slight waves-effect waves-light btn btn-purple btn-floating light-blue waves-effect waves-light"><i style="color:#fff;" class="bi bi-send" aria-hidden="true"></i> Post</button>
									</div>
									<!-- <button style="background-color:purple;mask rgba-white-slight waves-effect waves-light btn btn-purplecolor:#fff;" type="submit" name="like" class=""> <i class="fas fa-heart pr-2" aria-hidden="true"></i> <?php echo $lv; ?></button> -->

								</form>
								<!-- <form method="POST" action="like_back_vid.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&ac=dislike">
                <input type="hidden" name="link" value="<?php echo $link; ?>">
                 <input type="submit" name="dislike" value="disLike">
                </form> -->
								<h6 class="card-text"><?php echo "Likes: " .
                                                                    $likes; ?></h6>
								<!-- <h6 class="card-text"><?php echo "Dislikes: " .
                                                                        $dislikes; ?></h6> -->
								<h6 class="card-text"><?php echo "Comments: " .
                                                                    $comments; ?></h6>
								<a class="btn btn-primary" style="color:#fff!important;" data-bs-toggle="modal" data-bs-target="#shcom">Show comments</a>
								<h6 class="card-text"><?php echo $caption; ?></h6>
								<!-- <a class="btn btn-primary" href="img_view.php?u=<?php echo $uname; ?>&link=<?php echo $link; ?>&t=individual">More Details</a> -->
								<?php if ($delb == 1) { ?>
								<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delimg">Delete</a>
								<?php } ?>
								<a class="btn btn-dark" href="report?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $uname; ?>&sqt=<?php echo $uid_type; ?>&rep=video&link=<?php echo $link; ?>">REPORT VIDEO</a>
							</div>
						</div>

					
					

						<?php
                            }
                        }
                        ?>
					</div>
				</div>
				<div class="mdv2">

				</div>
			</div>

			<div class="exp">
				<?php
                $ll = $_GET["link"];
                $sql2 = "SELECT * FROM videos ORDER BY RAND()";
                $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                $totalRows = mysqli_num_rows($result2);

                for ($i = 0; $i < 5; $i++) {
                    $row = mysqli_fetch_assoc($result2);
                    $plink = $row['link'];
                    $id = $row['id'];
                    // $uname = $row['uname'];
                    $ext = $row['ext'];
                    $name = $row['name'];
                    $date = $row['datetime'];
                    $ndate = date('d-m-Y', strtotime($date));
                    $likes = $row['likes'];
                    $comments = $row['comments'];
                    $uploader_avatar = $row['avatarlink'];
                    $uname = $row['uname'];
                    $caption = $row['caption'];
                    $uid_type = $row['uid_type'];
                    $avatarlink = $row['avatarlink'];

                    if($plink == $link){
                        continue;
                    }
                    $indns = "SELECT * FROM $uid_type WHERE id='$uname'";
                    $indn = mysqli_query($GLOBALS['conn'], $indns);
                    while ($row = mysqli_fetch_assoc($indn)) {
                        if (@$row['uname'] != "") {
                            $un = $row['uname'];
                        }
                        if (@$row['bname'] != "") {
                            $un = $row['bname'];
                        }
                        $val =  $row['verification'];
                        if ($val == 1) {
                            $validate = ' <img style="height:20px; width:25px;border-radius:10px;margin-left:-7px;" class="post__avatarimg" src ="./imgs/verified.png" ';
                        } else {
                            $validate = "";
                        }



                        if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {



                ?>


				<div class="post" style="border-bottom:3px solid grey;padding: 9px;">
					<div class="post__header">
						<div class="post__avatar">
							<img style="width:90px" class="post__avatarimg rounded-pill" src="<?php echo $avatarlink; ?>">
						</div>
						<?php
                                    echo "<h3> <a style='color:#000; text-decoration:none;' href='profile.php?u=$uname&t=$uid_type'>$un $validate</a></h3> ";
                                    ?>
					</div>
					<h3></h3>

					<div style="border:none!important;" class="card content">
						<div style="border:transparent!important;" class="bg-image hover-overlay ripple content" data-mdb-ripple-color="light">
							<a href="vid_view.php?u=<?php echo $uname; ?>&link=<?php echo $plink; ?>&t=individual">
								<video class='img-fluid content' preload='metadata'>
									<source src="<?php echo $plink; ?>" type='video/<?php echo $ext; ?>'>
								</video>

								<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $name; ?></h5>
							<a style="padding-bottom:20px;" href="profile_view.php?u=<?php echo $GLOBALS['tit2']; ?>&vt=<?php echo $GLOBALS['type']; ?>&view=<?php echo $uname; ?>&sn=">
								<h6 class="card-text text-dark"><?php echo "<b>" . "@" . $un . "</b>" . " " . $caption; ?></h6>
							</a>

							<h6 style="margin-top:20px;">Uploaded on: <?php echo $ndate; ?></h6>
							<h6 class="card-text"><?php echo "Likes: " . $likes; ?></h6>
							<h6 class="card-text"><?php echo "Comments: " . $comments; ?></h6>




						</div>
					</div>
				</div>
				<!-- </div> -->
				<?php
                        }
                    }
                }

                ?>
			</div>
		</div>
	</div>



	<!-- The Modal -->
    <div class="modal fade" id="shcom">
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Comments</h4>
										<!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<?php
                                                $shcon = "SELECT * FROM comment_table WHERE content_link = '$link' ORDER BY datetime DESC";
                                                $shconres = mysqli_query($conn, $shcon);
                                                if (mysqli_num_rows($shconres) > 0) {
                                                    while (
                                                        $shconrow = mysqli_fetch_assoc(
                                                            $shconres
                                                        )
                                                    ) {

                                                        $cid = $shconrow["id"];
                                                        $comid =
                                                            $shconrow["comment_id"];

                                                        $cont = $shconrow["comment"];
                                                        $clink =
                                                            $shconrow["content_link"];
                                                        $commenter =
                                                            $shconrow["commenter"];

                                                        $commenter_type =  $shconrow['commenter_type'];
                                                        // echo $commenter;
                                                        $cposter =
                                                            $shconrow["content_poster"];
                                                        $poster_type = $shconrow["content_poster_type"];
                                                        $cdate = $shconrow["datetime"];
                                                        // $ncdate = date('d-m-Y', strtotime($cdate));
                                                        $cavatar =
                                                            $shconrow["cavatarlink"];

                                                        $cverified = "";
                                                        $namsel = "SELECT * FROM $commenter_type WHERE id = '$commenter'";
                                                        $namres = mysqli_query($conn, $namsel);
                                                        if (mysqli_num_rows($namres) > 0) {
                                                            while ($namrow = mysqli_fetch_assoc($namres)) {
                                                                if ($commenter_type == "individual") {
                                                                    $cuname = $namrow["uname"];
                                                                    $cavatar = $namrow["avatarlink"];
                                                                    $cverification = $namrow["verification"];

                                                                    if ($cverification == 1) {
                                                                        $cverified = "<i class='fas fa-check-circle' style='color:blue;'></i>";
                                                                    }
                                                                }

                                                                if ($commenter_type == "business") {
                                                                    $cuname = $namrow["bname"];
                                                                    $cavatar = $namrow["avatarlink"];
                                                                    $cverification = $namrow["verification"];
                                                                    if ($cverification == 1) {
                                                                        $cverified = "<i class='fas fa-check-circle' style='color:blue;'></i>";
                                                                    }
                                                                }
                                                            }
                                                            $possel = "SELECT * FROM $poster_type WHERE id = '$cposter'";
                                                            $posres = mysqli_query($conn, $possel);
                                                            if (mysqli_num_rows($posres) > 0) {
                                                                while ($posrow = mysqli_fetch_assoc($posres)) {
                                                                    if ($poster_type == "individual") {
                                                                        $cpuname = $posrow["uname"];
                                                                        $cpavatar = $posrow["avatarlink"];
                                                                        $cpverification = $posrow["verification"];

                                                                        if ($cpverification == 1) {
                                                                            $cpverified = "<i class='fas fa-check-circle' style='color:blue;'></i>";
                                                                        }
                                                                    }
                                                                    if ($poster_type == "business") {
                                                                        @$cpuname = $posrow["bnane"];
                                                                        @$cpavatar = $posrow["bavatarlink"];
                                                                        @$cpverification = $posrow["bverification"];
                                                                        if ($cpverification == 1) {
                                                                            $cpverified = "<i class='fas fa-check-circle' style='color:blue;'></i>";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                ?>
										<section style="background-color: #eee;">
											<div class="container py-1 h-100">
												<div class="coloumn d-flex justify-content-center align-items-center h-100">
													<div class="col col-md-9 col-lg-7 col-xl-11">
														<div class="card" style="border-radius: 15px; background-color: #93e2bb;">
															<div class="card-body p-4 text-black">
																<div>
																	<div class="d-flex align-items-center justify-content-between mb-3">
																		<p class="small mb-0"><i class="far fa-clock me-2"></i><?php echo $cdate; ?></p>
																		<p class="fw-bold mb-0">
																			<?php if ($tit2 == $cuname || $tit2 == $cpuname) { ?>
																			<a class="btn btn-danger" href="delcon?u=<?php echo $tit2; ?>&type=<?php echo $type ?>&link=<?php echo $link; ?>&ac=delcom_v&comid=<?php echo $comid; ?>">Delete</a>
																			<?php } ?>
																		</p>
																	</div>

																</div>
																<div class="d-flex align-items-center mb-4">
																	<div class="flex-shrink-0">
																		<img style="width:50px;border-radius:20px;" class src="<?php echo $cavatar; ?>">
																	</div>
																	<div class="flex-grow-1 ms-3">
																		<div class="d-flex flex-row align-items-center mb-2">
																			<h3 class="mb-0 me-2"><a style="text-decoration:none;" href="profile_view.php?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&view=<?php echo $commenter ?>&vt=<?php echo $commenter_type ?>&sn="><?php echo "@" .
                                                                                                                                                                                                                                                                                                $cuname . " " . $cverified ?></a></h3>



																		</div>
																		<div class="d-flex flex-row align-items-center mb-2">
																			<h4 class="mb-0 me-2"><?php echo $cont; ?></h4>

																		</div>
																		<div>
																			<p class="fw-bold mb-0">

																				<a class="btn btn-dark" href="report?u=<?php echo $tit2; ?>&t=<?php echo $type; ?>&sq=<?php echo $commenter; ?>&sqt=<?php echo $commenter_type; ?>&rep=comment&comid=<?php echo $comid; ?>">REPORT</a>

																			</p>

																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</section>

										<?php
                                                    }
                                                }
                                                if (mysqli_num_rows($shconres) < 0) {
                                                    echo "No comments";
                                                }
                                                ?>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>

	<!-- The Modal -->
    <div class="modal fade" id="delimg">
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">IMAGE DELETION CONFIRMATION</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<p>ARE YOU SURE YOU WANT TO DELETE THIS IMAGE</p>
										<form method="POST" action="delcon.php?u=<?php echo $tit2; ?>&link=<?php echo $link; ?>&ac=<?php echo $delvid; ?>">
											<input type="hidden" name="link" value="<?php echo $link; ?>">
											<!-- <input class="btn btn-purple" type="submit" name="like" value="<?php echo $lv; ?>"> -->
											<button style="color:#fff;" type="submit" name="like" class="mask rgba-white-slight waves-effect waves-light btn btn-danger"> <i class="fa-solid fa-trash" aria-hidden="true"></i> DELETE VIDEO</button>

										</form>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>

	<?php require 'footer.php'; ?>


	<script>
		// Function to handle keydown events
		function handleKeyDown(event) {
			// Check if the "F" key is pressed
			if (event.key === "f") {
				// Toggle fullscreen mode on the video element
				const videoElement = document.getElementById("video");

				if (document.fullscreenElement || // Standard syntax
					document.webkitFullscreenElement || // Chrome, Safari and Opera syntax
					document.mozFullScreenElement || // Firefox syntax
					document.msFullscreenElement) { // IE/Edge syntax
					// Exit fullscreen
					if (document.exitFullscreen) {
						document.exitFullscreen();
					} else if (document.mozCancelFullScreen) {
						document.mozCancelFullScreen();
					} else if (document.webkitExitFullscreen) {
						document.webkitExitFullscreen();
					} else if (document.msExitFullscreen) {
						document.msExitFullscreen();
					}
				} else {
					// Enter fullscreen
					if (videoElement.requestFullscreen) {
						videoElement.requestFullscreen();
					} else if (videoElement.mozRequestFullScreen) {
						videoElement.mozRequestFullScreen();
					} else if (videoElement.webkitRequestFullscreen) {
						videoElement.webkitRequestFullscreen();
					} else if (videoElement.msRequestFullscreen) {
						videoElement.msRequestFullscreen();
					}
				}
			}

			// Check if the left arrow key is pressed
			if (event.key === "ArrowLeft") {
				// Move the video playback 10 seconds back
				const videoElement = document.getElementById("video");
				videoElement.currentTime -= 10;
			}
			if (event.key === "ArrowRight") {
				// Move the video playback 10 seconds back
				const videoElement = document.getElementById("video");
				videoElement.currentTime += 10;
			}

			// Check if the spacebar key is pressed
			if (event.key === " ") {
				// Play or pause the video
				const videoElement = document.getElementById("video");
				if (videoElement.paused) {
					videoElement.play();
				} else {
					videoElement.pause();
				}
			}
		}

		// Attach the keydown event listener to the document
		document.addEventListener("keydown", handleKeyDown);

		window.onkeydown = function(e) {
			if (e.keyCode === 32 && e.target === document.body) {
				e.preventDefault();
			}
		};
	</script>
</body>

</html>