<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <title>admin</title>
</head>
<body>
  <?php
  
  ?>
  <!-- partial:partials/_sidebar.html -->
  <nav  class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" >
          <li class="nav-item">
            <a class="nav-link" href="index.php?tab=dash">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=admin" aria-expanded="false" aria-controls="ui-basic">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Admin Table</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=business " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Business</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=chat" aria-expanded="false" aria-controls="tables">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Chat</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=comment" aria-expanded="false" aria-controls="auth">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Comments</span>
              
            </a>            
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=follower" aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Follower</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=imgs" aria-expanded="false" aria-controls="form-elements">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">IMAGES</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=individual " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Individual</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=jobs " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Jobs</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=jobs_apply " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Jobs apply</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=job_category " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Job_category</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=job_sub_category " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Job_sub_category</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=likes " aria-expanded="false" aria-controls="error">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Likes</span>
              
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=contact" aria-expanded="false" aria-controls="icons">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Connections</span>
              
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=videos" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Videos</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=certificate" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Certificates</span>
              
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=course" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Course</span>
              
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=course_category" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Course_category</span>
              
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=course_sub_category" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Course_sub_category</span>
              
            </a>
          </li>
         
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=joiner" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Joiner</span>
              
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="?tab=report" aria-expanded="false" aria-controls="charts">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Reports</span>
              
            </a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
</body>
</html>