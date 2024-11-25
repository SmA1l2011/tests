<?php

    $stream = fopen("csv/users.csv", "r");
    $usersData = [];
    while ($row = fgetcsv($stream)) {
        $usersData[] = $row;
    } 
    fclose($stream);

    if (!isset($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]])) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], 1, time()+(30 * 24 * 3600));
        header("location: changeAva.php");
    }
    
    if (isset($_POST["light"])) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], 1, time()+(30 * 24 * 3600));
        header("location: changeAva.php");
    }

    if (isset($_POST["dark"])) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], 0, time()+(30 * 24 * 3600));
        header("location: changeAva.php");
    }

?>