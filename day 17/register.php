<?php 
include_once('config.php');
if(isset($_POST['submit']))
{
    $username= $_POST['username'];
    $name= $_POST['emri'];
    $email = $_POST['email'];
    
    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);

    if(empty($emri) || empty($username) || empty($email) ||empty($password)){
        echo "You have not filled in all the fields.";
    }else{
        $sql = "INSERT INTO users(name,username,email,password) 
        Values(:name,:username,:email,:password)";

        $insertSql = $conn->prepare($sql);
        $insertSql->bindParam(':name', $name);
        $insertSql->bindParam(':username', $username);
        $insertSql->bindParam(':email', $email);
        $insertSql->bindParam(':password', $password);
        

        $insertSql->execute();

        header("Location:login.php");
        

    }

}




?>