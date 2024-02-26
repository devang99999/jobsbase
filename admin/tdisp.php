<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
</head>
<style>
  .dash {
    display: grid;
    grid-template-columns: repeat(3, 2fr);
    grid-gap: 10px;
    padding: 30px;
  }
</style>

<body>
  <?php

  function admin()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">ADMINS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Avatar
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    User Name
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Phone Number
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Website
                  </th>
                  <th>
                    Admin Level
                  </th>
                  <!-- <th>
                    Edit
                  </th> -->
                  <!-- <th>
                    Delete
                  </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM admin_db";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $ad3 = mysqli_fetch_assoc($ad2)
              ) {
                $name = $ad3['name'];
                $uname = $ad3['uname'];
                $avatarlink = $ad3['avatarlink'];
                $desc  = $ad3['description'];

                $phone = $ad3['phone'];
                $email = $ad3['email'];
                $website = $ad3['website'];
                $admin_level = $ad3['admin_level'];
                $website = $ad3['website'];




                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td class="py-1">

                      <img src="..//<?php echo $avatarlink; ?>" alt="image" />
                    </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $uname; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $website; ?></td>
                    <td><?php echo $admin_level; ?></td>
                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td> -->
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <?php

  function imgs()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">IMAGES ON OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Uploader Avatar
                  </th>
                  <th>
                    File Title
                  </th>
                  <th>
                    Uploader User Name
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Caption
                  </th>

                  <th>
                    Likes
                  </th>
                  <th>
                    Comments
                  </th>
                  <th>
                    Upload Time
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Edit
                  </th>
                  <!-- <th>
                    Delete
                  </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM imgs";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
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
                $status = $row["status"];
                $avatarlink = $row["avatarlink"];
                $comments = $row["comments"];
                $datetime = $row["datetime"];




                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td class="py-1">

                      <img src="..//<?php echo $avatarlink; ?>" alt="image" />
                    </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $uname; ?></td>
                    <td><a target="_blank" href="../<?php echo $link; ?>"><img data-bs-toggle="modal" data-bs-target="#ph" src="../<?php echo $link ?>" alt=""></a></td>
                    <td><?php echo $caption; ?></td>
                    <td><?php echo $likes; ?></td>
                    <td><?php echo $comments; ?></td>
                    <td><?php echo $datetime; ?></td>
                    <td><?php echo $status; ?></td>

                    <td><a href="admin_edit?tab=imgs&cerid=<?php echo $link;?>&status=<?php echo $status;?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                     <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                    
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>




  <?php

  function videos()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">VIDOES ON OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Uploader Avatar
                  </th>
                  <th>
                    File Title
                  </th>
                  <th>
                    Uploader User Name
                  </th>
                  <th>
                    Video
                  </th>
                  <th>
                    Caption
                  </th>

                  <th>
                    Likes
                  </th>
                  <th>
                    Comments
                  </th>
                  <th>
                    Upload Time
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Edit
                  </th>
                  <!-- <th>
                    Delete
                  </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM videos ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
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
                $status = $row["status"];
                $avatarlink = $row["avatarlink"];
                $comments = $row["comments"];
                $datetime = $row["datetime"];




                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td class="py-1">

                      <img src="..//<?php echo $avatarlink; ?>" alt="image" />
                    </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $uname; ?></td>
                    <td><a target="_blank" href="../<?php echo $link; ?>"><video style="width:100px;">
                          <source src="../<?php echo $link; ?>" type="video/<?php echo $ext; ?>">Your browser does not support the video tag.
                        </video></a></td>
                    <td><?php echo $caption; ?></td>
                    <td><?php echo $likes; ?></td>
                    <td><?php echo $comments; ?></td>
                    <td><?php echo $datetime; ?></td>
                    <td><?php echo $status; ?></td>

                    <td><a href="admin_edit?tab=video&cerid=<?php echo $link;?>&status=<?php echo $status;?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>


  <?php

  function chat()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">CHATS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Chat id </th>
                  <th> Contact id </th>
                  <th> Message </th>
                  <th> Sender id</th>
                  <th> Reciever id </th>
                  <th> Sender uid </th>
                  <th> Reciever uid</th>
                  <th> Status </th>
                  <th> Time </th>
                  <th> Edit </th>
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM chat ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $chat_id = $row['chat_id'];
                $contact_id = $row["contact_id"];
                $sender = $row["sender"];
                $receiver = $row["receiver"];
                $message = $row["message"];
                $suid_type = $row["suid_type"];
                $ruid_type = $row["ruid_type"];
                $status = $row["status"];
                $datetime = $row["datetime"];



                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $chat_id; ?></td>
                    <td><?php echo $contact_id; ?></td>
                    <td><?php echo $sender; ?></td>
                    <td><?php echo $receiver; ?></td>
                    <td><?php echo $message; ?></td>
                    <td><?php echo $suid_type; ?></td>
                    <td><?php echo $ruid_type; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $datetime; ?></td>

                    <td><a href="admin_edit?tab=chat&cerid=<?php echo $chat_id;?>&status=<?php echo $status;?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>



  <?php

  function contact()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">CONNECTONS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Contact id </th>
                  <th> user 1 id </th>
                  <th> user 1 uid </th>
                  <th> user 2 id </th>
                  <th> user 2 uid </th>
                  <th> Status </th>
                  <th> Time </th>
                  <!-- <th> Edit </th>
                  <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM message_table ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $contact_id = $row["contact_id"];
                $user1 = $row["user_1"];
                $user1_uid = $row["user_1_uid"];
                $user2 = $row["user_2"];
                $user2_uid = $row["user_2_uid"];
                $status = $row["status"];
                $datetime = $row["datetime"];



                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $contact_id; ?></td>
                    <td><?php echo $user1; ?></td>
                    <td><?php echo $user1_uid; ?></td>
                    <td><?php echo $user2; ?></td>
                    <td><?php echo $user2_uid; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $datetime; ?></td>

                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td>
                    <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <?php

  function comment()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">CHATS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Comment id </th>
                  <th> Comment </th>
                  <th> Content Link </th>
                  <th> Commenter </th>
                  <th> Content Poster</th>
                  <th> Status </th>
                  <th> Time </th>
                  <th> Edit </th>
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM comment_table ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $comment_id = $row['comment_id'];
                $comment = $row["comment"];
                $content = $row["content_link"];
                $commenter = $row["commenter"];
                $content_poster = $row["content_poster"];
                $status = $row["status"];
                $datetime = $row["datetime"];



                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $comment_id; ?></td>
                    <td><?php echo $comment; ?></td>
                    <td><a target="_blank" href="../<?php echo $content; ?>"><?php echo $content; ?></a></td>
                    <td><?php echo $commenter; ?></td>
                    <td><?php echo $content_poster; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $datetime; ?></td>

                    <td><a href="admin_edit?tab=comment&cerid=<?php echo $comment_id;?>&status=<?php echo $status;?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>


  <?php

  function follower()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">CHATS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Follow id </th>
                  <th> Follower id </th>
                  <th> Following id </th>
                  <th> Follower uid</th>
                  <th> Following uid </th>
                  <th> Time </th>
                  <th> Edit </th>
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM follower ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $follow_id = $row['follow_id'];
                $follower = $row["follower"];
                $folllower_uid = $row["follower_uid"];
                $following = $row["following"];
                $following_uid = $row["following_uid"];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $follow_id; ?></td>
                    <td><?php echo $follower; ?></td>
                    <td><?php echo $folllower_uid; ?></td>
                    <td><?php echo $following; ?></td>
                    <td><?php echo $following_uid; ?></td>
                    <td><?php echo $time; ?></td>


                    <td><button type="button" class="btn btn-info">EDIT</button></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>





  <?php

  function job_category()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">CHATS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Job Category </th>
                  <th> Time </th>
                  <!-- <th> Edit </th>
                  <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM job_category ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $job_category = $row['job_category'];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $job_category; ?></td>
                    <td><?php echo $time; ?></td>


                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td> -->
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>




  <?php

  function likes()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">LIKES OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Like id </th>
                  <th> Content link </th>
                  <th> Liker </th>
                  <th> Content poster</th>
                  <th> Time </th>
                  <!-- <th> Edit </th>
                  <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM like_table ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $like_id = $row['like_id'];
                $content_link = $row["content_link"];
                $liker = $row["liker"];
                $content_poster = $row["content_poster"];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $like_id; ?></td>
                    <td><?php echo $content_link; ?></td>
                    <td><?php echo $liker; ?></td>
                    <td><?php echo $content_poster; ?></td>
                    <td><?php echo $time; ?></td>


                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td>
                    <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>



  <?php

  function jobs()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">JOBS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Job Category </th>
                  <th>Job Sub Category </th>
                  <th>Job Name </th>
                  <th>Job Link </th>
                  <th>Job Description </th>
                  <th>Job Poster </th>
                  <th>Avatar Link </th>
                  <th>Salary </th>
                  <!-- <th>Job Role </th> -->
                  <th>Job Location </th>
                  <th>Job Type </th>
                  <th>Phone </th>
                  <th>Email </th>
                  <th>Job Start Date </th>
                  <th>Application End Date </th>
                  <th>Status</th>
                  <th>Time </th>
                  <th> Edit </th>
                  <!-- <th> Delete </th> -->
                </tr>

              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM jobs ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $job_category_id = $row['job_category_id'];
                $job_sub_category_id = $row["job_sub_category_id"];
                $job_name = $row["job_name"];
                $job_link = $row["job_link"];
                $job_description = $row["job_description"];
                $job_poster = $row["poster"];
                $avatarlink = $row["avatarlink"];
                $salary = $row["salary"];
                // $job_role = $row["job_role"];
                $no_of_openings = $row["no_of_openings"];
                $job_type = $row["job_type"];
                $phone_number = $row["phone_number"];
                $email = $row["email"];
                $sdate = $row["sdate"];
                $application_edate = $row["application_edate"];
                $no_of_applicants = $row["no_of_applicants"];
                $status = $row["status"];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $job_category_id; ?></td>
                    <td><?php echo $job_sub_category_id; ?></td>
                    <td><?php echo $job_name; ?></td>
                    <td><?php echo $job_link; ?></td>
                    <td><?php echo $job_description; ?></td>
                    <td><?php echo $job_poster; ?></td>
                    <td><a target="_blank" href="../<?php echo $avatarlink; ?>"><img src="../<?php echo $avatarlink; ?>" alt=""></a></td>
                    <td><?php echo $salary; ?></td>
                    <!-- <td><?php echo $job_role; ?></td> -->
                    <td><?php echo $no_of_openings; ?></td>
                    <td><?php echo $job_type; ?></td>
                    <td><?php echo $phone_number; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $sdate; ?></td>
                    <td><?php echo $application_edate; ?></td>
                    <td><?php echo $no_of_applicants; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $time; ?></td>


                    <td><a href="admin_edit?tab=jobs&cerid=<?php echo $job_link;?>&status=<?php echo $status;?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>




  <?php

  function business()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">BUSINESS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Business Name </th>
                  <th>Owner Name </th>
                  <th>Avatar Link </th>
                  <th>Email </th>
                  <th>Phone Number </th>
                  <th>No of employees</th>
                  <th>Business Description </th>
                  <th>Business Industry </th>
                  <th>Address </th>
                  <th>Start Date </th>
                  <th>Following </th>
                  <th>Followers </th>
                  <th>Status</th>
                  <th>Verification</th>
                  <th>Lastlogin </th>
                  <th> Time </th>
                  <th> Edit </th>
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM business ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $bname = $row['bname'];
                $oname = $row["oname"];
                $avatarlink = $row["avatarlink"];
                $email = $row["email"];
                $phone = $row["phone"];
                $enums = $row["enums"];
                $business_description = $row["business_description"];
                $business_industry = $row["business_industry"];
                $address = $row["address"];
                $sdate = $row["sdate"];
                $following = $row["following"];
                $followers = $row["followers"];
                $lastlogin = $row["lastlogin"];
                $status = $row["status"];
                $verification = $row["verification"];
                $time = $row["datetime"];
                $uid = $row["id"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $bname; ?></td>
                    <td><?php echo $oname; ?></td>
                    <td><a target="_blank" href="../<?php echo $avatarlink; ?>"><img src="../<?php echo $avatarlink; ?>" alt=""></a></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $enums; ?></td>
                    <td><?php echo $business_description; ?></td>
                    <td><?php echo $business_industry; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $sdate; ?></td>
                    <td><?php echo $following; ?></td>
                    <td><?php echo $followers; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $verification; ?></td>
                    <td><?php echo $lastlogin; ?></td>
                    <td><?php echo $time; ?></td>


                    <td><a href="admin_edit?tab=business&ver=<?php echo $verification;?>&status=<?php echo $status;?>&uname=<?php echo $uid?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <?php

  function individual()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">INDIVIDUALS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Username </th>
                  <th>First Name </th>
                  <th>Last Name </th>
                  <th>Birth Date </th>
                  <th>Avatar Link </th>
                  <th>Email </th>
                  <th>Phone Number </th>
                  <th>Description</th>
                  <th>Gender</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Following </th>
                  <th>Followers </th>
                  <th>Status</th>
                  <th>Verification</th>
                  <th>Lastlogin </th>
                  <th> Time </th>
                  <th> Edit </th>
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM individual ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $uname = $row['uname'];
                $fname = $row["fname"];
                $lname = $row["lname"];
                $bdate = $row["bdate"];
                $avatarlink = $row["avatarlink"];
                $email = $row["email"];
                $phone = $row["phone"];
                $description = $row["description"];
                $gender = $row["gender"];
                $city = $row["city"];
                $state = $row["state"];
                $country = $row["country"];
                $looking = $row["looking_for_job"];
                $following = $row["following"];
                $followers = $row["followers"];
                $lastlogin = $row["lastlogin"];
                $status = $row["status"];
                $verification = $row["verification"];
                $time = $row["datetime"];
                $uid = $row["id"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $uname; ?></td>
                    <td><?php echo $fname; ?></td>
                    <td><?php echo $lname; ?></td>
                    <td><?php echo $bdate; ?></td>
                    <td><a target="_blank" href="../<?php echo $avatarlink; ?>"><img src="../<?php echo $avatarlink; ?>" alt=""></a></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $description; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $state; ?></td>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $looking; ?></td>
                    <td><?php echo $following; ?></td>
                    <td><?php echo $followers; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $verification; ?></td>
                    <td><?php echo $lastlogin; ?></td>
                    <td><?php echo $time; ?></td>


                    <td><a href="admin_edit?tab=individual&ver=<?php echo $verification;?>&status=<?php echo $status;?>&uname=<?php echo $uid?>"><button type="button" class="btn btn-info">EDIT</button></a></td>
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>

                   <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <?php

  function job_sub_category()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">CHATS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Job Category </th>
                  <th>Job Sub Category </th>
                  <th> Time </th>
                  <!-- <th> Edit </th> -->
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM job_sub_catogary ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $job_category = $row['job_category_id'];
                $job_sub_category = $row["job_sub_category"];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $job_category; ?></td>
                    <td><?php echo $job_sub_category; ?></td>
                    <td><?php echo $time; ?></td>


                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td> -->
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <?php

  function jobs_apply()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">JOBS OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Job Name </th>
                  <th>Job Link </th>
                  <th>Job Poster </th>
                  <th>Applier </th>
                  <th>Application ID </th>
                  <th>Resume Link </th>
                  <th>Cover Letter </th>
                  <th>Status</th>
                  <!-- <th>Time </th>
                  <th> Edit </th> -->
                  <!-- <th> Delete </th> -->
                </tr>

              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM job_apply ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $job_name = $row["job_name"];
                $job_link = $row["job_link"];
                $job_poster = $row["poster"];
                $applier = $row["applier"];
                $application_id = $row["application_id"];
                $resume_link = $row["resume_link"];
                $cover_letter = $row["cover_letter"];
                $status = $row["status"];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $job_name; ?></td>
                    <td><?php echo $job_link; ?></td>
                    <td><?php echo $job_poster; ?></td>
                    <td><?php echo $applier; ?></td>
                    <td><?php echo $application_id; ?></td>
                    <td><a target="_blank" href="../<?php echo $resume_link; ?>"><?php echo $resume_link; ?></a></td>
                    <td><?php echo $cover_letter; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $time; ?></td>


                    <!-- <td><button type="button" class="btn btn-info">EDIT</button>

                  </td>
                    <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
                      
              <?php




              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

<?php

function certificate()
{
?>
  <div class="col-lg-12  ">
    <div class="card">
      <div class="card-body">
        <center>
          <h4 class="card-title">Certificate OF OUR WEBSITE</h4>
        </center>
        <p class="card-description">

        </p>
        <div class="table-responsive pt-3 ">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th>certificate id </th>
                <th>joiner_id</th>
                <th>course_id </th>
                <th>status </th>
                <th>Time </th>
                <th> Edit </th>
                <!-- <th> Delete </th> -->
              </tr>

            </thead>

            <?php
            @require  "config.php";
            // admin_db
            $sr = 1;
            $ad1 = "SELECT * FROM certificate ORDER BY id ASC";
            $ad2 = mysqli_query($conn, $ad1);
            while (
              $row = mysqli_fetch_assoc($ad2)
            ) {
              $cerid = $row["certificate_id"];
              $joid = $row["joiner_id"];
              $coid = $row["course_id"];
              $status = $row["status"];
              $time = $row["datetime"];


              // admin_db



            ?>

              <tbody>
                <tr>
                  <td><?php echo $sr++; ?></td>
                  <td><?php echo $cerid; ?></td>
                  <td><?php echo $joid; ?></td>
                  <td><?php echo $coid; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $time; ?></td>


                  <td><a href="admin_edit?tab=certificate&cerid=<?php echo $cerid;?>&status=<?php echo $status;?>"><button type="button" class="btn btn-info">EDIT</button></a></td>

                </td>
                  <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                </tr>

              </tbody>
                    
            <?php




            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

<?php

function joiner()
{
?>
  <div class="col-lg-12  ">
    <div class="card">
      <div class="card-body">
        <center>
          <h4 class="card-title">Course Joiners OF OUR WEBSITE</h4>
        </center>
        <p class="card-description">

        </p>
        <div class="table-responsive pt-3 ">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th>certificate id </th>
                <th>joiner_id</th>
                <th>course_id </th>
                <th>Joiner_id</th>
                <th>Joiner_type</th>
                <th>Uploader_id</th>
                <th>uploader_type</th>
                <th>video count</th>
                <th>completon count</th>
                <th>Time </th>
              
              </tr>

            </thead>

            <?php
            @require  "config.php";
            // admin_db
            $sr = 1;
            $ad1 = "SELECT * FROM joiner_table ORDER BY id ASC";
            $ad2 = mysqli_query($conn, $ad1);
            while (
              $row = mysqli_fetch_assoc($ad2)
            ) {
              $cerid = $row["certificate_id"];
              $joid = $row["joiner_id"];
              $coid = $row["course_id"];
              $time = $row["datetime"];
              $joid = $row["joiner_id"];
              $joiner_type = $row["joiner_type"];
              $uploader_id  = $row["uploader_uname"];
              $uploader_type = $row["uploader_type"];
              $video_count = $row["video_count"];
              $completion_count = $row["completion_count"];

              if($cerid =="")
              {
                $cerid = "Not Yet";
              }
              // admin_db



            ?>

              <tbody>
                <tr>
                  <td><?php echo $sr++; ?></td>
                  <td><?php echo $cerid; ?></td>
                  <td><?php echo $joid; ?></td>
                  <td><?php echo $coid; ?></td>
                  <td><?php echo $joid; ?></td>
                  <td><?php echo $joiner_type; ?></td>
                  <td><?php echo $uploader_id; ?></td>
                  <td><?php echo $uploader_type; ?></td>
                  <td><?php echo $video_count; ?></td>
                  <td><?php echo $completion_count; ?></td>
                  <td><?php echo $time; ?></td>
                </tr>

              </tbody>
                    
            <?php




            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>



<?php

function report()
{
?>
  <div class="col-lg-12  ">
    <div class="card">
      <div class="card-body">
        <center>
          <h4 class="card-title">REPORTS OF OUR WEBSITE</h4>
        </center>
        <p class="card-description">

        </p>
        <div class="table-responsive pt-3 ">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th>Report_id </th>
                <th>content_id</th>
                <th>report_id </th>
                <th>reporter_type</th>
                <th>user_id</th>
                <th>user_type</th>
                <th>message</th>
                <th>Time </th>
              </tr>

            </thead>

            <?php
            @require  "config.php";
            // admin_db
            $sr = 1;
            $ad1 = "SELECT * FROM report ORDER BY id ASC";
            $ad2 = mysqli_query($conn, $ad1);
            while (
              $row = mysqli_fetch_assoc($ad2)
            ) {
              $report_id = $row["report_id"];
              $content_id = $row["content_id"];
              $reporter_id = $row["reporter_id"];
              $reporter_type = $row["reporter_type"];
              $user_id = $row["user_id"];
              $user_type = $row["user_type"];
              $message = $row["message"];
              $time = $row["datetime"];



              // admin_db



            ?>

              <tbody>
                <tr>
                  <td><?php echo $sr++; ?></td>
                  <td><?php echo $report_id; ?></td>
                  <td><?php echo $content_id; ?></td>
                  <td><?php echo $reporter_id; ?></td>
                  <td><?php echo $reporter_type; ?></td>
                  <td><?php echo $user_id; ?></td>
                  <td><?php echo $user_type; ?></td>
                  <td><?php echo $message; ?></td>
                  <td><?php echo $time; ?></td>
                </tr>
                  


                  

              </tbody>
                    
            <?php




            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

<?php

function course()
{
?>
  <div class="col-lg-12  ">
    <div class="card">
      <div class="card-body">
        <center>
          <h4 class="card-title">Courses OF OUR WEBSITE</h4>
        </center>
        <p class="card-description">

        </p>
        <div class="table-responsive pt-3 ">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th>course_id </th>
                <th>course_category_id</th>
                <th>Course_sub_category_id</th>
                <th>course_name</th>
                <th>course_description</th>
                <th>uploader</th>
                <th>uploader_type</th>
                <th>no_of_videos</th>
                <th>no_of_joiners</th>
                <th>status</th>
                <th>Time </th>
              </tr>

            </thead>

            <?php
            @require  "config.php";
            // admin_db
            $sr = 1;
            $ad1 = "SELECT * FROM course ORDER BY id ASC";
            $ad2 = mysqli_query($conn, $ad1);
            while (
              $row = mysqli_fetch_assoc($ad2)
            ) {
              
              $course_id = $row["course_id"];
              $course_category_id = $row["course_category_id"];
              $Course_sub_category_id = $row["course_sub_category_id"];
              $course_name = $row["course_name"];
              $course_description = $row["course_description"];
              $uploader = $row["uploader"];
              $uploader_type = $row["uploader_type"];
              $no_of_videos = $row["no_of_videos"];
              $no_of_joiners = $row["no_of_joiners"];
              $status = $row["status"];
              $time = $row["datetime"];

              // admin_db



            ?>

              <tbody>
                <tr>
                  <td><?php echo $sr++; ?></td>
                  <td><?php echo $course_id; ?></td>
                  <td><?php echo $course_category_id; ?></td>
                  <td><?php echo $Course_sub_category_id; ?></td>
                  <td><?php echo $course_name; ?></td>
                  <td><?php echo $course_description; ?></td>
                  <td><?php echo $uploader; ?></td>
                  <td><?php echo $uploader_type; ?></td>
                  <td><?php echo $no_of_videos; ?></td>
                  <td><?php echo $no_of_joiners; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $time; ?></td>
                </tr>
                  


                  

              </tbody>
                    
            <?php




            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

<?php

  function course_category()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">Course category OF OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Course Category </th>
                  <th> Time </th>
                  <!-- <th> Edit </th>
                  <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM course_category ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $job_category = $row['course_category'];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $job_category; ?></td>
                    <td><?php echo $time; ?></td>


                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td> -->
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

<?php
function course_sub_category()
  {
  ?>
    <div class="col-lg-12  ">
      <div class="card">
        <div class="card-body">
          <center>
            <h4 class="card-title">COURSE SUB CATEGORY OUR WEBSITE</h4>
          </center>
          <p class="card-description">

          </p>
          <div class="table-responsive pt-3 ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>Course Category </th>
                  <th>Couse Sub Category </th>
                  <th> Time </th>
                  <!-- <th> Edit </th> -->
                  <!-- <th> Delete </th> -->
                </tr>
              </thead>

              <?php
              @require  "config.php";
              // admin_db
              $sr = 1;
              $ad1 = "SELECT * FROM course_sub_catogary ORDER BY id ASC";
              $ad2 = mysqli_query($conn, $ad1);
              while (
                $row = mysqli_fetch_assoc($ad2)
              ) {
                $job_category = $row['course_category_id'];
                $job_sub_category = $row["course_sub_category"];
                $time = $row["datetime"];


                // admin_db



              ?>

                <tbody>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $job_category; ?></td>
                    <td><?php echo $job_sub_category; ?></td>
                    <td><?php echo $time; ?></td>


                    <!-- <td><button type="button" class="btn btn-info">EDIT</button></td> -->
                    <!-- <td><button type="button" class="btn btn-danger">DELETE</button></td> -->
                  </tr>

                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

<?php

  function dash()
  {
  ?>
    <center>
      <h2>ADMIN LEVEL<?php
                      $adls = "SELECT * FROM admin_db WHERE uname = '$_SESSION[auname]'";
                      $adls1 = mysqli_query($GLOBALS['conn'], $adls);
                      $adls2 = mysqli_fetch_assoc($adls1);
                      $adls3 = $adls2['admin_level'];
                      echo $adls3;
                      ?></h2>
    </center>
    <div class="dash">
      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Admins</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM admin_db";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Admins = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Business</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM business";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Business = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Individual</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM individual";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Individual = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Videos</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM videos";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Videos = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Images</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM imgs";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Images = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Jobs Uploaded</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM jobs";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Jobs = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Courses Uploaded</h4>

            <div class="template-demo">
              <?php
              $ads = "SELECT * FROM course";
              $ads1 = mysqli_query($GLOBALS['conn'], $ads);
              $ads2 = mysqli_num_rows($ads1);

              ?>
              <h5>Total Courses = <?php echo $ads2; ?></h5>
            </div>
          </div>
        </div>
      </div>
      

    </div>

  <?php
  }
  ?>

  <?php

  if ($_GET['tab'] == 'admin') {
    admin();
  } else if ($_GET['tab'] == 'imgs') {
    imgs();
  } else if ($_GET['tab'] == 'videos') {
    videos();
  } else if ($_GET['tab'] == 'chat') {
    chat();
  } else if ($_GET['tab'] == 'contact') {
    contact();
  } else if ($_GET['tab'] == 'comment') {
    comment();
  } else if ($_GET['tab'] == 'follower') {
    follower();
  } else if ($_GET['tab'] == 'job_category') {
    job_category();
  } else if ($_GET['tab'] == 'likes') {
    likes();
  } else if ($_GET['tab'] == 'jobs') {
    jobs();
  } else if ($_GET['tab'] == 'business') {
    business();
  } else if ($_GET['tab'] == 'individual') {
    individual();
  } else if ($_GET['tab'] == 'job_sub_category') {
    job_sub_category();
  } else if ($_GET['tab'] == 'jobs_apply') {
    jobs_apply();
  } else if ($_GET['tab'] == "dash") {
    dash();}
    else if ($_GET['tab'] == "course") {
      course();}
      else if ($_GET['tab'] == 'course_category') {
        course_category();}
        else if ($_GET['tab'] == 'course_sub_category') {
          course_sub_category();}
      else if ($_GET['tab'] == "joiner") {
        joiner();}
    else if ($_GET['tab'] == "certificate") {
      certificate();
    }
    else if ($_GET['tab'] == "certificate") {
      certificate();
    }

    else if ($_GET['tab'] == "report") {
      report();
    }
  else {
    echo "No Table Selected";
  }

  ?>


</body>

</html>