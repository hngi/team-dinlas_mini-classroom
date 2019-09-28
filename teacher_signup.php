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
    $email_query = mysqli_query($con, "SELECT * FROM teachers WHERE email = '$email'") or die(mysqli_error($con));
    $email_count = mysqli_num_rows($email_query);

    if (!validateEmail($email)) {
        addAlert('error', 'Invalid Email address');
        echo "<script>document.location='teacher_signup.php'</script>";
    } else if (strlen($password) < 6) {
        addAlert('error', 'Password must be atleast Six (6) characters');
        echo "<script>document.location='teacher_signup.php'</script>";
    } else if ($password != $confirm_password) {
        addAlert('error', 'Passwords dont Match');
        echo "<script>document.location='teacher_signup.php'</script>";
    } else if ($email_count > 0) {
        addAlert('error', 'Email address already exists!');
        echo "<script>document.location='teacher_signup.php'</script>";
    } else {

        $res = mysqli_query($con, "INSERT INTO teachers SET fullname = '$fullname', password = '$password', email = '$email', phone = '$phone' ") or die(mysqli_error($con));
        if ($res) {
            addAlert('success', 'Registration Successful! Please Login');
            echo "<script type='text/javascript'>document.location='teacher_signup.php'</script>";
        } else {
            addAlert('error', 'Something went wrong!');
            echo "<script type='text/javascript'>document.location='teacher_signup.php'</script>";
        }
    }
} else {
    header('Location index.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Sign Up - DiClass</title>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signup-container signup_login">
        <header>
            <img src="assets/logo.png" alt="Team Dinlas">
            <h1>Reach out & Teach thousands of Students</h1>
            <p>Already signed up? <a href="teacher_login.php">Log In</a></p>
            <br>
            <!-- we display proper error or success messages -->
            <?php echo showAlert(); ?>
            
        </header>
        <form action="" method="POST" class="signup-form">  
            <button id="SignUpWithGoogleEmail"> <img src="assets/google-logo.png" alt=""> Continue with Google</button>
            
            <hr>

            <label for="fullname">
                <input type="text" name="fullname" id="fullname" placeholder="Full Name">
            </label>
            
            <label for="email">
                <input type="email" name="email" id="email" placeholder="example@gmail.com">
            </label>
            
            <label for="phone">
                <input type="text" name="phone" id="phone" placeholder="Phone Number">
            </label>

            <label for="password">
                <input type="password" name="password" id="password" placeholder="Password">
            </label>
            
            <label for="confirm-password">
                <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" >
            </label>

            <p>By clicking "Continue with Google/Email" above, you acknowledge that you have read and understood, and agree to Lucid's <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>.</p>

            <button id="SignUpWithEmail" name="signup" type="submit">Continue with Email</button>
            
            
        </form>

    </div>
</body>
</html>