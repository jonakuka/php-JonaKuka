<?php 
<?php 
     
include_once("confing.php");
if(isset($_POST['name'])){

   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $email = $_POST['email'];

   $sql ="insert into users(name,surname,email) values(:name, :surname, :email)";

   $sqlQuery= $conn->prepare($sql);

   $insertsql->bindParam(":name", $name);
   $insertsql->bindParam(":surname", $surname);
   $insertsql->bindParam(":email", $email);

   $insertsql->execute();
   header("Location:dashboard.php");
}

?>



?>