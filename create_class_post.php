<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if(isset($_POST['create'])){
    // $content = $_POST['content'];
    $category = $_POST['category'];
    $level = $_POST['level'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $teacher_id = $_SESSION['id'];

    $target_dir = 'files/';
    $time = time();
    $target_file = $target_dir . $time . '_' . basename($_FILES['thumb']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


    $check = mysqli_query($con, "SELECT * FROM  class WHERE title = '$title'")or die(mysqli_query($con));
    $count = mysqli_num_rows($check);

    if($count > 0){
        addAlert('error', 'Class already exists!');
        echo "<script>document.location='create_class.php'</script>";
    }else{

        if(empty($_FILES['thumb']['tmp_name'])){
        mysqli_query($con, "INSERT INTO class SET title = '$title', teacher_id = '$teacher_id', level = '$level', description = '$desc', category = '$category'")or die(mysqli_error($con));
        }else{
        mysqli_query($con, "INSERT INTO class SET title = '$title', teacher_id = '$teacher_id', level = '$level', description = '$desc', category = '$category', class_thumbnail = '$target_file'")or die(mysqli_error($con));
        //after sql query
        move_uploaded_file($_FILES['thumb']['tmp_name'], $target_file);
        }

            $id = mysqli_insert_id($con);

            addAlert('success', 'Class successfully created!');
            echo "<script>document.location='view_class.php?id=". $id . "'</script>";
            exit();

    }
}