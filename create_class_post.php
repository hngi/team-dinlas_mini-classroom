<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if(isset($_POST['create'])){
    // $content = $_POST['content'];
    $level = $_POST['level'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $teacher_id = $_SESSION['id'];

    $check = mysqli_query($con, "SELECT * FROM  class WHERE title = '$title'")or die(mysqli_query($con));
    $count = mysqli_num_rows($check);

    if($count > 0){
        addAlert('error', 'Class already exists!');
        echo "<script>document.location='create_class.php'</script>";
    }else{
        $res = mysqli_query($con, "INSERT INTO class SET title = '$title', teacher_id = '$teacher_id', level = '$level', description = '$desc'")or die(mysqli_error($con));

        if($res){
            $id = mysqli_insert_id($con);

            addAlert('success', 'Class successfully created!');
            echo "<script>document.location='view_class.php?id='". $id . "</script>";
            exit();
        }else{
            addAlert('error', 'Something went wrong!');
            echo "<script>document.location='create_class.php'</script>";
            exit();
        }

    }
}