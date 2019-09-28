<?php
    session_start();
    include 'calculate_expenses.php';
    $ename = "";
    $dnum = "";
    $ecost = "";
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom style sheet -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
    <title>Employee Expenses</title>
  </head>
  <body>
<!--
     <div class = " justify-content-end">
            <h1>Employee Expense Calculator</h1>
    </div>
-->
    <div class = "container">
        <div class = "row ">
            <div class = "col-md">
                <div class = "container back_panel" >
                    <p id = "bright_text">Employee Expenses Calculator</p>
                    <form  method = "post" action = "">
                        
                        <!--form input-->
                        <div class = "row inner_panel">
                            <!--name form-->
                            <div class = "col-8 col-sm-6 container-fluid">
                                    <label  for='ename'><b>Name:</b></label>
                                    <input type = "text" id="ename" placeholder='Employee Name' value = "<?php  ?>" name = "ename" size = "20" required>
                            </div>
                                
                            <!--dependent form-->
                            <div class = "col-4 col-sm-6 container-fluid">
                                    <label  for='dnum'><b>Dependents:</b></label>
                                    <input type = "number" id="dnum" value = "<?php   ?>" name = "dnum" size = "5" required>
                            </div>
                        </div>
                        
                        <div class = "row inner_panel">
                            <div class = "col-md">
                                
                            Total:
                            <?php
                                    echo_cost($ename,$dnum);
                            ?>

                            </div>
                            <div>
                                
                            </div>
                        </div>
                        <input type = "submit" value = "Calculate"> 
                        <input type = "reset" value = "Clear">
                    </form>
<!--
          Value 1: <input type = "text" name = "val1" size = "10">
          Value 2: <input type = "text" name = "val2" size = "10">
          <br>
          Calculation: <br>
-->
<!--
          <input type = "radio" name = "calc" value = "add"> Add
          <input type = "radio" name = "calc" value = "sub"> Subtract
          <input type = "radio" name = "calc" value = "mul"> Multiply
          <input type = "radio" name = "calc" value = "div"> Divide 
-->
<!--
          <hr>
          <input type = "submit" value = "Calculate"> 
          <input type = "reset" value = "Clear">
-->

          


                </div>
            </div>
        </div>
    </div>  
      
      
      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>