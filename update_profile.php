<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (isset($_POST['edit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $phone = $_POST['phone'];
    $type = $_SESSION['type'];
    $id = $_SESSION['id'];

    if ($type == 'teacher') {

        if (empty($_FILES['picture']['tmp_name'])) {

            mysqli_query($con, "UPDATE teachers SET fullname = '$fullname', email = '$email', bio = '$bio', phone = '$phone' WHERE teacher_id = '$id'") or die(mysqli_error($con));

        } else {

            $target_dir = 'assets/teacher_photos/';
            $time = time();
            $target_file = $target_dir . $time.'_'. basename($_FILES['picture']['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            mysqli_query($con, "UPDATE teachers SET fullname = '$fullname', email = '$email', bio = '$bio', phone = '$phone', teacher_photo = '$target_file' WHERE teacher_id = '$id'") or die(mysqli_error($con));

            //after sql query
            move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
        }

        addAlert('success', 'Profile successfully updated!');
        echo "<script>document.location='profile.php'</script>";
        exit();
    } else {

        
if (empty($_FILES['picture']['tmp_name'])) {

    mysqli_query($con, "UPDATE students SET fullname = '$fullname', email = '$email', bio = '$bio', phone = '$phone' WHERE student_id = '$id'") or die(mysqli_error($con));

} else {

    $target_dir = 'assets/student_photos/';
    $time = time();
    $target_file = $target_dir . $time . '_' . basename($_FILES['picture']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    mysqli_query($con, "UPDATE students SET fullname = '$fullname', email = '$email', bio = '$bio', phone = '$phone', student_photo = '$target_file' WHERE student_id = '$id'") or die(mysqli_error($con));

    //after sql query
    move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
}

addAlert('success', 'Profile successfully updated!');
echo "<script>document.location='profile.php'</script>";
exit();

    }

   
}
