<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['add'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $type = $_POST['type'];
    $id = $_POST['id'];

    if ($type == 'teachers') {

        if (empty($_FILES['picture']['tmp_name'])) {

            mysqli_query($con, "UPDATE teachers SET fullname = '$fullname', email = '$email', bio = '$bio' WHERE teacher_id = '$id'") or die(mysqli_error($con));

        } else {

            $target_dir = 'assets/teacher_photos/';
            $target_file = $target_dir . basename($_FILES['picture']['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            mysqli_query($con, "UPDATE teachers SET fullname = '$fullname', email = '$email', bio = '$bio', teacher_photos = '$target_file' WHERE teacher_id = '$id'") or die(mysqli_error($con));

            //after sql query
            move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
        }

        addAlert('success', 'Profile successfully updated!');
        echo "<script>document.location='profile.php'</script>";
        exit();
    } else {

        
if (empty($_FILES['picture']['tmp_name'])) {

    mysqli_query($con, "UPDATE students SET fullname = '$fullname', email = '$email', bio = '$bio' WHERE student_id = '$id'") or die(mysqli_error($con));

} else {

    $target_dir = 'assets/student_photos/';
    $target_file = $target_dir . basename($_FILES['picture']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    mysqli_query($con, "UPDATE students SET fullname = '$fullname', email = '$email', bio = '$bio', student_photos = '$target_file' WHERE student_id = '$id'") or die(mysqli_error($con));

    //after sql query
    move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
}

addAlert('success', 'Profile successfully updated!');
echo "<script>document.location='profile.php'</script>";
exit();

    }

   
}
