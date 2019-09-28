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

    $query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email' AND password = '$password'") or die(mysqli_error($con));
    $counter = mysqli_num_rows($query);

    if ($counter == 0) {
        addAlert('error', 'Invalid Email or Password! Try again');
        echo "<script>document.location='index.php'</script>";
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
} else {
    header('Location index.php');
}
