<?php
class Database{
    private $host = "localhost";
    private $db = "proyecto";
    private $user = "demo";
    private $password = "123";

    public function __construct()
    {
        // Constructor
    }
    
    //Metodo para conexion a la base de datos.
    public function connect(){
        try {
            $PDO = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db,
                $this->user,
                $this->password
            );
            return $PDO;
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }
}
?>