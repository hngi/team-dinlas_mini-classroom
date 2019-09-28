<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['add'])) {
    $youtube = $_POST['youtube'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $class_id = $_POST['class_id'];

    $target_dir = 'files/';
    $time = time();
    $target_file = $target_dir . $time.'_'. basename($_FILES['file']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if(empty($_FILES['file']['tmp_name'])){
    
        mysqli_query($con, "INSERT INTO class_items SET item_title = '$title', class_id = '$class_id', youtube_link = '$youtube', content = '$content' ") or die(mysqli_error($con));
    }else{
        mysqli_query($con, "INSERT INTO class_items SET item_title = '$title', class_id = '$class_id', youtube_link = '$youtube', content = '$content', pdf_file = '$target_file' ") or die(mysqli_error($con));
        //after sql query
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);


    }
            addAlert('success', 'Lecture successfully added!');
            echo "<script>document.location='view_class.php?id=$class_id'</script>";
            exit();
        

}
