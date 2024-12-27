<?php

$ServerName="localhost";
$UserName="root";
$Password="";
$DB="db_daycare";
$con=mysqli_connect($ServerName,$UserName,$Password,$DB);
if(!$con)
 {
	echo"Not Connected";
	
	}
?>