<?php

include("connexion.php");
session_start();
$email="";
$password="";

if ( isset($_POST["login"]) ) 
{
    $email = $_POST["email"];
    $password = md5($_POST["pass"]);
    $sql = "select * from client where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
}

  if ($result->num_rows > 0)
     {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location:index2.php"); 
    }
     else
     {
        echo "<script>alert('Woops! Email or Password is wrong.')</script>";
     }
 


?>