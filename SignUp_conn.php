<?php
$server_name = "localhost" ; 
$email = "root" ;
$user_pw = "" ;
$database= "rentalhub";
// Create connection
$conn = new mysqli($server_name, $email, $user_pw, $database);
// Check connection
if($conn) { 
    echo "";  
}  
else { 
    die("Error". mysqli_connect_error());  
}  
?>