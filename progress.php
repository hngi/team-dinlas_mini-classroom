<?php

$user = ('user');
$classprogress = ('classprogress');


if(isset($_GET['progress'])){
    $progress = $_GET['progress'];

if(isset($_GET['user'])){
    $user= $_GET['user'];
}

    try{
$dsn='mysql:host = localhost; dbname=dinlas';
$user_name = "root";
$user_password = "things";
$conn = new PDO($dsn, $user_name, $user_password );
} catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
$st = $conn->prepare('UPDATE classprogress SET classprogress = ? WHERE userid LIKE ?');
$st->execute(array($progress,$user));
$st->execute();
$conn= null;

}

try{
$dsn='mysql:host = localhost; dbname=dinlas';
$user_name = "root";
$user_password = "things";
$conn = new PDO($dsn, $user_name, $user_password );
} catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    if(isset($_GET['user'])){
    $user= $_GET['user'];
}
$st = $conn->prepare("SELECT * FROM classprogress
	WHERE userid  = ? "); //query user  from classprogress table
	$st->execute(array($user));
        
        
foreach ($st->fetchAll() as $row) {
          $classprogress=  "{$row['classprogress']}";
          
          
      }    
    
    


$returnValue=$classprogress;
$progress=$returnValue.'%';
?>

<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
    <link href="prostyle.css" rel="stylesheet" type="text/css" />
   
</head>

<body>

  <div class="barCon">
       
     <div class="barClass">
     
        <div>Class 1</div>
        <div>Class 2</div>
        <div>Class 3</div>
        <div style="border-right: none;">Class 4</div>
        
     </div>
     
    <div class="bar1">
      <div class="bar2" style="width: <?php echo $progress;?>">
         
      </div>
    </div>
   
    <div class="barButt">
        <?php
        
        if($progress ==0){
          echo ' <a href="http://127.0.0.1/progress/progress.php?progress=25&user=12345"><button>Click to Complete Course 1</button></a>';
        }
        if($progress ==25){
          echo  '<a href="http://127.0.0.1/progress/progress.php?progress=50&user=12345"><button>Click to Complete Course 2</button></a>';
        }
        if($progress ==50){
           echo '<a href="http://127.0.0.1/progress/progress.php?progress=75&user=12345"><button>Click to Complete Course 3</button></a>';
        }
        if($progress ==75){
         echo  '<a href="http://127.0.0.1/progress/progress.php?progress=100&user=12345"><button>Click to Complete Course 4</button></a>';
        }
         if($progress ==100)
            echo '<button>Course Completed</button>';
        ?>
        
    </div>
   
  </div> 

</body>
</html>
