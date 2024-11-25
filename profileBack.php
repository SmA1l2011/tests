<?php

    if (!isset($_SESSION["user"])) {
        header("location: index.php");
    }

    if (!isset($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]])) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], 1, time()+(30 * 24 * 3600));
        header("location: profile.php");
    }
    
    if (isset($_POST["light"])) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], 1, time()+(30 * 24 * 3600));
        header("location: profile.php");
    }

    if (isset($_POST["dark"])) {
        setcookie(explode("@", $_SESSION["user"]["email"])[0], 0, time()+(30 * 24 * 3600));
        header("location: profile.php");
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

    if (isset($_POST["exit"])) {
        unset($_SESSION["user"]);
        header("location: index.php");
    }

    // Avatar replace

    if (isset($_POST["done"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"] && isset($user[3]) && file_exists($user[3])) {
                unlink($user[3]);
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

    // Name replace

    if (isset($_POST["done"]) && !empty($_POST["newName"])) {
        foreach ($usersData as $key => $user) {
            if ($user[1] == $_SESSION["user"]["email"]) {
                $usersData[$key][0] = $_POST["newName"];
                if (isset($usersData[$key][3])) {
                    $lastFileName = $usersData[$key][3];
                    $usersData[$key][3] = explode("/", $usersData[$key][3])[0] . "/" . $_POST["newName"] . "." . explode(".", $usersData[$key][3])[1];
                    rename($lastFileName, $usersData[$key][3]);
                }
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

    if (isset($_POST["cancel"])) {
        header("location: profile.php");
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