<?php

    include ('jovial_Db_config/dataBase.php');
    include ('DbconfigMini.php');


?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>miniclass</title>
        
        <!-- fontawesome  !>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- bootstrap CSS! -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- style.css -->
        <link rel="stylesheet" href="css/style.css">    
        
       

    </head>
    <body>
<?php
    $minObj = new createHandle;
    $showCat =$minObj->teacherClasses();

// this will reveal the datbase use in creating
?>
    <h1> Welcome to your class! </h2>
<?php while($showCatloop = $showCat->fetch() ){?>
    <div >
        <h3> Course category: <?php echo $showCatloop->classcat; ?>  </h3> 

        <h3> Course Name: <?php echo $showCatloop ->classname ; ?>  </h3>   
    </div>
<?php  } ?>
    </body>
    </html>