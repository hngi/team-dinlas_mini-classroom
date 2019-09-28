<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$class_id = $_GET['id'];

$q = mysqli_query($con, "SELECT * FROM class WHERE class_id = '$class_id'") or die(mysqli_error($con));
$class_row = mysqli_fetch_array($q);

$classTitle = $class_row['title'];

$pageTitle = $classTitle;
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
            <h1 class="text-center main-color">Add Lecture to  "<?php echo $classTitle ?>" </h1>
            <?php echo showAlert() ?>


            <div class="container">

                <form action="add_item_post.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="class_id" value="<?php echo $class_id ?>">

                <p>
                    <label for="title">Lecture Title <span>*</span></label>
                    <input type="text" name="title" required autocomplete>
                </p>

                 <p>
                    <label for="youtube">Youtube Video Link  </label>
                    <input type="text" name="youtube">
                </p>

                 <p>
                    <label for="pdf">PDF or any downloadable resource </label>
                    <input type="file" name="file">
                </p>
                
                <p>
                    <label for="content">Lecture Content<span>*</span></label>
                    <textarea name="content" id="content" cols="30" rows="5" ></textarea>
                </p>
                <button type="submit" name="add" class="submit">Submit</button>
            </form>


            </div>

        </main>
    </div>

    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>

    <!-- scripts -->
    <!-- <script src="assets/ckeditor5/ckeditor.js"></script>
    <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="assets/tinymce/js/tinymce/jquery.tinymce.min.js"></script>

    <script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
    </script>

    <script>
        tinymce.init({
            selector: '#editor'
        });
    </script> -->

    <?php
// include 'includes/footer.php';
?>


</body>
</html>