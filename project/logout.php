<?php
include 'connection.php';
$id=$_SESSION['lid'];
$sql="UPDATE `login` SET `status`='0' WHERE `lid`= $id";

$result=mysqli_query($con,$sql);
session_destroy();
header('location:index.php');
?>