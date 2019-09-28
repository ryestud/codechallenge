<?php 

// session_start();

function echo_cost($ename, &$dnum){
    $ename = htmlspecialchars($_POST["ename"]);
    $dnum = htmlspecialchars($_POST["dnum"]);

    //The employee gets a discount on their deductions if their name begins with 'A'
    if((substr(strtoupper($ename),0,1) == "A") && is_numeric($dnum)){
        // They have dependents
        if($dnum != 0){
            $dnum = (26 * 2000) - ((1000 + (500 * $dnum)) * 0.9);
            // $dnum = ($dnum * 0.9);    
        }
        else{ //They have no dependents
            $dnum = (26 * 2000);
            $dnum = ($dnum * 0.9);    
        }
        echo "$".$dnum;
        echo "<br>10% discount applied!";
        //add this employee to the list of all
        add_to_elist($ename, $dnum);
    }

}

function add_to_elist($ename,$dnum){

}

if( isset($_SESSION["ename"]) && isset($_SESSION["dnum"]) ){
    $ecost = "";
    
    
    //validate form data
    if( is_numeric( $dnum ) && is_string( $ename ) )
    {
        $_SESSION["ename"] = $_POST["ename"];
        $_SESSION["dnum"] = $_POST["dnum"];
        
    }
    else
    { 
//        echo( "Invalid entry - please retry" ); 
        
    }
    // header("location:cost_page.php");
}
else{
//    header("location:cost_page.php");
//    exit;
}
?>

  