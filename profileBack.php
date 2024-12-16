<?php

    if (!isset($_SESSION["user"])) {
        header("location: index.php");
    }

    if (isset($_POST["light"]) || !isset($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]])) {
        setTheme(1, "profile.php", (30 * 24 * 3600));
    }

    if (isset($_POST["dark"])) {
        setTheme(0, "profile.php", (30 * 24 * 3600));
    }

    $points = 0;
    $count = 0;

    $usersData = readCsv("csv/users.csv", "r");
    $resultsData = readCsv("csv/testResults.csv", "r");

    if (isset($_POST["exit"])) {
        unset($_SESSION["user"]);
        header("location: index.php");
    }
    
    // Avatar replace

    if (isset($_POST["done"]) && !empty($_FILES["ava"]["name"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"] && isset($user[4]) && file_exists($user[4])) {
                unlink($user[4]);
            }
        }
        
        $fileTypeArr = explode(".", $_FILES["ava"]["name"]);
        $fileType = $fileTypeArr[count($fileTypeArr) - 1];
        $target_file = "img/" . $_SESSION["user"]["userName"] . "." . $fileType;
        $isUpload = true;
    
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
            $isUpload = false;
        }
    
        if ($isUpload === true) {
            move_uploaded_file($_FILES["ava"]["tmp_name"], $target_file);
            foreach ($usersData as $key => $user) {
                if ($user[1] == $_SESSION["user"]["email"]) {
                    $usersData[$key][4] = $target_file;
                }
            }
            writeCsv("csv/users.csv", "w", $usersData);
        }
    }

    // Name replace

    if (isset($_POST["done"]) && !empty($_POST["newName"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"]) {
                $usersData[$key][0] = $_POST["newName"];
                if (isset($usersData[$key][4]) && !empty($_FILES["ava"]["name"])) {
                    $lastFileName = $usersData[$key][4];
                    $usersData[$key][4] = explode("/", $usersData[$key][4])[0] . "/" . $_POST["newName"] . "." . explode(".", $usersData[$key][4])[1];
                    rename($lastFileName, $usersData[$key][4]);
                }
            }
        }
        writeCsv("csv/users.csv", "w", $usersData);
        $_SESSION["user"]["userName"] = $_POST["newName"];
        // header("location: profile.php");
    }

    if (isset($_POST["cancel"])) {
        header("location: profile.php");
    }
    
    if (isset($_POST["delete"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"]) {
                unset($usersData[$key]);
            }
        }
        writeCsv("csv/users.csv", "w", $usersData);
        unset($_SESSION["user"]);
        header("location: index.php");
    }

    if (isset($_POST["points"]) && isset($_POST["time"])) {
        $_SESSION["points"] = $_POST["points"];
        $_SESSION["time"] = $_POST["time"];
    }

?>