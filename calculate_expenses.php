<?php 

session_start();

if( isset($_SESSION["ename"]) && isset($_SESSION["dnum"]) ){
    $ecost = "";
    $ename = htmlspecialchars($_POST["ename"]);
    $dnum = htmlspecialchars($_POST["dnum"]);
    
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
    header("location:cost_page.php");
}
else{
//    header("location:cost_page.php");
//    exit;
}
?>

  