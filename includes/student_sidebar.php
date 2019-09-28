<aside class="profile">
<?php 
$tid = $_SESSION['id'];

 $tq = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$tid'")or die(mysqli_error($con));
 $tqr = mysqli_fetch_array($tq);

?>
        <?php 

        if($tqr['student_photo'] == ''){ ?>
            <img src="avatar.png" alt="<?php echo $tqr['fullname'] ?>">
       <?php }else{ ?>
            <img src="<?php echo $tqr['student_photo'] ?>" alt="<?php echo $tqr['fullname'] ?>">
       <?php }

        ?>
            <h1> <?php echo $tqr['fullname'] ?> </h1>
            <ul>
                <li><a href="student_dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="all_class.php"> Classes</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
</aside>
