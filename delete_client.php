<?php
include ("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$siteId = $_POST["site_id"];

$sql="DELETE FROM `clients` WHERE id=$siteId ";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: manage_client.php");
}
}
?>