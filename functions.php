<?php

    function readCsv ($fileName, $mode) {
        if (file_exists($fileName)) {   
            $stream = fopen($fileName, $mode);
            $arr = [];
            while ($row = fgetcsv($stream)) {
                $arr[] = $row;
            }
            fclose($stream);
            return $arr;
        } else {
            $stream = fopen($fileName, "a+");
            $arr = [];
            while ($row = fgetcsv($stream)) {
                $arr[] = $row;
            }
            fclose($stream);
            return $arr;
        }
    }

?>