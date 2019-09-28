 <?php session_start();
if (empty($_SESSION['id'])):
    header('Location:index.php');
endif;
//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sid = $_SESSION['id'];
    $result = mysqli_query($con, "INSERT INTO student_class SET class_id ='$id', student_id = '$sid'")
    or die(mysqli_error($con));
    addAlert('success', 'Successfully joined Class!');
    echo "<script>document.location='view_class.php?id=$id'</script>";

}
?>