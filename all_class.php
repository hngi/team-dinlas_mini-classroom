<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';

isLoggedIn();
isStudent();

$teacher_id = $_SESSION['id'];

$pageTitle = 'All Classes';
include 'includes/head.php';

?>

<body>

<?php
include 'includes/header.php';
?>
    <div class="container-fluid">
        <?php
include 'includes/student_sidebar.php';
?>
        <main class="add-course">
            <h1 class="text-center main-color">All Classes</h1>

            <?php echo showAlert() ?>

            <div class="container">

                <!-- list of lectures -->
            <?php
$query = mysqli_query($con, "SELECT * FROM class ORDER BY class_id DESC") or die(mysqli_error($con));
$lectures = mysqli_num_rows($query);

if ($lectures == 0) {
    echo "<h1 class='text-center mt-5'>You have no Class! Create one <a href='create_class.php'>Here</a></h1>";
} else {
    while ($row = mysqli_fetch_array($query)) {

        $cid = $row['class_id'];

        $std_query = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$cid'") or die(mysqli_error($con));
        $students = mysqli_num_rows($std_query);

        $l_query = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$cid'") or die(mysqli_error($con));
        $lectures_count = mysqli_num_rows($l_query);

        ?>

                <!-- Start Class Card -->
                <div class="card" style="margin-top: 30px;">
                    <div class="card-header bg-info text-light"><i class="fa fa-user text-light"></i> <?php echo ucfirst($row['level']) ?> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <?php
if ($row['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="100" width="90">
                                    <?php } else {?>
                                        <img src="<?php echo $row['class_thumbnail'] ?>" height="100" width="90">
                                    <?php }
        ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <b>
                                    <a href="view_class.php?id=<?php echo $row['class_id'] ?>"> <?php echo $row['title'] ?> </a>
                                    </b>
                                </h4>
                                <br>
                                <span class="text-muted text-small"><b><?php echo $students ?> Students | <?php echo $lectures_count ?> Lectures</b></span>
                                <span class="text-muted text-small" style="float: right">Created: <?php echo date("l j, M Y", strtotime($row['date_created'])); ?></span>
                                <br>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <b>4 / 5</b> (734)
                            </div>
                            <div class="col-md-10 pt-5" >
                            <span class="text-muted text-small">
                             <?php
                                if($row['completed'] == 0) {
                                    echo "Course In Progress";
                                } else {
                                    echo "Course Completed";
                                }
                                
                            ?>
                                </b></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Class card -->

                <?php }?>
                <?php }?>
            </div>

        </main>
    </div>
    <!-- <footer id="footer">
        <div>
            <h2>Connect with us</h2>
            <ul>
                <li><a href="#"><img src="assets/facebook.png" alt="Facebook"></a></li>
                <li><a href="#"><img src="assets/twitter.png" alt="Twitter"></a></li>
                <li><a href="#"><img src="assets/youtube.png" alt="Youtube"></a></li>
                <li><a href="#"><img src="assets/googleplus.png" alt="Google+"></a></li>
            </ul>
        </div>
        <div><p>&copy; 2019 | Dinlas</p></div>
        <div>
            <h2>Sign up for our newsletter</h2>
            <form action="">
                <label for="email">
                    <input type="email" name="email" id="email" placeholder="example@dinlas.team">
                </label>
                <button type="submit" class="submit">Subscribe</button>
            </form>
        </div>
    </footer> -->

    <?php
// include 'includes/footer.php';
?>


</body>
</html>