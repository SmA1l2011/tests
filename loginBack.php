<?php 

    if (isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
        $usersData = readCsv("csv/users.csv", "r");
        try {
            $phone = $_POST["phone"];
            $phone = str_replace(" ", "", $phone);
            $phone = str_replace("-", "", $phone);
            $phone = str_replace("(", "", $phone);
            $phone = str_replace(")", "", $phone);
            foreach ($usersData as $user) {
                if ($user[1] == $_POST["email"] && $user[2] == $phone && password_verify($_POST["password"], $user[3])) {
                    $_SESSION["user"]["userName"] = $user[0];
                    $_SESSION["user"]["email"] = $user[1];
                    $_SESSION["user"]["phone"] = $user[2];
                    header("location: profile.php");
                }
            }
            throw new Exception("пошта, номер телефону або пароль введено не коректно");
        } catch (Exception $err) {
            $error = $err->getMessage();
        }
    }

?>