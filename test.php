<?php session_start();

//Proper Database configuration here
include 'includes/db_connection.php';

$class_id = '1';
$q = mysqli_query($con, "SELECT SUM(rating) as ratings, COUNT(student_id) as total FROM class_rating WHERE class_id = '$class_id'") or die(mysqli_error($con));
$r = mysqli_fetch_array($q);

$ratings = $r['ratings'];
$total = $r['total'];
$avg = ceil($ratings / $total);

echo "Sum: " . $r['ratings'] . " | Total: " . $r['total'] . "<br>";
echo 'Average: ' . $avg;
