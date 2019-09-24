<?php

    class database {
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $charset;

            protected function miniDbconnect() {

                $this->servername = "localhost";
                $this->username ="root";
                $this->password ="";
                $this->dbname= "miniclass";
                $this->charset ="utf8mb4";

                try {

                    $dsn ="mysql:host=".$this->servername. ";dbname=". $this->dbname. ";charset".$this->charset;

                    $pdo = new PDO ($dsn, $this->username, $this->password);
                  
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    return $pdo;

                } catch(PDOException $e) {

                    echo "something went wrong". $e->getMessage();
                 }
            } 
    }

?>
