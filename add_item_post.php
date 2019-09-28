<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['add'])) {
    $youtube = $_POST['youtube'];
    $title = $_POST['title'];
    $file = $_POST['file'];
    $content = $_POST['content'];
    $class_id = $_POST['class_id'];

    // if (strlen($content) < 30) {
    //     addAlert('error', 'Lecture content must be more than 30 chars');
    //     echo "<script>document.location='create_class.php'</script>";
    // } else {
        $res = mysqli_query($con, "INSERT INTO class_items SET item_title = '$title', class_id = '$class_id', youtube_link = '$youtube', content = '$content', pdf_file = '$file' ") or die(mysqli_error($con));

        if ($res) {
            // $id = mysqli_insert_id($con);

            addAlert('success', 'Lecture successfully added!');
            echo "<script>document.location='view_class.php?id=$class_id</script>";
            exit();
        } else {
            addAlert('error', 'Something went wrong!');
            echo "<script>document.location='view_class.php?id=$class_id</script>";
            exit();
        }

    // }
}
