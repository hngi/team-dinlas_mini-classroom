<?php

//connection variables
$host = 'a5s42n4idx9husyc.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306';
$user = 'i2nur0ym9o5hc94i';
$password = 'rzthcnliqigjkpdb';
$dbname = 'usqod01dmfdpbgq0';


// TEST 

//connection variables
// $host = 'localhost';
// $user = 'root';
// $password = '';
// $dbname = 'mini_class';


//create mysql connection
$conn = new mysqli($host,$user,$password,$dbname);
if ($conn->connect_error) {
    printf("Connection failed: %s\n", $conn->connect_error);
    die();
}

$new_column = $conn->query('ALTER TABLE class ADD category VARCHAR(50) NOT NULL');

//RUN QUERY
if ($new_column !== FALSE ) {
    printf("The column has been added");
} else {
  printf("The column has not been added: %s\n", $new_column->error);
}

?>


