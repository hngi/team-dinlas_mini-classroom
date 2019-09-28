 <?php session_start();
if (empty($_SESSION['id'])):
    header('Location:index.php');
endif;
//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if ($_POST['id']) {
    $id = $_POST['id'];
    $result = mysqli_query($con, "DELETE FROM class WHERE class_id ='$id'")
    or die(mysqli_error($con));
    addAlert('success', 'Successfully deleted Class!');
}
?>