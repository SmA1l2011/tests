<?php

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

    function setTheme($color, $location, $time) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], $color, time()+$time);
        header("location: $location");
    }

?>