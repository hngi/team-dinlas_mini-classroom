<?php

require_once('config.php');

// $con = mysqli_connect("localhost", "root", "", "volunteerng");
$con = mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connectto MySQL: " . mysqli_connect_error();

}
