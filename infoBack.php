<?php
    require_once "functions.php";
    $usersData = readCsv("csv/users.csv", "r");
    unset($usersData[0]);

?>