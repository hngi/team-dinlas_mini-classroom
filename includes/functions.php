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

/// @jovial this is for the jovial 

	class addCourseHandler {
		
		function connectMysqli() {
			require ('includes/db_connection.php');
		
				return $con;
		}
		
		function addcourse ($cat, $enterCourseT, $level, $descrip, $courseCont) {
			
					//I will no need to validate because my Required keyword will do that from front end.
					//except for too short text. which will be rectified later but lets get the main wor done
					// connectMysqli()
		// $ifEmptyArr = array([$enterCourseT, $descrip, $courseCont]);

		// foreach($ifEmptyArr as $loopedArrEmpty){

		// 	if ($loopedArrEmpty < 6){
		// 		echo "Your text should be atleast 6 letters"; 
		// 	} 
		// } 	
		
		$dbConn = $this-> connectMysqli();

		$sql = "INSERT INTO add_course(category, course_title, lev, course_desc, course_cont)values(?, ?, ?, ?, ?)";

		$stmt = $dbConn->prepare($sql);
	

		$stmt->bind_param('sssss', $cat,$enterCourseT,$level, $descrip,$courseCont);
		// i have eto use this store result first before num_rows();
		$stmt->execute();
		// that is while i like PDO you dont need to use BIND-param
// i should have used mysqli_num_rows($stmt) but OOP with mysqli cannot work with that. it only works for procedural
		if ($stmt->affected_rows) {

			//I would have used $stmt->num_rows() but (accordign to php.net)For SELECT statements mysqli_affected_rows() works like mysqli_num_rows()..so $stmt->num_rows()  works only for SELECT statements. but I want to use INSERT statement that means i will be using $mysqli->affected_rows;

			/* also note that While using prepared statements, even if there is no result set (Like in an UPDATE or DELETE), you still need to store the results before affected_rows returns the actual number: (php.net)

<?php
$del_stmt->execute();
$del_stmt->store_result();
$count = $del_stmt->affected_rows;
?>*/
					echo "it worked!. yepppeeee";
	
			//header('locaton:dashboard.php'). This should actually take you to another page
			
		} else {

			trigger_error("Querry didn't go through". mysqli_connect_error(), E_USER_ERROR);
		}
			return $stmt;
		}
	}
?>
