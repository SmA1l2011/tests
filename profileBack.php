<?php

    if (!isset($_SESSION["user"])) {
        header("location: index.php");
    }

    $points = 0;
    $count = 0;

    $stream = fopen("csv/users.csv", "r");
    $usersData = [];
    while ($row = fgetcsv($stream)) {
        $usersData[] = $row;
    } 
    fclose($stream);

    $streamR = fopen("csv/testResults.csv", "r");
    $resultsData = [];
    while ($row = fgetcsv($streamR)) {
        $resultsData[] = $row;
    } 
    fclose($streamR);

    if (isset($_POST["sendAva"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"] && isset($user[3]) && file_exists($user[3])) {
                unlink($user[3]);
            }
        }
        $target_file = "img/" . $_FILES["ava"]["name"];  
        $isUpload = true;
        $fileType = strtolower(pathinfo($target_file)['extension']);
    
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
            $isUpload = false;
        }
    
        if ($isUpload === true) {
            move_uploaded_file($_FILES["ava"]["tmp_name"], $target_file);
            foreach ($usersData as $key => $user) {
                if ($user[1] == $_SESSION["user"]["email"]) {
                    $usersData[$key][3] = $target_file;
                }
            }
    
            $stream = fopen("csv/users.csv", "w");
    
            foreach ($usersData as $user) {
                fputcsv($stream, $user);
            }
    
            fclose($stream);
        }
    }

    if (isset($_POST["done"]) && !empty($_POST["newName"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"]) {
                $usersData[$key][0] = $_POST["newName"];
            }
        }

        $stream = fopen("csv/users.csv", "w");

        foreach ($usersData as $user) {
            fputcsv($stream, $user);
        }

        fclose($stream);
    
        $_SESSION["user"]["userName"] = $_POST["newName"];
        header("location: profile.php");
    }

    if (isset($_POST["exit"])) {
        unset($_SESSION["user"]);
        header("location: index.php");
    }
    
    if (isset($_POST["delete"])) {
        $stream = fopen("csv/users.csv", "r");
        $usersData = [];
        while ($row = fgetcsv($stream)) {
            $usersData[] = $row;
        } 
        fclose($stream);

        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"]) {
                unset($usersData[$key]);
            }
        }

        $stream = fopen("csv/users.csv", "w");

        foreach ($usersData as $user) {
            fputcsv($stream, $user);
        }

        fclose($stream);
        unset($_SESSION["user"]);
        header("location: index.php");
    }

    if (isset($_POST["points"]) && isset($_POST["time"])) {
        $_SESSION["points"] = $_POST["points"];
        $_SESSION["time"] = $_POST["time"];
    }

?>