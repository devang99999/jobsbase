<?php
@require 'config.php';
session_start();

function business()
{
    @require 'config.php';
    @session_start();
    $jl = $_GET['jl'];
    if (!empty($_SESSION['fname'])) {
        $tit = $_SESSION['fname'];
        $tit2 = $_SESSION['uname'];
        $type = $_SESSION['type'];
        $id  = $_SESSION['id'];
    }
    if (!empty($_SESSION['oname'])) {
        $tit = $_SESSION['oname'];
        $tit2 = $_SESSION['bname'];
        $type = $_SESSION['type'];
        $id  = $_SESSION['id'];
    }

    // Step 1: Set up a connection to your MySQL database
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 2: Retrieve the form inputs using $_POST superglobal variables
    $jname = $_POST['jname'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $salary = $_POST['salary'];
    if ($salary < "5000") {
        header("location: jobs.php?err=Invalid salary minimum salary is 5000.");
    }

    $jtype = $_POST['jtype'];
    $jops = $_POST['jops'];
    $jdesc = $_POST['jdesc'];
    $jloc = $_POST['jloc'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $start_date = $_POST['sdate'];

    // Create a DateTime object for today's date
    $today = new DateTime();

    // Create a DateTime object for the entered start date
    $start_date_obj = new DateTime($start_date);

    // Compare the start date with today's date
    if ($start_date_obj < $today) {
        header("location: jobs.php?err=Invalid start date. Please enter a valid start date.");
        exit(); // Terminate the script execution to prevent further processing
    }

    $jedate = $_POST['jedate'];
    // if ($jedate < $today) {
    //     header("location: jobs.php?err=Invalid end date. Please enter a valid application date.");
    //  } 
    $poster = $id;

    if ($jops == 0 || $jtype == "" || $jloc = "") {
        header("location: jobs.php?err=Please enter valid inputs");
        exit(); // Terminate the script execution to prevent further processing
    }
    $newname = uniqid('job', true) . "." . $tit2;

    // Step 3: Validate each input using regular expressions (regex) in PHP
    $regex_jname = '/^[A-Za-z0-9\s]{1,50}$/'; // Example regex for job name
    $regex_salary = '/^\d{4,}$/'; // Example regex for salary
    $regex_phone = '/^\d{10}$/'; // Example regex for phone number
    $regex_email = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'; // Example regex for email

    if (!preg_match($regex_jname, $jname)) {
        header("location: jobs.php?err=Invalid job name. Please enter a valid job name.");
        exit(); // Terminate the script execution to prevent further processing
    } elseif (!preg_match($regex_salary, $salary)) {
        header("location: jobs.php?err=Invalid salary. Please enter a valid salary.");
        exit(); // Terminate the script execution to prevent further processing
    } elseif (!preg_match($regex_phone, $phone)) {
        header("location: jobs.php?err=Invalid phone number. Please enter a valid phone number.");
        exit(); // Terminate the script execution to prevent further processing
    } elseif (!preg_match($regex_email, $email)) {
        header("location: jobs.php?err=Invalid email address. Please enter a valid email address.");
        exit(); // Terminate the script execution to prevent further processing
    } else {
        // Step 4: Sanitize the inputs to prevent SQL injection
        $jname = mysqli_real_escape_string($conn, $jname);
        $jdesc = mysqli_real_escape_string($conn, $jdesc);
        // ... repeat for other inputs

        // Step 5: Perform any additional validation or checks
        $avfet = "SELECT * FROM business WHERE id = '$id'";
        $avfetres = mysqli_query($conn, $avfet);
        $avfetrow = mysqli_fetch_assoc($avfetres);
        $avfetnum = mysqli_num_rows($avfetres);
        if ($avfetnum > 0) {
            $avlink = $avfetrow['avatarlink'];
        }

        // Step 6: If validation is successful, insert the data into the MySQL database
        $sql = "INSERT INTO jobs (job_category_id, job_sub_category_id, job_name, avatarlink, job_link, poster, salary, job_type, no_of_openings, job_description, job_location, phone_number, email, sdate, application_edate, no_of_applicants, status) VALUES ('$category', '$sub_category', '$jname', '$avlink', '$newname', '$poster', '$salary', '$jtype', '$jops', '$jdesc', '$jloc', '$phone', '$email', '$start_date', '$jedate', '0', '0')";

        if (mysqli_query($conn, $sql)) {
            echo "Job posted successfully.";
            // Additional success message or redirection as needed
            header("location: jobs.php?u=$tit2&t=$type&mes=Job posted successfully.");
        } else {
            echo "Error: " . mysqli_error($conn);
            // Additional error handling or error message as needed
            header("location: jobs.php?u=$tit2&t=$type&mes=SOMETHING went wrong.");
        }
    }
?>

<?php

}
?>


<?php

@require 'config.php';


function individual()
{
    $jl = $_GET['jl'];
    if (!empty($_SESSION['fname'])) {
        $tit = $_SESSION['fname'];
        $tit2 = $_SESSION['uname'];
        $type = $_SESSION['type'];
        $id  = $_SESSION['id'];
    }
    if (!empty($_SESSION['oname'])) {
        $tit = $_SESSION['oname'];
        $tit2 = $_SESSION['bname'];
        $type = $_SESSION['type'];
        $id  = $_SESSION['id'];
    }

    @require 'config.php';
    $type = $_SESSION['type'];
    $auname = $_POST['auname'];
    $newauname = uniqid('applier_id', true) . "." . $auname;
    $jns = "SELECT * FROM jobs WHERE job_link = '$jl'";
    $jnss = mysqli_query($conn, $jns);
    $junsrow = mysqli_fetch_assoc($jnss);
    $jn = $junsrow['job_name'];
    $jpos = $junsrow['poster'];
    // echo $jn;

    $remerr = "";



    if (!empty($_FILES['file']['name'])) {
        $resume = $_FILES['file']['name'];

        $tmp_resume = $_FILES['file']['tmp_name'];

        $position = strpos($resume, ".");

        // $fileextension= substr($name, $position + 1);
        $fileextension = pathinfo($resume, PATHINFO_EXTENSION);
        // echo $fileextension;
        $fileextension = strtolower($fileextension);
        // echo $fileextension;



        if (isset($resume)) {

            $newresume = uniqid('resume', true) . "." . $fileextension;
            $path = 'individuals/resumes/';
            $resumelink = $path . $newresume;
            // if (empty($resume))
            // {
            // echo "Please choose a file";
            // }
            if (!empty($resume)) {
                if (($fileextension != "pdf")) {
                    $remerr = "The file extension must be .pdf in order to be uploaded ";
                    header("location: job_apply.php?err=$remerr");
                    // echo $remerr;
                }
            }




            // echo $remerr;
        }
        if (($fileextension == "pdf")) {
            $resumelink = $path . $newresume;
            move_uploaded_file($tmp_resume, $resumelink);
        }
    } else if (empty($_FILES['file']['name'])) {
        $resume_link = "SELECT resume_link FROM individual WHERE id = '$id'";
        $resumelinkres = mysqli_query($conn, $resume_link);
        if (mysqli_num_rows($resumelinkres) > 0) {
            $resrow = mysqli_fetch_assoc($resumelinkres);
            $resumelink = $resrow['resume_link'];
        }
    } else {
        $remerr = "no resume found";
        header("location:job_apply.php?u=$tit2&t=$type&jl=$jl&err=$remerr");
    }





    $cletter = $_POST['cletter'];
    echo $resumelink;

    echo $remerr;
    if ($remerr == "") {
        $sql = "INSERT INTO job_apply (job_name,job_link,poster,applier,application_id,resume_link,cover_letter) VALUES ('$jn','$jl','$jpos','$id','$newauname','$resumelink','$cletter')";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        $upd = "UPDATE jobs SET no_of_applicants = no_of_applicants + 1 WHERE job_link = '$jl'";
        $res = mysqli_query($GLOBALS['conn'], $upd);
        // echo $newauname;
        if ($result) {
            header("location: jobs.php?u=$auname&t=$type&mes=Applied successfully.");
        } else {
            echo "failed";
        }
    } else {
        header("location:job_apply.php?u=$tit2&t=$type&jl=$jl&mes=$remerr");
    }
}
if ($_SESSION['type'] == 'individual') {
    individual();
}
if ($_SESSION['type'] == 'business') {
    business();
}


?>