<?php
class createHandle extends database {

    public   function create_course($cCat, $Cname){
try {
      $createClassDb = $this->miniDbconnect();

            $sql = 'INSERT INTO create_class(classcat, classname) values(?, ?)';

            $minStmt = $createClassDb->prepare($sql);
            $minStmt->execute([$cCat, $Cname]);
            
        if (!$minStmt->rowCount()){
             echo "this sis not hit our database!";
        }

        } catch(PDOExecption $e){
                $this->msg = "there was an error".$e->getMessage();
        }

    }
}
?>