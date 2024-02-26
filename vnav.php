<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .sibtn{
        --bs-btn-padding-x: 4px!important;
        --bs-btn-padding-y: 5px!important;
        --bs-btn-border-radius:3px!important;
        --bs-btn-font-size: 15px!important;
        margin: -10px auto;
      }
    </style>
</head>
<body>
<nav style="z-index:999; margin-top:1px" class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img style="width:170px;margin-top:-8px" src="./imgs/jobsbase.png" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.php">About Jobsbase</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">What is Jobsbase</a>
              </li>
              <a class="nav-link" href="login.php"><button type="button" class="btn sibtn btn-secondary">Sign-IN</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php"><button type="button" class="btn sibtn btn-primary">Sign-UP</button></a>
            </li>
            <li class="nav-item">
            </ul>
            
          </div>
        </div>
      </nav>
</body>
</html>