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

        //Get user details from db
        $row = mysqli_fetch_array($query);
        $name = $row['fullname'];
        $id = $row['student_id'];

        //Add to Session
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['type'] = 'student';
        // addAlert('success', 'You Successfully Logged in');
        //TODO: Repace with `success.php` with success page
        echo "<script type='text/javascript'>document.location='student_dashboard.php'</script>";
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
    <title>Student Login -DiClass</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signup-container signup_login">
        <header>
            <img src="assets/logo.png" alt="Team Dinlas">
            <h1>Welcome back!</h1>
            <p>New to DiClass? <a href="student_signup.php">Sign Up</a></p>
            <br>
            <!-- we display proper error or success messages -->
			<?php echo showAlert(); ?>
        </header>
        <form action="" method="POST" class="login-form">
           
            <label for="email">
                <input type="email" name="email" id="email" placeholder="example@gmail.com">
            </label>

            <label for="password">
                <input type="password" name="password" id="password" placeholder="Password">
            </label>
    
            <button type="submit" name="login" id="login">Login</button>
            <p><a href="#">Forgot Password?</a></p>
        </form>

    </div>
</body>
</html>