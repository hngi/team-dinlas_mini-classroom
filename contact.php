<!DOCTYPE html>
<html>
<head>
	<title>Thank you</title>
	<style type="text/css">


		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		h3{
			text-align: center
		}

		p{
			width:100%;
			max-width: 400px;
			height:auto;	
			border: 2px solid #00AEFF;
			display: block;
			margin: 3rem auto 3rem;
			padding: 1em 0.5em 1em;
		}

		a{
			background-color: #00AEFF;
			text-decoration: none; 
			width: 100%;
			max-width: 100px;
		 	height: auto;
		 	color: white;
		 	border: 1px solid  #00AEFF;
			display: block;
			margin: 3rem auto 3rem;
			padding: 0.5em 1em  0.5em;
		}

		h3{
			margin-top: 1em;
		}
	</style>
</head>
<body>

<h3>Your message has been sent successfully</h3>

 <p>
 	Title: <?php echo $_POST["title"]; ?><br>
 	Name: <?php echo $_POST["name"]; ?><br>
 	Email address: <?php echo $_POST["email"]; ?><br>
 </p>

<a href="contact.html">Go Back</a>


</body>
</html>



