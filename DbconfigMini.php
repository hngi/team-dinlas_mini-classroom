

<?php

class createHandle extends database {

    public   function create_course($cCat, $Cname){
try {
      $createClassDb = $this->Dbconnect();

            $sql = 'INSERT INTO create_class(classcat, classname) values(?, ?)';

            $minStmt = $createClassDb->prepare($sql);
            $minStmt->execute([$cCat, $Cname]);
        
            // echo $minStmt->errorInfo();
            
            
        if ($minStmt->rowCount()){

             header('location:teacher classes.php');

            
        }

        } catch(PDOException $e){
                $this->msg = "there was an error".$e->getMessage();
        }
    }
 

           public function teacherClasses(){

           try {    
                $createClassDb = $this-> Dbconnect();

                $sqlQuery = "SELECT * FROM create_class ";
                $minStmt = $createClassDb ->query($sqlQuery);

                // $minstmt= $createClassDb->prepare($sql);

                // $minstmt->execute();
// i just need to select the query
                return $minStmt;


        }catch(PDOException $e){
                echo "some error. Please try again!".$e->getMessage(); 
    }
        } 
}







?>
