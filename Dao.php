<?php

class Dao extends mysqli {
    private $host = "us-cdbr-iron-east-02.cleardb.net"; 
    private $db = "heroku_e673f8a007f0454"; 
    private $dsn = "mysql:host=us-cdbr-iron-east-02.cleardb.net;dbname=heroku_e673f8a007f0454";
    private $user = "b31b6b4ad98990";
    private $pass = "6f3b3d26";
    public $con = "";
    
    function __construct(){
        $this->con = $this->connect($this->host,$this->user,$this->pass,$this->db);
    }
   
    //connection to ClearDB
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

    //returns the total cost of all employees
    public function getTotalCost() {
        $con = $this->getConnection();
        $totalQuery = "SELECT SUM(ecost) AS totCost FROM employee";
        $sqlret = $con->prepare($totalQuery);
        $sqlret->execute();
        $result = $sqlret->fetch(PDO::FETCH_ASSOC);
        return $result['totCost'];
    }

    //updates the db with a new employee entry
    public function updateDB($ename, $dnum, $ecost){
        if(isset($_SESSION['ename'])){
            $conn = $this->getConnection();
            $data = [
                'ename'=>$ename,
                'dnum'=>$dnum,
                'ecost'=>$ecost,
            ];
            $updateQuery = "INSERT INTO employee (ename, dnum, ecost) VALUES (:ename, :dnum, :ecost)"; 
            $q = $conn->prepare($updateQuery);
            $q->bindParam(":ename",$ename);
            $q->bindParam(":dnum",$dnum);
            $q->bindParam(":ecost",$ecost);
            $q->execute();
        }
    }

    //remove entry from DB
    public function clearDB($ename){
        $dbquery = "DELETE FROM employee WHERE ID = $ename";
        $con = $this->getConnection();
        $sqlret = $con->prepare($dbquery);
 

    }
}

        

?>