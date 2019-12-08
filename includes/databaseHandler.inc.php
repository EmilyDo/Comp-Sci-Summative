<?php

/*to connect to database by first giving the server a name*/

$servername = "localhost"; 
$dBUsername = "root"; 
$dBPassword = ""; 
$dBName = "loginsystemteacher"; 

/*to connect to the database: */
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName); 
/*if it fails, then it'll display the error message: */ 
if(!$conn){
    die("Connection failed: ".mysqli_connect_error()); 
}

