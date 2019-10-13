<?php session_start();
//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';
// include 'my-classes.css';
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
            <h1 class="text-center main-color">Category</h1>

            <?php echo showAlert() ?>

            <div class="container">
            <h1>Beginners</h1>

                <!-- list of lectures -->
            <?php
$beginner = 'beginner';
$query = mysqli_query($con, "SELECT * FROM class WHERE level= '$beginner'") or die(mysqli_error($con));
$lectures = mysqli_num_rows($query);
if ($lectures == 0) {
    echo "<h1 class='text-center mt-5'>No course in this category</h1>";
} else {
    while ($row = mysqli_fetch_array($query)) {
        $cid = $row['class_id'];
        $std_query = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$cid'") or die(mysqli_error($con));
        $students = mysqli_num_rows($std_query);
        $l_query = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$cid'") or die(mysqli_error($con));
        $lectures_count = mysqli_num_rows($l_query);
        $q = mysqli_query($con, "SELECT * FROM class NATURAL JOIN teachers WHERE class_id = '$cid'") or die(mysqli_error($con));
        $class_row = mysqli_fetch_array($q);
        
        // $rating = getClassRating($con, $row['class_id']);
        $fullname = $class_row['fullname'];
        $course = $row['title'];
        $desc = $row['description'];
        $img = $row['class_thumbnail'];
        
           
       
        ?>
<div class="card align-items-center justify-content-center" style="display:inline-block;">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card" style="width: 18rem;">
                <?php if ($row['class_thumbnail'] == '') {?>
                    <img src="assets/logo.png" height="150" width="100%">
                        <?php } else {?>
                        <img src="<?php echo $row['class_thumbnail'] ?>" height="150" width="100%">
                        <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $course ?></h5>
                        <p class="card-text"><?php echo $desc ?></p>
                        <p class="card-text main-color">Teacher : <?php echo $fullname ?></p>
                        <p><?php echo getClassRating($con, $row['class_id']); ?></p>
                        <a href="view_class.php?id=<?php echo $row['class_id'] ?>" class="btn btn-primary">View Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php }?>
<?php }?>
    

<div class="container" style="padding:3%;">
 <h1>Intermediate</h1>
    <?php
    $intermediate = 'intermediate';
    $query1 = mysqli_query($con, "SELECT * FROM class WHERE level = '$intermediate'") or die(mysqli_error($con));
    $lectures1 = mysqli_num_rows($query1);
    if ($lectures1 == 0) {
         echo "<h1 class='text-center mt-5'>No course in this category</h1>";
    } else {
        while ($row1 = mysqli_fetch_array($query1)) {
            $cid1 = $row1['class_id'];
            $std_query1 = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$cid1'") or die(mysqli_error($con));
            $students1 = mysqli_num_rows($std_query1);
            $l_query1 = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$cid1'") or die(mysqli_error($con));
            $lectures_count1 = mysqli_num_rows($l_query1);
            $q1 = mysqli_query($con, "SELECT * FROM class NATURAL JOIN teachers WHERE class_id = '$cid1'") or die(mysqli_error($con));
            $class_row1 = mysqli_fetch_array($q1);
            
            // $rating1 = getClassRating($con, $row1['class_id']);
            $fullname1 = $class_row1['fullname'];
            $course1 = $row1['title'];
            $desc1 = $row1['description'];
            $img1 = $row1['class_thumbnail'];
            
               
           
            ?>
    
    <div class="card align-items-center justify-content-center" style="display:inline-block;">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card" style="width: 18rem;">
                    <?php if ($row1['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="150" width="100%">
                                    <?php } else {?>
                                        <img src="<?php echo $row2['class_thumbnail'] ?>" height="150" width="100%">
                                    <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $course1 ?></h5>
                            <p class="card-text"><?php echo $desc1 ?></p>
                            <p class="card-text main-color">Teacher : <?php echo $fullname1 ?></p>
                            <p><?php echo getClassRating($con, $row1['class_id']); ?></p>
                            <a href="view_class.php?id=<?php echo $row1['class_id'] ?>" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <?php }?>
    <?php }?>
        




<div class="container" style="padding:3%;">
        
        <h1>Expert</h1>
    <?php
    $expert= 'expert';
    $query2 = mysqli_query($con, "SELECT * FROM class WHERE level = '$expert'") or die(mysqli_error($con));
    $lectures2 = mysqli_num_rows($query2);
    if ($lectures2 == 0) {
        echo "<h1 class='text-center mt-5'>No course in this category</h1>";
    } else {
        while ($row2 = mysqli_fetch_array($query2)) {
            $cid2 = $row2['class_id'];
            $std_query2 = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$cid2'") or die(mysqli_error($con));
            $students2 = mysqli_num_rows($std_query2);
            $l_query2 = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$cid2'") or die(mysqli_error($con));
            $lectures_count2 = mysqli_num_rows($l_query2);
            $q2 = mysqli_query($con, "SELECT * FROM class NATURAL JOIN teachers WHERE class_id = '$cid1'") or die(mysqli_error($con));
            $class_row2 = mysqli_fetch_array($q2);
            
              
            // $rating2 = getClassRating($con, $row1['class_id']);
            $fullname2 = $class_row2['fullname'];
            $course2 = $row2['title'];
            $desc2 = $row2['description'];
            $img2 = $row2['class_thumbnail'];
            
               
           
            ?>
    
     <div class="card align-items-center justify-content-center" style="display:inline-block;" >
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card" style="width: 18rem;">
                    <?php if ($row2['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="150" width="100%">
                                    <?php } else {?>
                                        <img src="<?php echo $row2['class_thumbnail'] ?>" height="150" width="100%">
                                    <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $course2 ?></h5>
                            <p class="card-text"><?php echo $desc2 ?></p>
                            <p class="card-text main-color">Teacher : <?php echo $fullname2 ?></p>
                            <p><?php echo getClassRating($con, $row2['class_id']); ?></p>
                            <a href="view_class.php?id=<?php echo $row2['class_id'] ?>" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
    
    
    <?php }?>
    <?php }?>

        <!-- put it here -->
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

