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
    <h1 class="text-center main-color">Course Track</h1>

    <?php echo showAlert() ?>
    
    
            <!--Modifications  -->
        <div class="container m-3" style="margin:auto;">
            <a href="course_track.php?software" class="btn btn-info pull-left">software</a> 
            <a href="course_track.php?hardware" class="btn btn-info pull-left">Hardware</a> 
            <a href="course_track.php?design" class="btn btn-info pull-left">Design</a> 
            <a href="course_track.php?marketing" class="btn btn-info pull-left">Marketing</a> 
        </div>
        <!-- ANOTHER DESIGN -->
        <div class="container">
        <?php
            if(isset($_GET['design'])) {
                $category = 'design';
                $get_cat = "SELECT * FROM class WHERE category ='$category'";
                $run_cat = mysqli_query($con, $get_cat);
                $count_cat = mysqli_num_rows($run_cat);
                if($count_cat == 0) {
                    echo "<h1 class='text-center mt-5'>No Course in this track</h1>";
                } 
                while($row = mysqli_fetch_assoc($run_cat)){
                      $class_id = $row['class_id'];
                      $stud_query = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$class_id'") or die(mysqli_error($con));
                      $stud = mysqli_num_rows($stud_query);
            
                     $lect_query = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$class_id'") or die(mysqli_error($con));
                     $lect_count = mysqli_num_rows($lect_query);
                    // $class_id = $row_cat['class_id'];
                    // $teacher_id = $row_cat['teacher_id'];
                    // $title = $row_cat['title'];
                    // $level = $row_cat['level'];
                    // $desc = $row_cat['description'];
                    // $date = $row_cat['date_created'];
                    // $completed = $row_cat['completed'];
                    // $class_thumb = $row_cat['class_thumbnail'];
            
            
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
                                <span class="text-muted text-small"><b><?php echo $stud ?> Students | <?php echo $lect_count ?> Lectures</b></span>
                                <span class="text-muted text-small" style="float: right">Created: <?php echo date("l j, M Y", strtotime($row['date_created'])); ?></span>
                                <br>
																<?php echo getClassRating($con, $row['class_id']); ?>
                                <!-- <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <b>4 / 5</b> (734) -->
                            </div>
                            <div class="col-md-10 pt-5" >
                            <span class="text-muted text-small">
                             <?php
                                /*if($row['completed'] == 0) {
                                    echo "Course In Progress";
                                } else {
                                    echo "Course Completed";
                                }
                                // echo $row['category']; */  
                            ?>
                            
                                </b></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Class card -->

                <?php }?>
                <?php }?>


                <!-- ANOTHER MARKETING-->

                <div class="container">
        <?php
            if(isset($_GET['marketing'])) {
                $category1 = 'marketing';
                $get_cat1 = "SELECT * FROM class WHERE category ='$category1'";
                $run_cat1 = mysqli_query($con, $get_cat1);
                $count_cat1 = mysqli_num_rows($run_cat1);
                if($count_cat1 == 0) {
                    echo "<h1 class='text-center mt-5'>No Course in this track</h1>";
                } 
                while($row1 = mysqli_fetch_assoc($run_cat1)){
                      $class_id1 = $row1['class_id'];
                      $stud_query1 = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$class_id1'") or die(mysqli_error($con));
                      $stud1 = mysqli_num_rows($stud_query1);
            
                     $lect_query1 = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$class_id1'") or die(mysqli_error($con));
                     $lect_count1 = mysqli_num_rows($lect_query1);
                    // $class_id = $row_cat['class_id'];
                    // $teacher_id = $row_cat['teacher_id'];
                    // $title = $row_cat['title'];
                    // $level = $row_cat['level'];
                    // $desc = $row_cat['description'];
                    // $date = $row_cat['date_created'];
                    // $completed = $row_cat['completed'];
                    // $class_thumb = $row_cat['class_thumbnail'];
            
            
        ?>

         <!-- Start Class Card -->
         <div class="card" style="margin-top: 30px;">
                    <div class="card-header bg-info text-light"><i class="fa fa-user text-light"></i> <?php echo ucfirst($row1['level']) ?> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <?php
                                    if ($row1['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="100" width="90">
                                    <?php } else {?>
                                        <img src="<?php echo $row1['class_thumbnail'] ?>" height="100" width="90">
                                    <?php }
                                    ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <b>
                                    <a href="view_class.php?id=<?php echo $row1['class_id'] ?>"> <?php echo $row1['title'] ?> </a>
                                    </b>
                                </h4>
                                <br>
                                <span class="text-muted text-small"><b><?php echo $stud1 ?> Students | <?php echo $lect_count1 ?> Lectures</b></span>
                                <span class="text-muted text-small" style="float: right">Created: <?php echo date("l j, M Y", strtotime($row1['date_created'])); ?></span>
                                <br>
																<?php echo getClassRating($con, $row1['class_id']); ?>
                                <!-- <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <b>4 / 5</b> (734) -->
                            </div>
                            <div class="col-md-10 pt-5" >
                            <span class="text-muted text-small">
                             <?php
                                // if($row1['completed'] == 0) {
                                //     echo "Course In Progress";
                                // } else {
                                //     echo "Course Completed";
                                // }
                                // echo $row['category'];   
                            ?>
                            
                                </b></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Class card -->

                <?php }?>
                <?php }?>

                <!-- ANOTHER HARDWARE-->
                <div class="container">
        <?php
            if(isset($_GET['hardware'])) {
                $category2 = 'hardware';
                $get_cat2 = "SELECT * FROM class WHERE category ='$category2'";
                $run_cat2 = mysqli_query($con, $get_cat2);
                $count_cat2 = mysqli_num_rows($run_cat2);
                if($count_cat2 == 0) {
                    echo "<h1 class='text-center mt-5'>No Course in this track</h1>";
                } 
                while($row2 = mysqli_fetch_assoc($run_cat2)){
                      $class_id2 = $row2['class_id'];
                      $stud_query2 = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$class_id2'") or die(mysqli_error($con));
                      $stud2 = mysqli_num_rows($stud_query2);
            
                     $lect_query2 = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$class_id2'") or die(mysqli_error($con));
                     $lect_count2 = mysqli_num_rows($lect_query2);
                    // $class_id = $row_cat['class_id'];
                    // $teacher_id = $row_cat['teacher_id'];
                    // $title = $row_cat['title'];
                    // $level = $row_cat['level'];
                    // $desc = $row_cat['description'];
                    // $date = $row_cat['date_created'];
                    // $completed = $row_cat['completed'];
                    // $class_thumb = $row_cat['class_thumbnail'];
            
            
        ?>

         <!-- Start Class Card -->
         <div class="card" style="margin-top: 30px;">
                    <div class="card-header bg-info text-light"><i class="fa fa-user text-light"></i> <?php echo ucfirst($row2['level']) ?> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <?php
                                    if ($row2['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="100" width="90">
                                    <?php } else {?>
                                        <img src="<?php echo $row2['class_thumbnail'] ?>" height="100" width="90">
                                    <?php }
                                    ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <b>
                                    <a href="view_class.php?id=<?php echo $row2['class_id'] ?>"> <?php echo $row2['title'] ?> </a>
                                    </b>
                                </h4>
                                <br>
                                <span class="text-muted text-small"><b><?php echo $stud2 ?> Students | <?php echo $lect_count2 ?> Lectures</b></span>
                                <span class="text-muted text-small" style="float: right">Created: <?php echo date("l j, M Y", strtotime($row2['date_created'])); ?></span>
                                <br>
																<?php echo getClassRating($con, $row2['class_id']); ?>
                                <!-- <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <b>4 / 5</b> (734) -->
                            </div>
                            <div class="col-md-10 pt-5" >
                            <span class="text-muted text-small">
                             <?php
                                // if($row2['completed'] == 0) {
                                //     echo "Course In Progress";
                                // } else {
                                //     echo "Course Completed";
                                // }
                                // echo $row['category'];   
                            ?>
                            
                                </b></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Class card -->

                <?php }?>
                <?php }?>

                <!-- ANOTHER SOFTWARE -->

                <div class="container">
        <?php
            if(isset($_GET['software'])) {
                $category3 = 'software';
                $get_cat3 = "SELECT * FROM class WHERE category ='$category3'";
                $run_cat3 = mysqli_query($con, $get_cat3);
                $count_cat3 = mysqli_num_rows($run_cat3);
                if($count_cat3 == 0) {
                    echo "<h1 class='text-center mt-5'>No Course in this track</h1>";
                } 
                while($row3 = mysqli_fetch_assoc($run_cat3)){
                      $class_id3 = $row3['class_id'];
                      $stud_query3 = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$class_id3'") or die(mysqli_error($con));
                      $stud3= mysqli_num_rows($stud_query3);
            
                     $lect_query3 = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$class_id3'") or die(mysqli_error($con));
                     $lect_count3 = mysqli_num_rows($lect_query3);
                    // $class_id = $row_cat['class_id'];
                    // $teacher_id = $row_cat['teacher_id'];
                    // $title = $row_cat['title'];
                    // $level = $row_cat['level'];
                    // $desc = $row_cat['description'];
                    // $date = $row_cat['date_created'];
                    // $completed = $row_cat['completed'];
                    // $class_thumb = $row_cat['class_thumbnail'];
            
            
        ?>

         <!-- Start Class Card -->
         <div class="card" style="margin-top: 30px;">
                    <div class="card-header bg-info text-light"><i class="fa fa-user text-light"></i> <?php echo ucfirst($row3['level']) ?> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <?php
                                    if ($row3['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="100" width="90">
                                    <?php } else {?>
                                        <img src="<?php echo $row3['class_thumbnail'] ?>" height="100" width="90">
                                    <?php }
                                    ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <b>
                                    <a href="view_class.php?id=<?php echo $row3['class_id'] ?>"> <?php echo $row3['title'] ?> </a>
                                    </b>
                                </h4>
                                <br>
                                <span class="text-muted text-small"><b><?php echo $stud3 ?> Students | <?php echo $lect_count3 ?> Lectures</b></span>
                                <span class="text-muted text-small" style="float: right">Created: <?php echo date("l j, M Y", strtotime($row3['date_created'])); ?></span>
                                <br>
																<?php echo getClassRating($con, $row3['class_id']); ?>
                                <!-- <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <b>4 / 5</b> (734) -->
                            </div>
                            <div class="col-md-10 pt-5" >
                            <span class="text-muted text-small">
                             <?php
                                // if($row3['completed'] == 0) {
                                //     echo "Course In Progress";
                                // } else {
                                //     echo "Course Completed";
                                // }
                                // echo $row['category'];   
                            ?>
                            
                                </b></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Class card -->

                <?php }?>
                <?php }?>
                    <!-- END ANOTHER SOFTWARE -->


                    <!-- MAJOR ANOTHER -->

                    <div class="container">
        <?php
            if(!isset($_GET['design'])) {
                if(!isset($_GET['software'])) {
                    if(!isset($_GET['hardware'])) {
                        if(!isset($_GET['marketing'])) {
													 
													$query = mysqli_query($con, "SELECT * FROM class ORDER BY class_id DESC") or die(mysqli_error($con));
                            $lectures = mysqli_num_rows($query);
                            
                            if ($lectures == 0) {
                                echo "<h1 class='text-center mt-5'>You have no Class!</h1>";
                            } else {
                                while ($row4 = mysqli_fetch_array($query)) { 
                            
                                    $cid = $row4['class_id'];
                            
                                    $std_query = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$cid'") or die(mysqli_error($con));
                                    $students = mysqli_num_rows($std_query);
                            
                                    $l_query = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$cid'") or die(mysqli_error($con));
                                    $lectures_count = mysqli_num_rows($l_query);
                            
                                    ?>

         <!-- Start Class Card -->
         <div class="card" style="margin-top: 30px;">
                    <div class="card-header bg-info text-light"><i class="fa fa-user text-light"></i> <?php echo ucfirst($row4['level']) ?> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <?php
                                    if ($row4['class_thumbnail'] == '') {?>
                                        <img src="assets/logo.png" height="100" width="90">
                                    <?php } else {?>
                                        <img src="<?php echo $row4['class_thumbnail'] ?>" height="100" width="90">
                                    <?php }
                                    ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <b>
                                    <a href="view_class.php?id=<?php echo $row4['class_id'] ?>"> <?php echo $row4['title'] ?> </a>
                                    </b>
                                </h4>
                                <br>
                                <span class="text-muted text-small"><b><?php echo $students ?> Students | <?php echo $lectures_count ?> Lectures</b></span>
                                <span class="text-muted text-small" style="float: right">Created: <?php echo date("l j, M Y", strtotime($row4['date_created'])); ?></span>
                                <br>
																<?php echo getClassRating($con, $row4['class_id']); ?>
                                <!-- <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <i class="fa fa-star text-info"></i>
                                <b>4 / 5</b> (734) -->
                            </div>
                            <div class="col-md-10 pt-5" >
                            <span class="text-muted text-small">
                             <?php
                                // if($row4['completed'] == 0) {
                                //     echo "Course In Progress";
                                // } else {
                                //     echo "Course Completed";
                                // }
                                // // echo $row['category'];   
                            ?>
                            
                                </b></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Class card -->

                <?php }?>
                <?php }?>
								<?php }?>
								<?php }?>
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