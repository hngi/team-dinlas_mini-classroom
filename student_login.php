<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login -DiClass</title>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signup-container signup_login">
        <header>
            <a href="index.php"><img src="assets/logo.png" alt="Team Dinlas"></a>
            <h1>Welcome back!</h1>
            <p>New to DiClass? <a href="signup_page.php">Sign Up</a></p>
            <br>
            <!-- we display proper error or success messages -->
            <?php 
            include 'includes/functions.php';
            
            echo showAlert(); ?>
        </header>
        <form action="login.php" method="POST" class="login-form">
           
            <label for="email">
                <input type="email" name="email" id="email" placeholder="example@gmail.com">
            </label>

            <label for="password">
                <input type="password" name="password" id="password" placeholder="Password">
            </label>

            <label for="type">
                <select name="type">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </label>
    
            <button type="submit" name="login" id="login">Login</button>
            <p><a href="index.php" class="text-center"> << Go Back Home</a></p>
        </form>

    </div>
</body>
</html>