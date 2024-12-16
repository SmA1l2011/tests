<?php
    session_start();

    // read csv-file

    function readCsv($fileName, $mode = "r") {
        if (file_exists($fileName)) {
            $stream = fopen($fileName, $mode);
            $arr = [];
            while ($row = fgetcsv($stream)) {
                $arr[] = $row;
            }
            fclose($stream);
        } else {
            $stream = fopen($fileName, "a+");
            $arr = [];
        }
        return $arr;
    }

    // write csv-file

    function writeCsv($fileName, $mode = "w", $arr) {
        $stream = fopen($fileName, $mode);
        foreach ($arr as $value) {
            fputcsv($stream, $value);
        }
        fclose($stream);
    }

    function putToCsv($fileName, $mode = "a+", $arr) {
        $stream = fopen($fileName, $mode);
        fputcsv($stream, $arr);
        fclose($stream);
    }

    // set theme in profileBack.php & changeAvaBack.php

    function setTheme($color, $location, $time) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], $color, time()+$time);
        header("location: $location");
    }

?>