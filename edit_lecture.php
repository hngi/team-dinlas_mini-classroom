<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$item_id = $_GET['id'];

$q = mysqli_query($con, "SELECT * FROM class_items WHERE item_id = '$item_id'") or die(mysqli_error($con));
$item_row = mysqli_fetch_array($q);

$pageTitle = 'Edting a Lecture';
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
            <h1 class="text-center main-color">Edit Lecture  </h1>
            <?php echo showAlert() ?>


            <div class="container">

                <form action="edit_lecture_post.php" method="POST">
                    <input type="hidden" name="item_id" value="<?php echo $item_id ?>">

                <p>
                    <label for="title">Lecture Title <span>*</span></label>
                    <input type="text" name="title" value="<?php echo $item_row['item_title'] ?>" required autocomplete>
                </p>

                 <p>
                    <label for="youtube">Youtube Video Link  </label>
                    <input type="text" name="youtube" value="<?php echo $item_row['youtube_link'] ?>">
                </p>

                 <p>
                    <label for="pdf">PDF or any downloadable resource </label>
                    <input type="file" name="file" value="<?php echo $item_row['pdf_file'] ?>">
                </p>

                <p>
                    <label for="content">Lecture Content<span>*</span></label>
                    <textarea name="content" id="content" cols="30" rows="5" ><?php echo $item_row['content'] ?></textarea>
                </p>
                <button type="submit" name="edit" class="submit">Update</button>
            </form>


            </div>

        </main>
    </div>

    <!-- scripts -->
    <script src="assets/ckeditor5/ckeditor.js"></script>
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
    </script>

    <?php
// include 'includes/footer.php';
?>


</body>
</html>