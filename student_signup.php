<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['signup'])) {

    $username_unsafe = $_POST['username'];
    $fullname_unsafe = $_POST['fullname'];
    $email_unsafe = $_POST['email'];
    $pass_unsafe = $_POST['password'];
    $conf_pass_unsafe = $_POST['confirm_password'];

    $username = mysqli_real_escape_string($con, $username_unsafe);
    $fullname = mysqli_real_escape_string($con, $fullname_unsafe);
    $email = mysqli_real_escape_string($con, $email_unsafe);
    $password = mysqli_real_escape_string($con, $pass_unsafe);
    $confirm_password = mysqli_real_escape_string($con, $conf_pass_unsafe);

    //Validation

    //check if email exists
    $email_query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'") or die(mysqli_error($con));
    $email_count = mysqli_num_rows($email_query);

    //check if username exists
    $uname_query = mysqli_query($con, "SELECT * FROM students WHERE username = '$username'") or die(mysqli_error($con));
    $uname_count = mysqli_num_rows($uname_query);

    if (!validateEmail($email)) {
        addAlert('error', 'Invalid Email address');
        echo "<script>document.location='index.php'</script>";
    } else if (strlen($password) < 5) {
        addAlert('error', 'Password must be at least Five (5) characters');
        echo "<script>document.location='index.php'</script>";
    } else if ($password != $confirm_password) {
        addAlert('error', 'Passwords does not Match');
        echo "<script>document.location='index.php'</script>";
    } else if ($email_count > 0) {
        addAlert('error', 'Email address already exists!');
        echo "<script>document.location='index.php'</script>";
    }else if($uname_count > 0){
        addAlert('error', 'Username already exists!');
        echo "<script>document.location='index.php'</script>";
    } else {


        $encrypted_password = md5($password);
        $res = mysqli_query($con, "INSERT INTO students(fullname, username, email, password) VALUES('$fullname','$username','$email','$encrypted_password')") or die(mysqli_error($con));
        if ($res) {
            addAlert('success', 'Registration Successful! Please Login');
            echo "<script type='text/javascript'>document.location='index.php'</script>";
        } else {
            addAlert('error', 'Something went wrong!');
            echo "<script type='text/javascript'>document.location='index.php'</script>";
        }
    }
} else {
    header('Location index.php');
}
