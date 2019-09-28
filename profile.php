<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';


$pageTitle = 'My Profile';
include 'includes/head.php';

?>

<body>

<?php
include 'includes/header.php';
?>
    <div class="container-fluid">
        <?php
include 'includes/teacher_sidebar.php';
?>

        <main class="add-course">
            <h1 class="text-center main-color">My Profile </h1>
            <?php echo showAlert() ?>

            <div class="container">

                <form action="update_profile.php" method="POST">
                <input type="hidden" name="type" value="<?php echo $_SESSION['type'] ?>">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" name="class_id" value="<?php echo $class_id ?>">

                <p>
                    <label for="title">Full Name</label>
                    <input type="text" name="title" required autocomplete>
                </p>

                 <p>
                    <label for="email">Email  </label>
                    <input type="text" name="youtube">
                </p>

                 <p>
                    <label for="picture">Picture  </label>
                    <input type="file" name="picture">
                </p>

                <p>
                    <label for="content">Bio<span>*</span></label>
                    <textarea name="bio" id="bio" cols="30" rows="5" ></textarea>
                </p>
                <button type="submit" name="add" class="submit">Update</button>
            </form>


            </div>

        </main>
    </div>

   
    <?php
// include 'includes/footer.php';
?>


</body>
</html>