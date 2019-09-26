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
?>
