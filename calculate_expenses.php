<?php 

// session_start();
// require_once 'Dao.php';
// $dao = new Dao();
// $dbret = $dao->getUser();

function echo_cost($ename, &$dnum){
    // $ename = htmlspecialchars($_POST["ename"]);
    // $dnum = htmlspecialchars($_POST["dnum"]);
    $_SESSION["ename"] = $ename;
    $_SESSION["dnum"] = $dnum;

    //The employee gets a discount on their deductions if their name begins with 'A'
    if((substr(strtoupper($ename),0,1) == "A") && is_numeric($dnum)){
        // They have dependents
        if($dnum != 0){
            $dnum = (26 * 2000) - ((1000 + (500 * $dnum)) * 0.9);
        }
        else{ //They have no dependents
            $dnum = (26 * 2000) - (1000 * 0.9);    
        }
        echo "$".$dnum;
        echo "<br>10% discount applied!";
        //add this employee to the list of all
        add_to_elist($ename, $dnum);
    }
      //Regular Employees 
      else if((substr(strtoupper($ename),0,1) != "A") && is_numeric($dnum)){
        // They have dependents
        if($dnum != 0){
            $dnum = (26 * 2000) - (1000 + (500 * $dnum));  
        }
        else{ //They have no dependents
            $dnum = (26 * 2000) - 1000;    
        }
        echo "$".$dnum;
        echo "<br>10% discount applied!";
        //add this employee to the list of all
        add_to_elist($ename, $dnum);
    }

}

function add_to_elist($ename,$dnum){

}

?>

  