<?php session_start();
if (empty($_SESSION['id'])):
    header('Location:dashboard.php');
endif;

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if ($_POST['id']) {
    $id = $_POST['id'];
    $completed = 1;
    $result = mysqli_query($con, "UPDATE class SET completed = '$completed' WHERE class_id ='$id'")
    or die(mysqli_error($con));
    addAlert('success', 'Course Ended!');
}
?>
