<?php

class Database{

    private $host = "db";
    private $db_name = "alumno_db";
    private $username = "root";
    private $password = "rootpass";
    public $conn;

    public function getConn(){

        $this->conn = null;

        try{

            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "conectado";
        }

        catch(PDOException $e){

            echo "Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

?>