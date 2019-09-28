<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$class_id = $_GET['id'];

$q = mysqli_query($con, "SELECT * FROM class
WHERE class_id = '$class_id'

") or die(mysqli_error($con));
$class_row = mysqli_fetch_array($q);

$classTitle = $class_row['title'];

$pageTitle = 'Editing '.$classTitle.' Class';
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
            <h1 class="text-center main-color">Edit '<?php echo $classTitle ?>' Class</h1>
            <?php echo showAlert() ?>


            <div class="container">

                <form action="edit_class_post.php" method="POST">
                <input type="hidden" name="class_id" value="<?php echo $class_id ?>">

                <p>
                    <label for="title"> Class Title <span>*</span></label>
                    <input type="text" name="title" value="<?php echo $class_row['title'] ?>" required autocomplete>
                </p>
                <p>
                    <label for="level">Level <span>*</span></label>
                    <select name="level" id="level" required>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="expert">Expert</option>
                    </select>
                </p>
                <p>
                    <label for="description">Description<span>*</span></label>
                    <textarea name="desc" id="description" cols="30" rows="5"><?php echo $class_row['title'] ?></textarea>
                </p>
                
                <button type="submit" name="edit" class="submit">Submit</button>
            </form>


            </div>

        </main>
    </div>

    <?php
// include 'includes/footer.php';
?>


</body>
</html>