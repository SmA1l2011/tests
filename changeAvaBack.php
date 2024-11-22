<?php

    $stream = fopen("csv/users.csv", "r");
    $usersData = [];
    while ($row = fgetcsv($stream)) {
        $usersData[] = $row;
    } 
    fclose($stream);

?>