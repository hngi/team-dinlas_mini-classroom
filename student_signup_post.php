<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['signup'])) {

    $fullname_unsafe = $_POST['fullname'];
    $email_unsafe = $_POST['email'];
    $phone_unsafe = $_POST['phone'];
    $pass_unsafe = $_POST['password'];
    $conf_pass_unsafe = $_POST['confirm_password'];

    $fullname = mysqli_real_escape_string($con, $fullname_unsafe);
    $email = mysqli_real_escape_string($con, $email_unsafe);
    $phone = mysqli_real_escape_string($con, $phone_unsafe);
    $password = mysqli_real_escape_string($con, $pass_unsafe);
    $confirm_password = mysqli_real_escape_string($con, $conf_pass_unsafe);

    //Validation

    //check if email exists
    $email_query = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'") or die(mysqli_error($con));
    $email_count = mysqli_num_rows($email_query);

    if (!validateEmail($email)) {
        addAlert('error', 'Invalid Email address');
        echo "<script>document.location='student_signup.php'</script>";
    } else if (strlen($password) < 6) {
        addAlert('error', 'Password must be atleast Six (6) characters');
        echo "<script>document.location='student_signup.php'</script>";
    } else if ($password != $confirm_password) {
        addAlert('error', 'Passwords dont Match');
        echo "<script>document.location='student_signup.php'</script>";
    } else if ($email_count > 0) {
        addAlert('error', 'Email address already exists!');
        echo "<script>document.location='student_signup.php'</script>";
    } else {

        $res = mysqli_query($con, "INSERT INTO students SET fullname = '$fullname', password = '$password', email = '$email', phone = '$phone' ") or die(mysqli_error($con));
        if ($res) {
            addAlert('success', 'Registration Successful! Please Login');
            echo "<script type='text/javascript'>document.location='student_login.php'</script>";
        } else {
            addAlert('error', 'Something went wrong!');
            echo "<script type='text/javascript'>document.location='student_signup.php'</script>";
        }
    }
} else {
    header('Location student_signup.php');
}

?>
