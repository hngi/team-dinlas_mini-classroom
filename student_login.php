<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

/* 
    Here we perform the logic for database 
*/


if (isset($_POST['login'])) {

    $loginInfo_unsafe = $_POST['login_info']; //accepts both username and email
    $pass_unsafe = $_POST['password'];

    $loginInfo = mysqli_real_escape_string($con, $loginInfo_unsafe);
    $password = md5(mysqli_real_escape_string($con, $pass_unsafe));

    $query = mysqli_query($con, "SELECT * FROM users WHERE (email = '$loginInfo' OR username = '$loginInfo') AND password = '$password'") or die(mysqli_error($con));
    $counter = mysqli_num_rows($query);

    if ($counter == 0) {
        addAlert('error', 'Invalid Email or Password! Try again');
        echo "<script>document.location='index.php'</script>";
    } else {

        //Get user details from db
        $row = mysqli_fetch_array($query);
        $name = $row['fullname'];
        $username = $row['username'];
        $id = $row['user_id'];

        //Add to Session
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        // addAlert('success', 'You Successfully Logged in');
        //TODO: Repace with `success.php` with success page
        echo "<script type='text/javascript'>document.location='success.php'</script>";
    }
} else {
    header('location index.php');
}