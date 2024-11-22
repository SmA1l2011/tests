<?php 
    session_start();
    if (isset($_SESSION["user"])) {
        header("location: profile.php");
    } else {
        header("location: login.php");
    }

?>