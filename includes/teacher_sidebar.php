<aside class="profile">
<?php 
$tid = $_SESSION['id'];

 $tq = mysqli_query($con, "SELECT * FROM teachers WHERE teacher_id = '$tid'")or die(mysqli_error($con));
 $tqr = mysqli_fetch_array($tq);

?>
        <?php 

        if($tqr['teacher_photo'] == ''){ ?>
            <img src="assets/avatar.png" alt="<?php echo $tqr['fullname'] ?>">
       <?php }else{ ?>
            <img src="<?php echo $tqr['teacher_photo'] ?>" alt="<?php echo $tqr['fullname'] ?>">
       <?php }

        ?>
            <h1> <?php echo $tqr['fullname'] ?> </h1>
            <ul>
                <li><a href="teacher_dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="classes.php">My Classes</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
</aside>
