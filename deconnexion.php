<?php
session_start();
if ( isset($_SESSION["email"])) {
    $_SESSION=array();
    session_destroy();
    unset($_SESSION);
}

header("location:login.php");

?>