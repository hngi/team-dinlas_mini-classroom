<?php

class database {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function Dbconnect() {
        // $this->servername = "sql213.byethost7.com";
        // $this->username = "b7_24500294";
        // $this->password = "theminions";
        // $this->dbname= "b7_24500294_users";
        // $this->charset = "utf8mb4"; 
        $this->servername = "localhost";
        $this->usernae = "root";
        $this->password = "";
        $this->dbname= "miniclass";
        $this->charset = "utf8mb4"; 

    try {
        $dsn ="mysql:host=".$this->servername. ";dbname=". $this->dbname. ";charset".$this->charset;

        $pdo = new PDO ($dsn, $this->username, $this->password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
 catch (PDOException $e) {
    echo "Somthing actually went wrong".$e->getMessage();
        }
    } 
}

?>
