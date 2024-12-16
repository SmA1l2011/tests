<?php 
    require_once "functions.php";
    if (isset($_SESSION["user"])) {
        header("location: profile.php");
    } else {
        header("location: login.php");
    }
?>