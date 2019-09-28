<?php session_start(); ?>

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
            <h1>Reach out & to many resources & students!</h1>
            <p>Already signed up? <a href="login_page.php">Log In</a></p>
            <br>
            <?php 
            include 'includes/functions.php';
            
            echo showAlert(); ?>
            
        </header>
        <form action="signup.php" method="POST" class="signup-form">  
            <!-- <button id="SignUpWithGoogleEmail"> <img src="assets/google-logo.png" alt=""> Continue with Google</button> -->
            
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

            <label for="type">
            <select name="type" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            </label>

            <button id="SignUpWithEmail" name="signup" type="submit">Continue with Email</button>
            
            
        </form>
        <p><a href="index.php" class="text-center"> << Go Back Home</a></p>

    </div>
</body>
</html>