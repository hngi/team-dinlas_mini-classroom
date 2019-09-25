<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teachers dashboard</title>
</head>
<body>
<div class="container">
	<div>
		<div>
      <h3>Welcome, <?php echo $_SESSION['username']?></h3>
      <p></p>
			<a href="logout.php">
				<button>Logout</button>
			</a>
		</div>
	</div>
</div>
<!-- <script src="js/jquery.min.js"></script> -->
<!-- <script src="js/custom.js"></script> -->
</body>
</html>