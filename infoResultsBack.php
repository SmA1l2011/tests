<?php

    $stream = fopen("csv/testResults.csv", "r");
    $resultsData = [];
    while ($row = fgetcsv($stream)) {
        $resultsData[] = $row;
    } 
    fclose($stream);

    $points = 0;
    $count = 0;

?>