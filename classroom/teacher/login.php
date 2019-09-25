 <?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Teacher's Space</title>


	</head>
	<body>


    <div id="loginForm">
			<div>
				<h1>Teacher Login</h1>
			</div>

			
			<div id="alert">

				<?php 
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
				<input name="username" type="text" name="username"  placeholder="username" required>
				<input name="password" type="password" name="password" placeholder="password" required>
				<input name="login" type="submit" name="login" value="Login">  
			</form>
			<div>
				<div>
					Don't have an account?<a href="register.php" id="signBtn">Sign Up</a>
				</div>
				<div>
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>



		<!-- <script src="js/jquery.min.js"></script> -->
		<!-- <script src="js/custom.js"></script> -->
	</body>
</html> 

<?php
require_once 'db.php';

//LOGIN

if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['username'])) {
	 
	if(isset($_POST['login'])) { 
		$username = $conn->escape_string($_POST['username']);
		$password = md5($conn->escape_string($_POST['password']));
		
		$result = $conn->query("SELECT * FROM tutors WHERE password = '$password' AND username ='$username'");
		$resultsArray = mysqli_num_rows($result);
		
		if($resultsArray == 0) {
			
			$_SESSION['message'] = "Password/Username Incorrect";
			header('location: login.php');
			// exit();
		}	else {
			$_SESSION['username']= $username; 
			
			$_SESSION['message'] = "Successful";
			header('location: dashboard.php');
		
		
		}
	}
}
	
	
	?>



        
        
        
           
        
        
        
        
        
        
        
        
        
        
        

