<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

$pageTitle = 'Create a New Class';
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
            <h1 class="text-center main-color">Create a Class</h1>
            <?php echo showAlert() ?>


            <div class="container">

                <form action="create_class_post.php" method="POST" enctype="multipart/form-data">

                <p>
                    <label for="title">Enter Class Title <span>*</span></label>
                    <input type="text" name="title" required autocomplete>
                </p>
                <p>
                    <label for="level">Level <span>*</span></label>
                    <select name="level" id="level" required>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="expert">Expert</option>
                    </select>
                </p>
                 <!-- Changes Made 1-->
                 <label for="category">Course Category <span>*</span></label>
                 <select name="category" id="category" required>
                        <option value="software">Software</option>
                        <option value="hardware">Hardware</option>
                        <option value="design">Design</option>
                        <option value="marketing">Marketing</option>
                        <option value="marketing">Other</option>
                    </select>
                </p>
                <!--/ Changes Made 1-->
                <p>
                    <label for="youtube">Image Thumbnail <span>*</span>  </label>
                    <input type="file" name="thumb" required>
                </p>
                <p>
                    <label for="description">Description<span>*</span></label>
                    <textarea name="desc" id="description" cols="30" rows="5"></textarea>
                </p>
                
                <button type="submit" name="create" class="submit">Submit</button>
            </form>


            </div>

        </main>
    </div>

    <?php
// include 'includes/footer.php';
?>


</body>
</html>