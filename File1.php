<?php

$submitClicked = false;

if(isset($_POST['submit']))
{
    $submitClicked = true;
}

if($submitClicked)
{
	echo "<h1> <em>Submit Clicked!</em>";
}

else
{
	echo "Nope";
}
?>