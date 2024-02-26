<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN LOGIN</title>
  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
  </style>
</head>

<body>
  <?php
  session_start();
  // require 'config.php';
  require 'boot.php';
  ?>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase"> ADMIN LOGIN</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                <form action="admin_login_back" method="post">
                  <div class="form-outline form-white mb-4">
                    <input type="text" name="uname" id="uname" value="web.devang" required class="form-control form-control-lg" />
                    <label class="form-label" for="uname">username</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" name="password" id="password" value="password" required class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>



                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>
                <div style="margin-top:30px;">
                  <p class="mb-0">ARE YOU HERE BY MISTAKE? <a href="logout.php" class="text-white-50 fw-bold"> USER LOGIN PAGE</a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

</body>

</html>