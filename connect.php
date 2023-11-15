<?php
$servername = "localhost";
$username = "smg"; 
$password = "ccbdyi8jdksMTamP";   
$dbname = "smg";     
$port = "3306";

// $servername = "localhost";
// $username = "root"; 
// $password = "";   
// $dbname = "freelance_hr_erp";     
// $port = "3306";
$conn = new mysqli($servername, $username, $password, $dbname, $port);

if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
}
echo "";
?>