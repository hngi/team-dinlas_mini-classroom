<?php
	function validateEmail($email) {
		return (!preg_match(
			"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",
			$email
		)) ? FALSE : TRUE;
	}

	//Show Alert function
	function showAlert() {
		if (isset($_SESSION['alert_flag']) && isset($_SESSION['alert_message'])) {
			if ($_SESSION['alert_flag'] == 'error') { 
				//Add CSS & FrontEnd to display Errors here -->
				// data-source attribute will indicate in dev-tools that this was php inserted.
				//Do this by exposing: -->
				echo '
				<div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div data-source="php" class="alert alert-danger"> ' . $_SESSION['alert_message'] . '</div>
                </div>
                <div class="col-md-4"></div>
            	</div>
				';

			} 
			elseif ($_SESSION['alert_flag'] == 'success') { 
				// Add CSS & FrontEnd to display Success Messages here -->
				// data-source attribute will indicate in dev-tools that this was php inserted.
				// Do this by exposing: -->
				echo '
				<div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div data-source="php" class="alert alert-success"> ' . $_SESSION['alert_message'] . '</div>
                </div>
                <div class="col-md-4"></div>
            	</div>
				';

			}
			elseif ($_SESSION['alert_flag'] == 'info') {
				// Add CSS & FrontEnd to display Notices here -->
				// data-source attribute will indicate in dev-tools that this was php inserted.
				// Do this by exposing: -->
				echo '
				<div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div data-source="php" class="alert alert-info"> ' . $_SESSION['alert_message'] . '</div>
                </div>
                <div class="col-md-4"></div>
            	</div>
				';
			}
			 
			//DON'T EDIT!!!
			unset($_SESSION['alert_flag']);
			unset($_SESSION['alert_message']);
		}
	}

	//Add Alert function
	function addAlert($flag, $message) {
		//PLEASE, DON'T EDIT!!!
		if ($flag !== '' && $message !== '') {
			$_SESSION['alert_flag'] = $flag;
			$_SESSION['alert_message'] = $message;
		} 
		else {
			unset($_SESSION['alert_flag']);
			unset($_SESSION['alert_message']);
		}
	}

	//check if logged in
	function isLoggedIn(){
		if(!isset($_SESSION['id'])){
			header('Location: index.php');
		}
	}

	//check if user is a teacher
		function isTeacher()
		{
			if ($_SESSION['type'] !== 'teacher') {
				header('Location: index.php');
			}
		}

	//check if user is a student
	function isStudent()
	{
		if ($_SESSION['type'] !== 'student') {
			header('Location: index.php');
		}
	}



	//Get Youtube ID
	function getYoutubeID($url){
		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
		return $matches['1'];
	}

	//display rating
	function getClassRating($con, $class_id){
		$q = mysqli_query($con, "SELECT SUM(rating) as ratings, COUNT(student_id) as total FROM class_rating WHERE class_id = '$class_id'") or die(mysqli_error($con));
		$r = mysqli_fetch_array($q);

		$ratings = $r['ratings'];
		$total = $r['total'];
		$avg = $total == 0 ? 0 : ceil($ratings / $total);

		$rem = 5 - $avg;

		for($i = 1; $i <= $avg; $i++){
			echo '<i class="fa fa-star text-info"></i>';
		}

		for ($j = 1; $j <= $rem; $j++) {
    		echo '<i class="fa fa-star-o text-info"></i>';
		}

        echo "&nbsp; &nbsp; <b>".$avg." / 5</b> (".$total.")";


	}
?>
