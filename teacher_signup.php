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
        <form action="teacher_signup_post.php" method="POST" class="signup-form">  
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