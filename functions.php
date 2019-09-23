<?php

function connecTDatabase(){   //function to connect to database
  //connect to the database
try{
$dsn = 'mysql:host=localhost;dbname=dinlas';
$user_name = "root";
$user_password = " ";
$conn = new PDO($dsn, $user_name, $user_password );
} catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
  return $conn;
}


function starTSession1(){     //function to set session
ob_start();
session_start();
$_SESSION['token'] = ;       //yet to generate a session token
}


if(isset($_SESSION['studentID']) || isset($_SESSION['teacherID'])){
	
//student session

if(isset($_SESSION['studentID'])){
$studentID=$_SESSION['studentID'];
$studentNo=$studentID;  //set variable for project
$whereStr= "studentid=$studentNo";

$conn=connecTDatabase();    //connect to database
$queRy = "SELECT 
FROM students WHERE $whereStr ";

$st = $conn->query("$queRy");
foreach ($st->fetchAll() as $row) {
  
  
}

//teacher session

if(isset($_SESSION['teacherID'])){
$teacherid=$_SESSION['teacherID']; //set variable for project
$whereStr= "teacherid=$teacherid";
$conn=connecTDatabase();    //connect to database
$queRy = "SELECT 
FROM teachers WHERE $whereStr ";

$st = $conn->query("$queRy");
foreach ($st->fetchAll() as $row) {
  
  
}



//unset session

?>