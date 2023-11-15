<?php
include ("connect.php");
require_once 'authentication.php';
$id=$_GET['id'];

$sql="DELETE FROM `sites` WHERE id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: manage_sites.php");
}
?>