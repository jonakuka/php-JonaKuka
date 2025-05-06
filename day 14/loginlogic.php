<?php 
require 'config.php';

if(isset($_POST['submit']))
{
 $username = $_POST['username'];
    $password = $_POST['password'];


    if(empty($username) || empty($password)){
        echo "you need to fill all ";
        header("refresh:2; url=login.php");
    }else{
        $sql = "SELECT username from users where username=:username";

        $insertsql= $conn->prepare($sql);
        $insertsql->bindParam(':username', $username);
        $insertSql-> execute();

        if($insertSql->rowCount()>0){
            $data = $insertSql->fetch();
            if(password_verify($password,$data['password'])){
                $_SESSION['username']=$data['username'];
                header("Location: dashboard.php");
            }else{
                echo "password incorrect";
                header("refresh:2; url=login.php");
            }


        }else{
            echo "user not found";
        }
    }
}

?>