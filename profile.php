<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

$uid = $_SESSION['id'];
$type = $_SESSION['type'];

if($type == 'teacher'){
$q = mysqli_query($con, "SELECT * FROM teachers
WHERE teacher_id = '$uid'
") or die(mysqli_error($con));

}else{
$q = mysqli_query($con, "SELECT * FROM students
WHERE student_id = '$uid'
") or die(mysqli_error($con));
}

$row = mysqli_fetch_array($q);

$pageTitle = 'My Profile';
include 'includes/head.php';

?>

<body>

<?php
include 'includes/header.php';
?>
    <div class="container-fluid">
 <?php
if ($_SESSION['type'] == 'teacher') {
    include 'includes/teacher_sidebar.php';
} else {
    include 'includes/student_sidebar.php';

}
?>

        <main class="add-course">
            <h1 class="text-center main-color">My Profile </h1>
            <?php echo showAlert() ?>

            <div class="container">

                <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="<?php echo $_SESSION['type'] ?>">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">

                <p>
                    <label for="title">Full Name</label>
                    <input type="text" name="fullname" value="<?php echo $row['fullname'] ?>" required autocomplete>
                    <!-- <input type="text" name="fullname" value="<?php echo $row['fullname'] ?>" required autocomplete> -->
                </p>

                 <p>
                    <label for="email">Email  </label>
                    <input type="text" name="email"  value="<?php echo $row['email'] ?>" required>
                </p>
                <p>
                    <label for="email">Phone  </label>
                    <input type="text" name="phone"  value="<?php echo $row['phone'] ?>" required>
                </p>

                 <p>
                    <label for="picture">Picture  </label>
                    <input type="file" name="picture">
                </p>

                <p>
                    <label for="content">Bio<span>*</span></label>
                    <textarea name="bio" id="bio" cols="30" rows="5" ><?php echo $row['bio'] ?></textarea>
                </p>
                <button type="submit" name="edit" class="submit">Update</button>
            </form>


            </div>

        </main>
    </div>

   
    <?php
// include 'includes/footer.php';
?>


</body>
</html>