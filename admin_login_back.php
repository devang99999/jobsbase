<?php
//This script will handle login
// session_start();

// check if the user is already logged in
if (isset($_SESSION['adminlogin'])) {
  ?>
  <script>
    window.location.replace("http://localhost/project/admin/index.php?tab=dash");
  </script>
  <?php
  exit;
}
require_once "config.php";
$esc = mysqli_real_escape_string($conn, trim($_POST['uname']));
$uname =$esc;
$password = $_POST['password'];
$hpassword = hash('sha512', $password);
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty($uname)) {
    $err = 'uname is required';
    ?>
    <script>
      window.location.replace("admin_login?error_message=<?php echo $err;?>");
    </script>
    <?php
  } elseif (empty($password)) {
    $err = 'Password is required';
    ?>
    <script>
      window.location.replace("admin_login?error_message=<?php echo $err;?>");
    </script>
    <?php
  } else {
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'project');

    // Check the connection
    if (mysqli_connect_errno()) {
      $error_message = 'Failed to connect to the database: ' . mysqli_connect_error();
    } else {
      // Prepare the SELECT statement
      $sql = "SELECT * FROM admin_db WHERE uname = '$uname'";

      // Execute the SELECT statement
      $result = mysqli_query($db, $sql);

      // Check if the SELECT statement returns a row
      if (mysqli_num_rows($result) == 1) {
        // Retrieve the user data
        $user = mysqli_fetch_assoc($result);

        // Compare the hashed password
        if ($hpassword == $user['password']) {
          // Start a new session
          $sql = "SELECT id,name,uname,avatarlink,email,phone, password FROM admin_db WHERE uname = ?";

          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "s", $param_uname);
          $param_uname = $uname;


          // Try to execute this statement
          if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
              mysqli_stmt_bind_result($stmt, $id, $name, $uname, $avatarlink, $email, $phone, $hashed_password);
              if (mysqli_stmt_fetch($stmt)) {
                if ($hpassword == $hashed_password) {
                  // this means the password is corrct. Allow user to login
                  session_start();
                  $_SESSION["auname"] = $uname;
                  $utit = $uname;
                  $_SESSION["name"] = $name;
                  $_SESSION["email"] = $email;
                  $_SESSION["phone"] = $phone;
                  $_SESSION["avatar"] = $avatarlink;
                 
                  
                  $_SESSION["id"] = $id;
                  $_SESSION['adminlogin'] = true;
                  $_SESSION["loggedin"] = false;

                  
                  $tu = "UPDATE admin_db SET last_login = current_timestamp() WHERE uname = '$uname'";
                  mysqli_query($conn, $tu);

                  ?>
                  <script>
                    window.location.replace("http://localhost/project/admin/index.php?tab=dash");
                  </script>
                  <?php
                  //Redirect user to welcome page
                }
              }
            }
          }
        } else {
          $err = 'Incorrect password';
        }
      } else {
        $err = 'uname not found';
      }
    }
  }
}




if (empty($err)) {
} else {
  header("location:admin_login?error_message=$err");
}





?>