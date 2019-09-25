<?php
if(!isset($_SESSION)){
	session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register as a tutor</title>
	</head>
	<body>
		<div>
			<div>
				<h1>Register as A Teacher</h1>
			</div>
			<div>
			<div>
			<?php 
				//print  error/success messages
					//print all error messages
					if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){
						echo $_SESSION['message'];
					}
			?>
			<?php
     		unset($_SESSION["message"]);
			?>
			</div>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input name="username" type="text" name="" placeholder="Username"  required>
					<input name="firstname" type="text" name="" placeholder="First Name"  required>
					<input name="lastname" type="text" name="" placeholder="Last Name"  required>
					<input name="email" type="text" name="" placeholder="email"  required>
					<input name="password" type="password" placeholder="password" required>
					<input name="cpassword" type="password" placeholder=" Confirm password" required>
					<input name="register" type="submit" value="Register">  
				</form>
			</div>	
			<div>
				<div>
					Already Have an Account?<a href="login.php" id="loginBtn">Sign In</a>
				</div>
				<div>
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</body>
</html>




<?php
// REGISTRATION
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) ) {
    
	if(isset($_POST['register'])) { 
		/* Registration process, inserts tutors info into the database 
		and sends account confirmation email message  */
		// set session variables to be used on profile.php page
		$_SESSION['username'] = $_POST['username']; 
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['first_name'] = $_POST['firstname'];
		$_SESSION['last_name'] = $_POST['lastname'];
		// set session variables to be used on dashboard.php page
		// Escape all $_POST variables to protect against SQL injections
		$username= $conn->escape_string($_POST['username']);
		$firstname = $conn->escape_string($_POST['firstname']);
		$lastname = $conn->escape_string($_POST['lastname']);
		$email = $conn->escape_string($_POST['email']);
		$password = $conn->escape_string(($_POST['password']));
		$cpassword = $conn->escape_string(($_POST['cpassword']));
		// $password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
		// $hash = $conn->escape_string( md5( rand(0,1000) ) );
		$status = 1;
		
		if(strlen($password) < 6) {
			$_SESSION['message'] = 'Password Should be longer than 6 characters';
			$status = -1;
		header('location: register.php');	
		}

		$results = $conn->query('SELECT COUNT(*) FROM tutors WHERE email = "$email"');
		$resultsArray = mysqli_fetch_row($results);
		$result = $resultsArray[0];
		if($result == 1) {
			$_SESSION['message'] = 'Email Exists, Choose Another One!';
			$status = -1;
			header('location: register.php');	
		}
		
		$results1 = $conn->query('SELECT COUNT(*) FROM tutors WHERE email = "$email"');
		$resultsArray1 = mysqli_fetch_row($results1);
		$result1 = $resultsArray1[0];
		if($result1 == 1) {
			$_SESSION['message'] = 'Email Exists, Choose Another One!';
			$status = -1;
			header('location: register.php');	
		}
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
			$_SESSION['message'] = 'Email Is Not Valid';
			$status = -1;
			header('location: register.php');		
		}

		if ( $password <> $cpassword){
			$_SESSION['message'] = 'Password Does Not Match';
			$status = -1;
			header('location: register.php');;
		}	
		
		if ($status == 1) { // email doesn't already exist in a database, proceed...
				$active = 1;
				$md5password = md5($password); 
				// active is 0 by default and no need to include it here
				$sql = "INSERT INTO tutors (`username` , `firstname`, `lastname`, `email`, `password`, `active`) VALUES ('$username', '$firstname', '$lastname', '$email', '$md5password', '$active')";
			
				// add user to the database
			if($conn->query($sql)) {
				$_SESSION['active'] = 1; // 0 until user verifies account with verify.php
				$_SESSION['loggedin'] = true; // this lets us know the user has logged in
				$_SESSION['message'] = 'Welcome, Please wait...';
				header('location: dashboard.php');

			} else{
				$_SESSION['message'] = 'registration failed!, Try Registering with a unique username and email';
				header('location: register.php');
			}
		}
	}
}




?>



