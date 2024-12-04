<?php 

    session_start();

    $error = "";

    if (isset($_POST["password"]) && isset($_POST["email"])) {
        $usersData = readCsv("csv/userss.csv", "r");

        try {
            foreach ($usersData as $user) {
                if ($user[1] == $_POST["email"] && password_verify($_POST["password"], $user[2])) {
                    $_SESSION["user"]["userName"] = $user[0];
                    $_SESSION["user"]["email"] = $user[1];
                    header("location: profile.php");
                }
            }
            throw new Exception("пошта або пароль введено не коректно");
        } catch (Exception $err) {
            $error = $err->getMessage();
        }
    }

?>