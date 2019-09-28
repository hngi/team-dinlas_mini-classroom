<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['rate'])) {
    $rating = $_POST['rating'];
    $std_id = $_SESSION['id'];
    $class_id = $_POST['class_id'];

    $res = mysqli_query($con, "INSERT INTO class_rating SET rating = '$rating', class_id = '$class_id', student_id = '$std_id'") or die(mysqli_error($con));

    if ($res) {

        addAlert('success', 'You successfully Rated this course');
        echo "<script>document.location='view_class.php?id=$class_id'</script>";
        exit();
    } else {
        addAlert('error', 'Something went wrong!');
        echo "<script>document.location='view_class.php?id=$class_id'</script>";
        exit();
    }

    // }
}
