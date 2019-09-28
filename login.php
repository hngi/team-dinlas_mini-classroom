<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

/*
Here we perform the logic for database
 */

if (isset($_POST['login'])) {

    $email_unsafe = $_POST['email'];
    $pass_unsafe = $_POST['password'];

    $email = mysqli_real_escape_string($con, $email_unsafe);
    $password = mysqli_real_escape_string($con, $pass_unsafe);

    if($_POST['type'] == 'student'){

        $query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email' AND password = '$password'") or die(mysqli_error($con));
        $counter = mysqli_num_rows($query);

        if ($counter == 0) {
            addAlert('error', 'Invalid Email or Password! Try again');
            echo "<script>document.location='student_login.php'</script>";
        } else {

            $row = mysqli_fetch_array($query);
            $name = $row['fullname'];
            $id = $row['student_id'];

            //Add to Session
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['type'] = 'student';
            addAlert('success', 'You Successfully Logged in');
            echo "<script type='text/javascript'>document.location='student_dashboard.php'</script>";
        }


    }else if($_POST['type'] == 'teacher'){

        $query = mysqli_query($con, "SELECT * FROM teachers WHERE email = '$email' AND password = '$password'") or die(mysqli_error($con));
$counter = mysqli_num_rows($query);

if ($counter == 0) {

    addAlert('error', 'Invalid Email or Password! Try again');
    echo "<script>document.location='teacher_login.php'</script>";
} else {

    //Get user details from db
    $row = mysqli_fetch_array($query);
    $name = $row['fullname'];
    $id = $row['teacher_id'];

    //Add to Session
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['type'] = 'teacher';
    addAlert('success', 'You Successfully Logged in');
    echo "<script type='text/javascript'>document.location='teacher_dashboard.php'</script>";
}


    }

   
} else {
    header('Location index.php');
}
