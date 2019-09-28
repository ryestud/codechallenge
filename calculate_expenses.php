<?php 

// session_start();
require_once 'Dao.php';
// $dbret = $dao->getUser();

function echo_cost($ename, $dnum){
    $ename = htmlspecialchars($_POST["ename"]);
    $dnum = htmlspecialchars($_POST["dnum"]);
    $ecost = "";
    $_SESSION["ename"] = $ename;
    $_SESSION["dnum"] = $dnum;
    

    //The employee gets a discount on their deductions if their name begins with 'A'
    if((substr(strtoupper($ename),0,1) == "A") && is_numeric($dnum)){
        // They have dependents
        if($dnum != 0){
            $ecost = (26 * 2000) - ((1000 + (500 * $dnum)) * 0.9);
        }
        else{ //They have no dependents
            $ecost = (26 * 2000) - (1000 * 0.9);    
        }
        echo "$".$ecost;
        echo "<br>10% discount applied!";
        //add this employee to the list of all
        add_to_elist($ename, $dnum, $ecost);
    }
      //Regular Employees 
      else if((substr(strtoupper($ename),0,1) != "A") && is_numeric($dnum)){
        // They have dependents
        if($dnum != 0){
            $ecost = (26 * 2000) - (1000 + (500 * $dnum));  
        }
        else{ //They have no dependents
            $ecost = (26 * 2000) - 1000;    
        }
        echo "$".$ecost;
        //add this employee to the list of all
        add_to_elist($ename, $dnum, $ecost);
    }

}

function add_to_elist($ename,$dnum,$ecost){
    $dao = new Dao();
    $dao->updateDB($ename,$dnum,$ecost);
}

?>

  