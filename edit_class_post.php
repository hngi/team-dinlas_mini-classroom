<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if(isset($_POST['edit'])){
    // $content = $_POST['content'];
    $level = $_POST['level'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $class_id = $_POST['class_id'];

    // $check = mysqli_query($con, "SELECT * FROM class WHERE title = '$title'")or die(mysqli_query($con));
    // $count = mysqli_num_rows($check);

    // if($count > 0){
    //     addAlert('error', 'Class already exists!');
    //     echo "<script>document.location='create_class.php'</script>";
    // }else{
        $res = mysqli_query($con, "UPDATE class SET title = '$title', level = '$level', description = '$desc' WHERE class_id = '$class_id' ")or die(mysqli_error($con));

        if($res){
            addAlert('success', 'Class successfully updated!');
            echo "<script>document.location='view_class.php?id=". $class_id . "'</script>";
            exit();
        }else{
            addAlert('error', 'Something went wrong!');
            echo "<script>document.location='create_class.php'</script>";
            exit();
        }

    // }
}