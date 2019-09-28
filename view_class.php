<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';
include 'includes/functions.php';
isLoggedIn();


if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$class_id = $_GET['id'];

$q = mysqli_query($con, "SELECT * FROM class 
NATURAL JOIN teachers
WHERE class_id = '$class_id'

") or die(mysqli_error($con));
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
        if($_SESSION['type'] == 'teacher'){
include 'includes/teacher_sidebar.php';
        }else{
include 'includes/student_sidebar.php';

        }
?>
        <main class="add-course">
            <?php echo showAlert() ?>

            <h1 class="text-center main-color"> <?php echo $class_row['title'] ?> </h1>
            <h5 class="text-center main-color"><?php echo $class_row['description'] ?></h5> 
            <br><br>
            <div style="margin-right: 20px; margin-left: 20px;">
                <div style="float: left">
                    <b class="main-color">Teacher:  <?php echo $class_row['fullname'] ?></b>
                </div>
                <div style="float: right">
                    <?php echo getClassRating($con, $class_row['class_id']); ?> Students
                </div>
            </div>
                <br><br>

            <?php

            if($class_row['teacher_id'] == $_SESSION['id'] && $_SESSION['type'] == 'teacher' ){
            ?>
            <a href="add_item.php?id=<?php echo $class_row['class_id'] ?>" class="btn btn-info pull-left">Add Lecture to Class</a> 
            <?php } ?>

            <?php

            
            $std = $_SESSION['id'];
            $std_query = mysqli_query($con, "SELECT * FROM student_class WHERE class_id = '$class_id' AND student_id = '$std' ") or die(mysqli_error($con));
            $join_count = mysqli_num_rows($std_query);


            if($_SESSION['type'] == 'student' && $join_count > 0){
                $std_id = $_SESSION['id'];

                $r = mysqli_query($con, "SELECT * FROM class_rating WHERE student_id = '$std_id' AND class_id = '$class_id'")or die(mysqli_error($con));
                $scount = mysqli_num_rows($r);

                if($scount == 0){
                    echo '<a href="#" class="btn btn-info" style="float: right" data-toggle="modal" data-target="#exampleModal">
                        Rate Class
                    </a>';
                }else{
                    $rr = mysqli_fetch_array($r);
                    echo '<b> Your Rating: '.$rr['rating'].'</b>';
                }

            ?>
            
            <?php }
            
            if($class_row['teacher_id'] == $_SESSION['id'] &&  $_SESSION['type'] == 'teacher'){ ?>
                    <div  style="float: right">
                        <a href="edit_class.php?id=<?php echo $class_id ?>" class="btn btn-success btn-sm"> <i class="fa fa-edit text-light"></i> Edit </a> 
                        <a id="<?php echo $class_id ?>" href="#" title="Delete" class="btn btn-danger btn-sm delete-class"> <i class="fa fa-trash text-light"></i> Delete </a> 
                    </div>
            <?php } ?>
           <br>

            <div class="container">

            <!-- Students query -->
            <?php


            if(($_SESSION['type'] == 'student' && $join_count == 0) || ($_SESSION['type'] != 'student' && $_SESSION['type'] != 'teacher')){ ?>
            <h1 class='text-center my-2'> You cannot access contents of this class! <br>
            <a href="join_class.php?id=<?php echo $class_row['class_id'] ?>" class="btn btn-info btn-lg">Join now</a>
            </h1>

            <?php }else{

?>

            <!-- list of lectures -->
            <?php
            $query = mysqli_query($con, "SELECT * FROM class_items WHERE class_id = '$class_id' ORDER BY item_id DESC")or die(mysqli_error($con));
            $lectures = mysqli_num_rows($query);

            if($lectures == 0){
                echo "<h1 class='text-center mt-5'>No Lectures Available yet!</h1>";

            }else{

                $i = $lectures;
                while($row = mysqli_fetch_array($query)){ ?>

                 <!-- Start Lecture Card -->
                <div class="card" style="margin-top: 30px;">
                    <div class="card-header bg-info text-light"><i class="fa fa-book text-light"></i> Lecture #<?php echo $i ?>  <span style="float: right"><?php echo date("l j, M Y - h:i A", strtotime($row['date_added'])); ?></span>  </div>
                    <div class="card-body">
                    <p>
                        <span class="text-center"><b><u><?php echo $row['item_title'] ?> </u></b></span>
                    </p>
                        <p>
                            <?php echo $row['content'] ?>
                        </p>
                        <?php 
                        if($row['youtube_link'] !== ''){
                        ?>
                        <br>
                        <div class="">
                            <b><span class="text-info"> VIDEO</span> </b> <br>
                            <iframe src="https://www.youtube.com/embed/<?php echo getYoutubeID($row['youtube_link']) ?>" width="420" height="315" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <?php } ?>

                        <br>
                        <?php 
                        if($row['pdf_file'] !== ''){
                        ?>
                        <a href="<?php echo $row['pdf_file'] ?>" class="btn btn-info btn-lg" style="float: right"> <i class="fa fa-download text-light"></i> Download Resource </a>
                        <div style="clear: both"></div>
                         <br><br><br>

                        <?php } ?>

                        <?php if($class_row['teacher_id'] == $_SESSION['id'] && $_SESSION['type'] != 'student'){ ?>

                        <a href="edit_lecture.php?id=<?php echo $row['item_id'] ?>" class="btn btn-success btn-sm" style="float: left"> <i class="fa fa-edit text-light"></i> Edit </a> 
                        <a id="<?php echo $row['item_id'] ?>" href="#" title="Delete" class="btn btn-danger btn-sm delete" style="float: right"> <i class="fa fa-trash text-light"></i> Delete </a> 

                        <?php } ?>
                    </div>
                </div>
                <!-- End Lecture card -->

                <?php 
            $i--;    
            }
            }
        }

            ?>


               

            </div>

        </main>
    </div>

<!-- Modal -->
<div class="modal  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate this Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="rate_class.php">
            <input type="hidden" name="class_id" value="<?php echo $class_id ?>">
                <div class="form-group">
                    <label>Rating</label>
                    <select name="rating" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="rate" class="btn btn-info">Rate!</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>



    <!-- jQuery 2.1.4 -->
    <script src="includes/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="includes/js/jquery.min.js"></script>
    <!-- bootstrap.min -->
<!-- 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

     <script type="text/javascript">
        $(function() {
            $(".delete").click(function() {
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                if (confirm("Are you sure you want to Delete this Lecture?")) {
                    $.ajax({
                        type: "POST",
                        url: "delete_lecture.php",
                        data: info,
                        success: function() {
                            document.location = 'teacher_dashboard.php';
                        }
                    });
                    $(this).parents(".show").animate({
                            backgroundColor: "#003"
                        }, "slow")
                        .animate({
                            opacity: "hide"
                        }, "slow");
                }
                return false;
            });
        });
    </script>

         <script type="text/javascript">
        $(function() {
            $(".delete-class").click(function() {
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                if (confirm("Are you sure you want to Delete this Class?")) {
                    $.ajax({
                        type: "POST",
                        url: "delete_class.php",
                        data: info,
                        success: function() {
                            document.location = 'teacher_dashboard.php';
                        }
                    });
                    $(this).parents(".show").animate({
                            backgroundColor: "#003"
                        }, "slow")
                        .animate({
                            opacity: "hide"
                        }, "slow");
                }
                return false;
            });
        });
    </script>

    <?php
// include 'includes/footer.php';
?>


</body>
</html>