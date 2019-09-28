<?php
//require_once 'KLogger.php';
class Dao extends mysqli {
    private $host = "us-cdbr-iron-east-02.cleardb.net"; 
    private $db = "heroku_e673f8a007f0454"; 
    private $dsn = "mysql:host=us-cdbr-iron-east-02.cleardb.net;dbname=heroku_e673f8a007f0454";
    private $user = "b31b6b4ad98990";
    private $pass = "6f3b3d26";
    public $con = "";
//    b7cb13a4
    
    
    function __construct(){
        $this->con = $this->connect($this->host,$this->user,$this->pass,$this->db);
    }
   
    public function getConnection () {
        try {
            $con = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } 
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }      
    }

    public function getTotalCost () {
        $con = $this->getConnection();
        $sqlret = $con->prepare("SELECT username, password FROM users");
        $sqlret->execute();
        $result = $sqlret->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
  }
    public function updateDB($style, $stock){
        if($_SESSION['loggedin'] == true){
            $conn = $this->getConnection();
//            $updateQuery = "UPDATE users SET stock = $stock, style = $style WHERE id = 1"; 
            $updateQuery = "UPDATE users SET stock = :stock, style = :style WHERE id = 1"; 
            $q = $conn->prepare($updateQuery);
            $q->bindParam(":style",$style);
            $q->bindParam(":stock",$stock);
            $q->execute();
        }
    }
    public function getPref(){
        $con = $this->getConnection();
        $sqlret = $con->prepare("SELECT style, stock FROM users");
        $sqlret->execute();
        $result = $sqlret->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}

        

?>