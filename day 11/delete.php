<?php 
include_once('confing.php');
$id=$_GET['id'];

$sql='DELETE FROM users where id=:id';

$getUsers = $conn->prepare($sql);

$getUsers->bindParam(':id',$id);

$getUsers->execute();

header("Location:dashboard.php");
?>