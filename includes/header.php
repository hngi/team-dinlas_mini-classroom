<header id="header">
        <img src="assets/logo.png" alt="Team Dinlas" height="60">
        <form action="search.php">
            <label for="search">
                <input type="search" name="q" id="search" placeholder="Find your classes">
                <span>&telrec;</span>
            </label>
        </form>
        <?php

$tid = $_SESSION['id'];


        if($_SESSION['type'] == 'teacher'){

$tq = mysqli_query($con, "SELECT * FROM teachers WHERE teacher_id = '$tid'") or die(mysqli_error($con));
$tqr = mysqli_fetch_array($tq);

?>
        <?php

if ($tqr['teacher_photo'] == '') {?>
            <a href=""><img src="assets/avatar.png" alt="<?php echo $tqr['fullname'] ?>" width="50" height="50" class="avatar"></a>
       <?php } else {?>
            <a href=""><img src="<?php echo $tqr['teacher_photo'] ?>" alt="<?php echo $tqr['fullname'] ?>" width="50" height="50" class="avatar"></a>
       <?php }

        }else{

            $tq = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$tid'") or die(mysqli_error($con));
$tqr = mysqli_fetch_array($tq);

?>
        <?php

if ($tqr['student_photo'] == '') {?>
            <a href=""><img src="assets/avatar.png" alt="<?php echo $tqr['fullname'] ?>" width="50" height="50" class="avatar"></a>
       <?php } else {?>
            <a href=""><img src="<?php echo $tqr['student_photo'] ?>" alt="<?php echo $tqr['fullname'] ?>" width="50" height="50" class="avatar"></a>
       <?php }

        }

?>
        <!-- <a href=""><img src="assets/avatar.png" alt="Img" width="50" height="50" class="avatar"></a> -->
    </header>