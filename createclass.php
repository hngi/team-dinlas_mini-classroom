<?php
 
include ("db cofig OOP/database.php");
include ("db cofig OOP/dbFunctionReg.php");



    //session start should be added here

    $sub = isset($_POST['submit']);
  if ($sub){
    $minObj = new createHandle;
    $minObj->create_course($_POST['catSelected'], $_POST['cname']);
  } else {
    // echo "submit is defined!";
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini Class</title>
            <!-- fontawesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
            <!-- bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            
            <!-- style.css -->
            <link rel="stylesheet" href="css/style.css">   
</head>
<body class="homebg">


    <h1> Create Class </h1> 
    <h2> Select course category </h2>
    <form  method="POST">
<label>Select course category </label>
<select name="catSelected" required> 
    <option >Select Class Category</option>
       
        <option value="Beginner">Beginner </option>
        <option value="Intermediate">Intermediate </option>
        <option value="Expert"> Expert </option>

    </select>

   
     <br>
     <label> Enter class ngytdame </label> 
     <input name="cname" type="text" required> 
     <br>
     <br>
    <button type="submit">  submit </button>
    </form>

<!-- 
   <form action="https://www.w3schools.com/action_page.php">
  <input list="browsers" name="browser">
  <datalist id="browsers">
    <option value="Internet Explorer">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
  </datalist>
  <input type="submit">
</form> -->

</body>
           <!-- jQuery -->
           <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
           
           bootstrap Javascript
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
           
           Javascript file
           <script src="js/script.js"></script>  -->
</body>
</html>